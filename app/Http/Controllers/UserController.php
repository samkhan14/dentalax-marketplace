<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function adminloginView()
    {
        return view('backend.pages.registration.admin-login');
    }

    public function patientRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = $this->userService->patientRegister($request);

        if ($user) {
            return redirect()->back()->with('success', 'Registration successfully');
        } else {
            return redirect()->back()->with('error', 'Registration failed');
        }
    }

    public function applicantRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = $this->userService->applicantRegister($request);

        if ($user) {
            return redirect()->back()->with('success', 'Registration successfully');
        } else {
            return redirect()->back()->with('error', 'Registration failed');
        }
    }

    public function dentistRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = $this->userService->dentistRegister($request);

        if ($user) {
            return redirect()->back()->with('success', 'Registration successfully');
        } else {
            return redirect()->back()->with('error', 'Registration failed');
        }
    }


}
