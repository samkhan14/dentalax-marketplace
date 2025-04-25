<?php
namespace App\Services;

use App\Models\ApplicantProfile;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Exception;
use Illuminate\Support\Facades\Storage;

class ApplicantProfileService
{
    public function applicantRegistrationStore(array $validated): array
    {
        DB::beginTransaction();
         // Handle file upload
         $resumePath = $validated['resume_path'];
            if ($resumePath) {
                $resumePath = $resumePath->store('resumes', 'public');
                $validated['resume_path'] = $resumePath;
            }

        try {
            $user = User::create([
                'name'     => $validated['name'],
                'email'    => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]);

            $user->assignRole('applicant');

            ApplicantProfile::create([
                'user_id'      => $user->id,
                'phone'        => $validated['phone'],
                'city_id'      => $validated['city_id'],
                'resume_path'  => $validated['resume_path'] ?? null,
                'experience'   => $validated['experience'],
            ]);

            DB::commit();

            return [
                'success' => true,
                'redirect' => route('applicant.login.page'),
                'message' => 'Ihr Konto wurde erfolgreich erstellt. Bitte melden Sie sich an.'
            ];

        } catch (Exception $e) {
            DB::rollBack();

             // Delete the uploaded file if transaction fails
            if (isset($resumePath)) {
                Storage::disk('public')->delete($resumePath);
            }

            return [
                'success' => false,
                'message' => 'Registrierung fehlgeschlagen: ' . $e->getMessage()
            ];
        }
    }
}
