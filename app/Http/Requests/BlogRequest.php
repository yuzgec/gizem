<?php

namespace App\Http\Requests;

use Astrotomic\Translatable\Validation\RuleFactory;
use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return RuleFactory::make([
            'title:tr'              => 'required|min:3|max:99',
            'category'              => 'required',
            'image'                 => 'image|max:2048|mimes:jpg,jpeg,png,gif',
            'gallery.*'             => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    }

    public function messages()
    {
        return [
            'title:tr.required'         => 'Sayfa başlığını giriniz (TR)',
            'title:tr.max'              => 'Sayfa başlığı en fazla 99 karakter olabilir (TR)',
            'title:tr.min'              => 'Sayfa başlığı en az 3 karakter olabilir (TR)',
            'category.required'         => 'Sayfa Kategori seçimi zorunludur.',
            'image.max'                 => 'Resim boyutu en yüksek 2048kb(2mb) olmalıdır',
            'image.mimes'               => 'Resim formatı jpg,jpeg,png,gif olmalıdır',
            'image.image'               => 'Resim formatı uygun değildir.',

            'gallery.*.max'               => 'Resim boyutu en yüksek 2048kb(2mb) olmalıdır',
            'gallery.*.mimes'             => 'Resim formatı jpg,jpeg,png,gif olmalıdır',
            'gallery.*.image'             => 'Resim formatı uygun değildir.',

        ];
    }
}
