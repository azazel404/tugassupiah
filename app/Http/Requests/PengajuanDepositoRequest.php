<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PengajuanDepositoRequest extends FormRequest
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
            "name"      => "required|string|max:100",
            "file_pdf"  => "required|mimes:pdf,doc,docx"
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "Nama file wajib di isi",
            "name.string"   => "Nama file harus berupa karakter",
            "name.max"      => "Nama maksimal 100 karekter",

            "file_pdf.required" => "File pdf belum dipilih",
            "file_pdf.mimes"    => "File tidak berformat pdf, mohon pastikan kembali"
        ];
    }
}
