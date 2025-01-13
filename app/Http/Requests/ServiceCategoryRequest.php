<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title:tr'                 => 'required|min:3|max:99',
        ];
    }

    public function messages()
    {
        return [
            'title:tr.required'            => 'Sayfa Kategori başlığını giriniz (TR)',
            'title:tr.max'                 => 'Sayfa Kategori başlığı en fazla 99 karakter olabilir (TR)',
            'title:tr.min'                 => 'Sayfa Kategori başlığı en az 3 karakter olabilir (TR)'
        ];
    }
}
