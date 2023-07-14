<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'phone' => 'required|string|size:13',
            'password' => 'required|string',
            'password_confirmation' => 'required|same:password'
        ];
    }

    public function messages()
    {
        return [
            'email.email' => 'Digite um endereço de email valido.',
            'email.required' => 'Email é necessário.',
            'phone.required' => 'Telefone é necessário.',
            'phone.size' => 'Digite um telefone válido.',
            'password.required' => 'Senha é necessária.',
            'password_confirmation.required' => 'Confirmação é necessária.',
            'password_confirmation.same' => 'As senhas são diferentes.',
        ];
    }
}
