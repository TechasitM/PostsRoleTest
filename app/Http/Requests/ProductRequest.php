<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'image' => 'mimes:jpeg,jpg,png',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'กรุณาระบุชื่อสินค้า',
            'price.required' => 'กรุณากำหนดราคาสินค้า',
            'stock.required' => 'กรุณาระบุจำนวนสินค้าที่มีในสต๊อก',
            'image.mimes' => 'รองรับไฟล์รูปนามสกุล jpeg,jpg,png',
        ];
    }
}
