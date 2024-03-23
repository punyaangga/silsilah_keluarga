<?php

namespace App\Http\Requests;

use App\Models\silsilah_keluarga;
use Illuminate\Foundation\Http\FormRequest;

class SilsilahKeluargaRequest extends FormRequest
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
            'nama' => ['required', 'string'],
            'jenis_kelamin' => ['required', 'string'],
            'id_orang_tua' => [
                'nullable',
                function ($attribute, $value, $fail) {
                    $cekIdOrangTua = silsilah_keluarga::find($value);
                    if (!$cekIdOrangTua) {
                        $fail('ID orang tua tidak ditemukan.');
                    }
                }
            ]
        ];
    }
    public function messages(): array
    {
        return [
            'nama.required' => 'Nama is wajib di isi',
            'jenis_kelamin.required' => 'Jenis Kelamin wajib di isi',
        ];
    }

}
