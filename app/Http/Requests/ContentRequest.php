<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContentRequest extends FormRequest
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
            "title" => "required|string|max:100",
            "cover" => "required|mimes:jpeg,jpg,bmp,png",
            "content" => "required|string|max:14000"
        ];
    }

    public function messages()
    {
        return [
            "title.required" => "Judul konten harus di isi",
            "title.string" => "Judul konten harus berupa karakter",
            "title.max" => "Judul maksimal 100 karakter",

            "cover.required" => "Belum ada cover gambar",
            "cover.mimes" => " Cover harus berformat Jpeg, jpg, atau Png",

            "content.required" => "Isi konten tidak boleh kosong, harap di isi",
            "content.string" => "Isi konten harus berupa karakter huruf",
            "content.max" => "Konten maksimal 14000 karakter"
        ];
    }
}
