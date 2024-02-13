<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProject extends FormRequest
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
            'titre' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'description' => 'required|string',
            'publication_year' => 'required|date',
            'partenaires_id' => 'nullable|required|exists:partenaires,id',
            'img' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}
