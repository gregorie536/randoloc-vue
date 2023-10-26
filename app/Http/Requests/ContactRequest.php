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
            'phone_number' => 'required|digits:10',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            // 'type' => 'nullable|string',
        ];
    }

    /**
     * Format input values before validation.
     *
     * @return array
     */
    // public function validationData(): array
    // {
    //     $data = $this->all();

    //     // dd($data);
        
    //     // if (isset($data['phone_number'])) {
    //     //     $data['phone_number'] = preg_replace('/\s+/', '', $data['phone_number']);
    //     // }

    //     return $data;
    // }
}
