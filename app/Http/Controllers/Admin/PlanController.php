<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan;
use App\Services\StripeService;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorePlanRequest;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::all();
        //  dd($plans);
        return view('backend.pages.plans.index', compact('plans'));
    }

    public function store(StorePlanRequest $request, StripeService $stripeService)
    {
        // dd($request->all());
        DB::beginTransaction();

        try {
            $plan = Plan::create([
                'name' => $request->name,
                'slug' => $request->slug,
                'price_monthly' => $request->price_monthly,
                'price_yearly' => $request->price_yearly,
                'description' => $request->description,
                'features' => json_encode($request->features ?? []),
                'price_tag' => $request->price_tag ?? 'Free',
                'is_active' => $request->is_active,
            ]);

            $stripeData = $stripeService->createProductAndPrices($plan);

            $plan->update([
                'stripe_product_id' => $stripeData['product_id'],
                'stripe_price_monthly' => $stripeData['price_monthly'],
                'stripe_price_yearly' => $stripeData['price_yearly'],
            ]);

            // dd($stripeData, $plan);
            DB::commit();
             return redirect()->route('admin.plans.index')->with('success', 'Plan has been created on Stripe and Portal.');
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Failed to create plan: ' . $e->getMessage()], 500);
            // return back()->withErrors(['error' => 'Fehler beim Erstellen: ' . $e->getMessage()]);
        }
    }

    public function edit(Plan $plan)
    {
        return view('admin.plans.edit', compact('plan'));
    }

    public function update(Request $request, Plan $plan)
    {
        $request->validate([
            'name' => 'required|string',
            'price_monthly' => 'required|numeric|min:0',
            'price_yearly' => 'required|numeric|min:0',
            'features' => 'nullable|array',
            'description' => 'nullable|string',
        ]);

        try {
            $plan->update([
                'name' => $request->name,
                'price_monthly' => $request->price_monthly,
                'price_yearly' => $request->price_yearly,
                'description' => $request->description,
                'features' => json_encode($request->features),
            ]);

            return redirect()->route('admin.plans.index')->with('success', 'Plan updated.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to update plan: ' . $e->getMessage()]);
        }
    }

    public function destroy(Plan $plan, StripeService $stripeService)
    {
        DB::beginTransaction();

        try {
            if ($plan->stripe_product_id) {
                $stripeService->deactivateProduct($plan->stripe_product_id);
            }

            $plan->delete(); // Soft delete

            DB::commit();
            return back()->with('success', 'Plan has been soft deleted.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Error deleting plan: ' . $e->getMessage()]);
        }
    }

}
