<?php
namespace App\Services;

use App\Models\User;
use App\Models\PatientProfile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Exception;
use Illuminate\Support\Facades\Mail;
use App\Mail\PatientRegistrationEmail;

class PatientProfileService
{
    public function patientRegistrationStore(array $validated): array
    {
        DB::beginTransaction();

        try {
            $user = User::create([
                'name' => $validated['vorname'] . ' ' . $validated['nachname'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]);

            $user->assignRole('patient');

            PatientProfile::create([
                'user_id' => $user->id,
                'phone' => $validated['phone'],
                'gender' => $validated['gender'] ?? 'not specified',
                // 'dob' => $validated['dob'],
                // 'city' => $validated['city'],
                'address' => $validated['address'],
            ]);

             // Send registration email
          Mail::to($user->email)->send(new PatientRegistrationEmail($user));

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
