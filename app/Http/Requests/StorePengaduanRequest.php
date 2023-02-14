<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePengaduanRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            
            'id_pengaduan' => ['max:255'],
            'tgl_pengaduan' => ['max:255'],
            'nik' => ['required'],
            'isi_laporan' => ['min:255'],
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:4048',
            'status',
        ];
    }
}
