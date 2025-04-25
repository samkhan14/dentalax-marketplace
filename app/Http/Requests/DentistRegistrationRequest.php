<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Plan;

class DentistRegistrationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'practice_name'        => 'required|string|max:255',
            'practice_description' => 'nullable|string|max:1000',
            'vorname'              => 'required|string|max:100',
            'nachname'             => 'required|string|max:100',
            'email'                => 'required|email|unique:users,email',
            'password'             => 'required|min:8|confirmed',
            'permanent_address'    => 'required|string|max:255',
            'postal_code'          => 'nullable|string|max:20',
            'city_id'              => 'required|exists:cities,id',
            'phone'                => 'required|string|max:20',
            'website'              => 'nullable|url|max:255',
            'datenschutz'          => 'accepted',
            'plan_id'              => ['required', Rule::exists('plans', 'id')],
            'billing_cycle'        => ['required', Rule::in(['monthly', 'yearly'])],
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $plan = Plan::find($this->input('plan_id'));

            if ($plan && $plan->price_monthly > 0) {
                // Paid plan selected
                // Optional: Check payment_method or token etc.
                if (!$this->filled('billing_cycle')) {
                    $validator->errors()->add('billing_cycle', 'Bitte wählen Sie den Zahlungszeitraum.');
                }

                // Example: future logic
                // if (!$this->filled('stripe_token')) {
                //     $validator->errors()->add('stripe_token', 'Stripe-Zahlungsdaten erforderlich.');
                // }
            }
        });
    }

    public function messages(): array
    {
        return [
            'practice_name.required'        => 'Bitte geben Sie den Namen Ihrer Praxis ein.',
            'vorname.required'              => 'Bitte geben Sie Ihren Vornamen ein.',
            'nachname.required'             => 'Bitte geben Sie Ihren Nachnamen ein.',
            'email.required'                => 'Bitte geben Sie eine gültige E-Mail-Adresse ein.',
            'email.email'                   => 'Das Format der E-Mail-Adresse ist ungültig.',
            'email.unique'                  => 'Diese E-Mail-Adresse ist bereits registriert.',
            'password.required'             => 'Bitte geben Sie ein Passwort ein.',
            'password.min'                  => 'Das Passwort muss mindestens 8 Zeichen lang sein.',
            'password.confirmed'            => 'Die Passwörter stimmen nicht überein.',
            'permanent_address.required'    => 'Bitte geben Sie Ihre Praxisadresse ein.',
            'city_id.required'              => 'Bitte wählen Sie eine Stadt aus.',
            'city_id.exists'                => 'Die ausgewählte Stadt ist ungültig.',
            'phone.required'                => 'Bitte geben Sie eine Telefonnummer ein.',
            'website.url'                   => 'Die Webseite muss eine gültige URL sein.',
            'plan_id.required'              => 'Bitte wählen Sie ein Paket aus.',
            'plan_id.exists'                => 'Das ausgewählte Paket existiert nicht.',
            'billing_cycle.required'        => 'Bitte wählen Sie den Zahlungszeitraum.',
            'billing_cycle.in'              => 'Ungültiger Zahlungszeitraum.',
            'datenschutz.accepted'          => 'Sie müssen den Datenschutzbestimmungen zustimmen.',
        ];
    }
}
