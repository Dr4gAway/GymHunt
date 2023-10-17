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
            'document' => 'required|string|size:14',
            'open_schedule' => 'required|timestamp',
            'close_schedule' => 'required|timestamp',
            'city' => 'required|string|max:64',
            'state' => 'required|string|max:64',
            'district' => 'required|string|max:64',
            'street' => 'required|string|max:64',
            'number' => 'required|stirng|max:7',
            'longitude' => 'required|decimal|between:-180,180',
            'latitude' => 'required|decimal|between:-90,90'

            /* 'avatar' => 'nullable|image|mimes:jpeg,jpg,png,gif',
            'banner' => 'nullable|image|mimes:jpeg,jpg,png,gif' */
        ];
    }

    /* public function messages()
    {
        return [
            
            'avatar' => 'Imagem inválida.',
            'avatar.required' => 'Foto de perfil é necessária.',
            'banner' => 'Imagem inválida.', 
        ];
    }
    */
}
