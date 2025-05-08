<?php
namespace App\Services;

use App\Models\User;
use App\Models\DentistProfile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Exception;
use Illuminate\Support\Facades\Mail;
use App\Mail\DentistRegistrationEmail;
use Illuminate\Support\Facades\Session;

class DentistProfileService
{
    public function dentistRegistrationStore(array $validated): array
    {
        DB::beginTransaction();

        try {
            // 1. Create User
            $user = User::create([
                'name' => $validated['vorname'] . ' ' . $validated['nachname'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'status' => in_array($validated['plan_slug'], ['praxispro', 'praxisplus']) ? 0 : 1,
            ]);

            $user->assignRole('dentist');

            // 2. Create Dentist Profile
            DentistProfile::create([
                'user_id' => $user->id,
                'city_id' => $validated['city_id'],
                'plan_id' => $validated['plan_id'] ?? 1,
                'foundation_experience' => 'not specified',
                'expertise_areas' => $validated['expertise_areas'] ?? null,
                'logo' => $validated['logo'] ?? null,
                'latitude' => $validated['latitude'] ?? null,
                'longitude' => $validated['longitude'] ?? null,
                'practice_name' => $validated['practice_name'],
                'practice_description' => $validated['practice_description'],
                'permanent_address' => $validated['permanent_address'],
                'postal_code' => $validated['postal_code'],
                'phone' => $validated['phone'],
                'website' => $validated['website'],
                'status' => 'unclaimed',
            ]);

            // 3. Save form data in session if paid plan
            if (
                in_array($validated['plan_slug'], ['praxispro', 'praxisplus']) &&
                in_array($validated['billing_cycle'], ['monthly', 'yearly'])
            ) {
                session()->put('dentist_form_data', array_merge($validated, [
                    'user_id' => $user->id,
                ]));

                DB::commit(); // commit before redirect

                return [
                    'success' => true,
                    'message' => 'Weiterleitung zum Zahlungsmodus.',
                    'redirect' => route('dentist.payment.geteway'),
                ];
            }

            // 4. Send registration email
            // Mail::to($user->email)->send(new DentistRegistrationEmail($user));

            DB::commit();

            return [
                'success' => true,
                'redirect' => route('dentist.login.page'),
                'message' => 'Sie haben sich erfolgreich registriert. Bitte melden Sie sich jetzt an.',
            ];

        } catch (Exception $e) {
            DB::rollBack();

            return [
                'success' => false,
                'message' => 'Registrierung fehlgeschlagen: ' . $e->getMessage(),
                'redirect' => null,
            ];
        }
    }

}
