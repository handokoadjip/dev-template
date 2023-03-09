<?php

namespace App\Http\Requests\Backoffice;

use Illuminate\Foundation\Http\FormRequest;

class AksiRequest extends FormRequest
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
        $aksi_id = $this->request->get('aksi_id') ? ',' . $this->request->get('aksi_id') . ',aksi_id' : '';

        return [
            'aksi_menu_item_id' => ['required', 'string'],
            'grup_id' => ['required', 'string'],
            'aksi_label' => ['required', 'string'],
            'aksi_tautan' => ['required', 'string', 'unique:aksi,aksi_tautan' . $aksi_id],
        ];
    }

    public function messages()
    {
        return [
            'aksi_label.required' => 'Label tidak boleh kosong',
            'aksi_tautan.required' => 'Tautan tidak boleh kosong',
            'aksi_tautan.unique' => 'Tautan sudah digunakan',
        ];
    }
}
