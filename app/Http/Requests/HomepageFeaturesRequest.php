<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HomepageFeaturesRequest extends FormRequest
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
            'title' => 'required|string|max:200',
            'description' => 'required|string',
            'image' => 'sometimes|file|image|max:2048',
            'location' => 'required|string|max:200',
            'feature_date' => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Le titre est obligatoire.',
            'title.max' => 'Le titre ne doit pas dépasser 200 caractères.',
            'description.required' => 'La description est obligatoire.',
            'image.image' => 'L\'image doit être une image.',
            'image.max' => 'L\'image ne doit pas dépasser 2 Mo.',
            'location.required' => 'Le lieu est obligatoire.',
            'location.max' => 'Le lieu ne doit pas dépasser 200 caractères.',
            'feature_date.required' => 'La date est obligatoire.',
        ];
    }
}
