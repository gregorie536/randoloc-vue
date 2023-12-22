<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuidelineRequest extends FormRequest
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
            // 'price' => 'required|numeric',
            // 'season_year' => 'required|numeric',
            'guidelines.*.price' => 'required|numeric',
            'guidelines.*.season_year' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            // 'price.required' => 'Le prix est obligatoire.',
            // 'price.numeric' => 'Le prix doit être un nombre.',
            // 'season_year.required' => 'L\'année de la saison est obligatoire.',
            // 'season_year.numeric' => 'L\'année de la saison doit être un nombre.',
            'guidelines.*.price.required' => 'Le prix est obligatoire.',
            'guidelines.*.price.numeric' => 'Le prix doit être un nombre.',
            'guidelines.*.season_year.required' => 'L\'année de saison est obligatoire.',


        ];
    }
}

