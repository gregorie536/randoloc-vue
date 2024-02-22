<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class GalleryRequest extends FormRequest
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
            // 'image' => 'sometimes|required|image|max:2048',
            'image' => 'sometimes|required|image',
            'comment' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'image.required' => 'L\'image est obligatoire.',
            'image.image' => 'L\'image doit être une image.',
            // 'image.max' => 'L\'image ne doit pas dépasser 2 Mo.',
            'comment.string' => 'Le commentaire doit être une chaîne de caractères.',
            'comment.required' => 'Le commentaire est obligatoire.'
        ];
    }
}
