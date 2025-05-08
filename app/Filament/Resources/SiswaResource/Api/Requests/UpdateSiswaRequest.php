<?php

namespace App\Filament\Resources\SiswaResource\Api\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSiswaRequest extends FormRequest
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
			'pengguna_id' => 'required',
			'nis' => 'required',
			'nama_lengkap' => 'required',
			'id_kelas' => 'required',
			'jenis_kelamin' => 'required',
			'alamat' => 'required|string'
		];
    }
}
