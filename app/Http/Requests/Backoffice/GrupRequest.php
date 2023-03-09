<?php

namespace App\Http\Requests\Backoffice;

use Illuminate\Foundation\Http\FormRequest;

class GrupRequest extends FormRequest
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
            'grup_nama' => ['required', 'string'],
            'grup_deskripsi' => ['required', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'grup_nama.required' => 'Grup tidak boleh kosong',
            'grup_deskripsi.required' => 'Deskripsi tidak boleh kosong',
        ];
    }
}
