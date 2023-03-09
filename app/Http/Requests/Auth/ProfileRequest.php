<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
        $pengguna_id = $this->request->get('pengguna_id') ? ',' . $this->request->get('pengguna_id') . ',pengguna_id' : '';

        return [
            'pengguna_nama' => ['required', 'string'],
            'pengguna_password' => [$pengguna_id ? '' : 'required'],
            'pengguna_nik' => ['required', 'string', 'unique:pengguna,pengguna_nik' . $pengguna_id],
            'pengguna_nip' => ['required', 'string', 'unique:pengguna,pengguna_nip' . $pengguna_id],
            'pengguna_telp' => ['required', 'string'],
            'pengguna_jenis_kelamin' => ['required', 'string'],
            'pengguna_agama' => ['required', 'string'],
            'pengguna_alamat' => ['required', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'pengguna_nama.required' => 'Nama Lengkap tidak boleh kosong',
            'pengguna_password.required' => 'Password tidak boleh kosong',
            'pengguna_nik.required' => 'NIK tidak boleh kosong',
            'pengguna_nik.unique' => 'NIK sudah digunakan',
            'pengguna_nip.required' => 'NIP tidak boleh kosong',
            'pengguna_nip.unique' => 'NIP sudah digunakan',
            'pengguna_telp.required' => 'Telp tidak boleh kosong',
            'pengguna_jenis_kelamin.required' => 'Jenis Kelamin tidak boleh kosong',
            'pengguna_agama.required' => 'Agama tidak boleh kosong',
            'pengguna_alamat.required' => 'Alamat tidak boleh kosong',
        ];
    }
}
