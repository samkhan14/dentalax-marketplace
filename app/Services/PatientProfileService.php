<?php
namespace App\Services;

use App\Models\User;
use App\Models\PatientProfile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Exception;

class PatientProfileService
{
    public function patientRegistrationStore(array $validated): array
    {
        DB::beginTransaction();

        try {
            $user = User::create([
                'name'     => $validated['name'],
                'email'    => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]);

            $user->assignRole('patient');

            PatientProfile::create([
                'user_id' => $user->id,
                'phone'   => $validated['phone'],
                'gender'  => $validated['gender'],
                'dob'     => $validated['dob'],
                'city'    => $validated['city'],
                'address' => $validated['address'],
            ]);

            DB::commit();

            return [
                'success' => true,
                'redirect' => route('patient.login.page'),
                'message' => 'Ihr Konto wurde erfolgreich erstellt. Bitte melden Sie sich an.'
            ];
        } catch (Exception $e) {
            DB::rollBack();

            return [
                'success' => false,
                'message' => 'Registrierung fehlgeschlagen: ' . $e->getMessage()
            ];
        }
    }
}
