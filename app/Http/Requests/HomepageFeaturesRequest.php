<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class HomepageFeaturesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'homepageFeatures.*.title' => 'required|string|max:255',
            'homepageFeatures.*.description' => 'required|string',
            'homepageFeatures.*.image' => 'sometimes|file|image|max:2048',
            'homepageFeatures.*.location' => 'required|string|max:255',
            'homepageFeatures.*.feature_date' => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'homepageFeatures.*.title.required' => 'Le titre est obligatoire.',
            'homepageFeatures.*.title.max' => 'Le titre ne doit pas dépasser 200 caractères.',
            'homepageFeatures.*.description.required' => 'La description est obligatoire.',
            'homepageFeatures.*.image.image' => 'L\'image doit être une image.',
            'homepageFeatures.*.image.max' => 'L\'image ne doit pas dépasser 2 Mo.',
            'homepageFeatures.*.location.required' => 'Le lieu est obligatoire.',
            'homepageFeatures.*.location.max' => 'Le lieu ne doit pas dépasser 200 caractères.',
            'homepageFeatures.*.feature_date.required' => 'La date est obligatoire.',
        ];
    }
}
