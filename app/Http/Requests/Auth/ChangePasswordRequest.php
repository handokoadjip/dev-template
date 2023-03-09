<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class ChangePasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'pengguna_password_lama' => ['required'],
            'pengguna_password_baru' => ['required', 'confirmed', Password::defaults()],
            'pengguna_password_baru_confirmation' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'pengguna_password_lama.required' => 'Password Lama tidak boleh kosong',
            'pengguna_password_baru.required' => 'Password Baru tidak boleh kosong',
            'pengguna_password_baru.confirmed' => 'Konfirmasi Password tidak sesuai',
            'pengguna_password_baru_confirmation.required' => 'Konfirmasi Password tidak boleh kosong',
        ];
    }
}
