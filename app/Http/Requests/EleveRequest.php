<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EleveRequest extends FormRequest
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
            'nom' => 'required|between:5,10',
            'prenom' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'image' => 'image|mimes:jpg,png,jpeg'
        ];
    }
}
