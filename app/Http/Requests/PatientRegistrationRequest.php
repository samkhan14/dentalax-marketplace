<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientRegistrationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'phone'    => 'required|string|max:20',
            'gender'   => 'required|in:male,female,other',
            'dob'      => 'nullable|date',
            'city'     => 'nullable|string|max:100',
            'address'  => 'nullable|string|max:255',
            'datenschutz' => 'accepted',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'           => 'Bitte geben Sie Ihren Namen ein.',
            'email.required'          => 'Bitte geben Sie eine gültige E-Mail-Adresse ein.',
            'email.email'             => 'Das Format der E-Mail-Adresse ist ungültig.',
            'email.unique'            => 'Diese E-Mail-Adresse ist bereits registriert.',
            'password.required'       => 'Bitte geben Sie ein Passwort ein.',
            'password.min'            => 'Das Passwort muss mindestens 8 Zeichen lang sein.',
            'password.confirmed'      => 'Die Passwörter stimmen nicht überein.',
            'phone.required'          => 'Bitte geben Sie eine Telefonnummer ein.',
            'gender.required'         => 'Bitte wählen Sie ein Geschlecht aus.',
            'gender.in'               => 'Ungültige Geschlechtsauswahl.',
            'datenschutz.accepted'    => 'Sie müssen den Datenschutzbestimmungen zustimmen.',
        ];
    }
}
