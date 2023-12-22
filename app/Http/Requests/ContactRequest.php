<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'contact.*.phone_number' => 'required|digits:10',
            'contact.*.firstname' => 'required|string|max:200',
            'contact.*.lastname' => 'required|string|max:200',
            'contact.*.email' => 'required|email|max:200',
        ];
    }

    public function messages()
    {
        return [
            'contact.*.phone_number.required' => 'Le numéro de téléphone est obligatoire.',
            'contact.*.phone_number.digits' => 'Le numéro de téléphone doit contenir exactement 10 chiffres.',
            'contact.*.firstname.required' => 'Le nom est obligatoire.',
            'contact.*.firstname.string' => 'Le nom doit être une chaîne de caractères.',
            'contact.*.firstname.max' => 'Le nom ne doit pas dépasser 200 caractères.',
            'contact.*.email.required' => 'L\'adresse e-mail est obligatoire.',
            'contact.*.email.email' => 'L\'adresse e-mail n\'est pas valide.',
            'contact.*.email.max' => 'L\'adresse e-mail ne doit pas dépasser 200 caractères.',


            'contact.*.lastname.required' => 'Le prénom est obligatoire.',
            'contact.*.lastname.string' => 'Le prénom doit être une chaîne de caractères.',
            'contact.*.lastname.max' => 'Le prénom ne doit pas dépasser 200 caractères.',
        ];
    }
}
