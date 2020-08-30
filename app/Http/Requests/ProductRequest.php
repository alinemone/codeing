<?php

namespace App\Http\Requests;

use http\Client\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class ProductRequest extends FormRequest
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

            'product_title'=>'required|max:80',
            'product_descriptions'=>'required',
            'seo_title_fa'=>'required|max:60',
            'seo_title_en'=>'required|max:60',
            'seo_descriptions'=>'required|max:120',
            'subcategories'=>'required',
            'help'=>'required',
            'support'=>'required',
            'browsers'=>'required',
            'file_products'=>'required',
            'designs'=>'required',
            'creates'=>'required',
            'demo_site'=>'required|url',
            'tags'=>'required',
            'CashorFree'=>'required',
            'selltype'=>'required',
            'support_default'=>'nullable|numeric',
            'product_price' => 'required_if:CashorFree,1',

        ];

    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'product_price.required_if'  => 'فیلد قیمت محصول اجباری است در صورتی که وضعیت فروش برابر با غیر رایگان باشد',
        ];
    }
}
