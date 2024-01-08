<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommitteeRequest extends FormRequest
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
            'name' => 'required|string',
            'member_ids' => 'required|array',
            'member_ids.*' => 'exists:members,id'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Le nom de la commission est obligatoire.',
            'member_ids.required' => 'La commission doit avoir au moins un membre.',
            'member_ids.*.exists' => 'Un des membres sélectionnés n\'existe pas.'
        ];
    }
}
