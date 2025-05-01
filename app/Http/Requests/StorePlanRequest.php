<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePlanRequest extends FormRequest
{
    public function authorize(): bool
    {
        // You can limit this to admin via policy or middleware
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:plans,slug',
            'description' => 'nullable|string',
            'price_monthly' => 'required|numeric|min:0',
            'price_yearly' => 'required|numeric|min:0',
            'features' => 'nullable|array',
            'features.*' => 'string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Bitte geben Sie einen Namen für das Paket ein.',
            'slug.required' => 'Ein Slug ist erforderlich.',
            'slug.unique' => 'Dieser Slug wird bereits verwendet.',
            'price_monthly.required' => 'Bitte geben Sie einen monatlichen Preis ein.',
            'price_monthly.numeric' => 'Der monatliche Preis muss eine Zahl sein.',
            'price_monthly.min' => 'Der monatliche Preis darf nicht negativ sein.',
            'price_yearly.required' => 'Bitte geben Sie einen jährlichen Preis ein.',
            'price_yearly.numeric' => 'Der jährliche Preis muss eine Zahl sein.',
            'price_yearly.min' => 'Der jährliche Preis darf nicht negativ sein.',
            'features.array' => 'Die Funktionen müssen ein Array sein.',
            'features.*.string' => 'Jede Funktion muss ein Text sein.',
        ];
    }
}
