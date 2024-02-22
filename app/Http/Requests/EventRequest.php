<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class EventRequest extends FormRequest
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
            'name' => 'required|string|max:155',
            'description' => 'required|string|max:255',
            'supervisor' => 'required|string|max:155',
            'day' => 'required|int',
            'date' => 'required|date',
            'number_km' => 'required|numeric',
            'location' => 'required|string|max:155',
            'active' => 'required|boolean',
            'category_id' => 'required|exists:categories,id',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Le nom de l\'événement est obligatoire.',
            'name.max' => 'Le nom de l\'événement ne doit pas dépasser 155 caractères.',
            'description.required' => 'La description est obligatoire.',
            'description.max' => 'La description ne doit pas dépasser 255 caractères.',
            'supervisor.required' => 'Le nom du meneur est obligatoire.',
            'supervisor.max' => 'Le nom du meneur ne doit pas dépasser 155 caractères.',
            'day.required' => 'Le jour de la semaine est obligatoire.',
            'date.required' => 'La date est obligatoire.',
            'date.date' => 'La date doit être une date valide.',
            'number_km.required' => 'Le nombre de km est obligatoire.',
            'number_km.numeric' => 'Le nombre de kilomètres doit être un nombre.',
            'location.required' => 'Le lieu est obligatoire.',
            'location.max' => 'Le lieu ne doit pas dépasser 155 caractères.',
            'category_id.required' => 'La catégorie est obligatoire.',
            'category_id.exists' => 'La catégorie sélectionnée est invalide.'
        ];
    }
}



