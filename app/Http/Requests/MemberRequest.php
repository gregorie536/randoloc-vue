<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberRequest extends FormRequest
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
            'firstname' => 'required|string|max:200',
            'lastname' => 'required|string|max:200',
        ];
    }

    public function messages()
    {
        return [
            'firstname.required' => 'Le prénom est obligatoire.',
            'firstname.max' => 'Le prénom ne doit pas dépasser 200 caractères.',
            'lastname.required' => 'Le nom est obligatoire.',
            'lastname.max' => 'Le nom ne doit pas dépasser 200 caractères.',
        ];
    }
}
