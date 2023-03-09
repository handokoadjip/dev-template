<?php

namespace App\Http\Requests\Backoffice;

use Illuminate\Foundation\Http\FormRequest;

class UnitKerjaRequest extends FormRequest
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
            'unit_kerja_nama' => ['required', 'string'],
            'unit_kerja_deskripsi' => ['required', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'unit_kerja_nama.required' => 'Unit Kerja tidak boleh kosong',
            'unit_kerja_deskripsi.required' => 'Deskripsi tidak boleh kosong',
        ];
    }
}
