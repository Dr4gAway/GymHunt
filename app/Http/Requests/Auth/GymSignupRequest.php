<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class GymSignupRequest extends FormRequest
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
            /* User Data */
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'phone' => 'required|string|size:13',
            'password' => 'required|string|min:8|max:32',
            'password_confirmation' => 'required|same:password',
            'avatar' => 'required|mimes:jpeg,jpg,png,gif',
            'banner' => 'required|mimes:jpeg,jpg,png,gif',
            /* Gym data */
            'cnpj' => 'required|string|size:14',
            'open_schedule' => 'required|date_format:H:i',
            'close_schedule' => 'required|date_format:H:i',
            'city' => 'required|string|max:64',
            'state' => 'required|string|max:64',
            'district' => 'required|string|max:64',
            'street' => 'required|string|max:64',
            'number' => 'required|string|max:7',
            'longitude' => 'required|decimal:8,15',
            'latitude' => 'required|decimal:8,15'
        ];
    }

     public function messages()
    {
        return [
            
            /*'avatar' => 'Imagem inválida.',
            'avatar.required' => 'Foto de perfil é necessária.',
            'banner' => 'Imagem inválida.', */
            'email' => 'email invalido'
        ];
    }
    
}
