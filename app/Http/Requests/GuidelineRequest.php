<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class GuidelineRequest extends FormRequest
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
            // 'guidelines.*.price' => 'required|numeric',
            'guidelines.*.price' => ['required', 'regex:/^\d+(,\d{1,2})?$/'],

            'guidelines.*.season_year' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'guidelines.*.price.required' => 'Le prix est obligatoire.',

            // 'guidelines.*.price.numeric' => 'Le prix doit être un nombre.',
            'guidelines.*.price.regex' => 'Le format du prix est invalide.',

            'guidelines.*.season_year.required' => 'L\'année de saison est obligatoire.',
        ];
    }
}
