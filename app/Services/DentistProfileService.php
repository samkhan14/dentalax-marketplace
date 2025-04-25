<?php
namespace App\Services;

use App\Models\User;
use App\Models\DentistProfile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Exception;

class DentistProfileService
{
    public function dentistRegistrationStore(array $validated): array
    {
        DB::beginTransaction();

        try {
            // Create User
            $user = User::create([
                'name'     => $validated['vorname'] . ' ' . $validated['nachname'],
                'email'    => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]);

            $user->assignRole('dentist');

            // Create Dentist Profile
            DentistProfile::create([
                'user_id'               => $user->id,
                'city_id'               => $validated['city_id'],
                'plan_id'               => $validated['plan_id'] ?? 1,
                'foundation_experience' => 'not specified',
                'expertise_areas'       => $validated['expertise_areas'] ?? null,
                'logo'                  => $validated['logo'] ?? null,
                'latitude'              => $validated['latitude'] ?? null,
                'longitude'             => $validated['longitude'] ?? null,
                'practice_name'         => $validated['practice_name'],
                'practice_description'  => $validated['practice_description'],
                'permanent_address'     => $validated['permanent_address'],
                'postal_code'           => $validated['postal_code'],
                'phone'                 => $validated['phone'],
                'website'               => $validated['website'],
                'status'                => 'unclaimed',
            ]);

            DB::commit();

            return [
                'success' => true,
                'redirect' => route('dentist.login.page'),
                'message' => 'Sie haben sich erfolgreich registriert. Bitte melden Sie sich jetzt an.'
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
