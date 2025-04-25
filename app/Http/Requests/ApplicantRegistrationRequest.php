<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicantRegistrationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'       => 'required|string|max:255',
            'email'      => 'required|email|unique:users,email',
            'password'   => 'required|min:8|confirmed|string',
            'phone'      => 'nullable|string|max:20',
            'city_id'    => 'required|exists:cities,id',
            'resume_path'=> 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'experience' => 'nullable|string|max:1000',
            'terms'=> 'accepted',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'         => 'Bitte geben Sie Ihren Namen ein.',
            'email.required'        => 'Bitte geben Sie eine gültige E-Mail-Adresse ein.',
            'email.unique'          => 'Diese E-Mail-Adresse ist bereits registriert.',
            'password.required'     => 'Bitte geben Sie ein Passwort ein.',
            'password.min'          => 'Das Passwort muss mindestens 8 Zeichen lang sein.',
            'password.string'       => 'Das Passwort muss eine Zeichenkette sein.',
            'password.confirmed'    => 'Die Passwörter stimmen nicht überein.',
            'city_id.required'      => 'Bitte wählen Sie eine Stadt aus.',
            'terms.accepted'  => 'Sie müssen den Datenschutzbestimmungen zustimmen.',
        ];
    }
}
