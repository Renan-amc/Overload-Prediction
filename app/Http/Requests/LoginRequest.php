<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'username' => ['required','email'],
            'password' => ['required','min:6','max:16']
        ];
    }

     public function messages(): array
    {
        return [
            'username.required' => 'O email é obrigatório!',
            'username.email' => 'Email inválido!',
            'password.required' => 'A senha é obrigatória!',
            'password.min' => 'A senha não pode ter menos de :min caractéres!',
            'password.max' => 'A senha não pode ter mais de :max caractéres!'
        ];
    }
}
