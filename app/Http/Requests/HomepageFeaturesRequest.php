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
            'homepageFeatures.*.id' => 'required|exists:homepage_features,id',
            'homepageFeatures.*.title' => 'required|string|max:255',
            'homepageFeatures.*.description' => 'required|string',
            'homepageFeatures.*.image' => 'sometimes|file|image|max:2048',
            'homepageFeatures.*.location' => 'required|string|max:255',
            'homepageFeatures.*.feature_date' => 'required|date',
        ];
    }
}
