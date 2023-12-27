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
            'contacts.*.phone_number' => 'required|digits:10',
            'contacts.*.firstname' => 'required|string|max:200',
            'contacts.*.lastname' => 'required|string|max:200',
            'contacts.*.email' => 'required|email|max:200',
        ];
    }

    public function messages()
    {
        return [
            'contacts.*.phone_number.required' => 'Le numéro de téléphone est obligatoire.',
            'contacts.*.phone_number.digits' => 'Le numéro de téléphone doit contenir 10 chiffres.',
            'contacts.*.firstname.required' => 'Le prénom est obligatoire.',
            'contacts.*.firstname.max' => 'Le prénom ne doit pas dépasser 200 caractères.',
            'contacts.*.lastname.required' => 'Le nom est obligatoire.',
            'contacts.*.lastname.max' => 'Le nom ne doit pas dépasser 200 caractères.',
            'contacts.*.email.required' => 'L\'adresse e-mail est obligatoire.',
            'contacts.*.email.email' => 'L\'adresse e-mail n\'est pas valide.',
            'contacts.*.email.max' => 'L\'adresse e-mail ne doit pas dépasser 200 caractères.',
        ];
    }
}
