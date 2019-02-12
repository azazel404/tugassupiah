<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SlideshowRequest extends FormRequest
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
            "image"         => "required|mimes:jpeg,jpg,bmp,png",
            "content_id"    => "required|integer"
        ];
    }

    public function messages()
    {
        return [
            "image.required"    => "gambar slide masih kosong, harap di isi",
            "image.mimes"       => "format gambar harus jpeg, jpg, bmp atau png",

            "content_id.required"   => "belum ada konten yang dipilih",
            "content_id.integer"    => "sepertinya ada masalah saat memilih kontent"
        ];
    }
}
