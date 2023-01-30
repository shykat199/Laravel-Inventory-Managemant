<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'required',
            'category_id'=>'required',
            'suplier_id'=>'required',
            'product_code'=>'required',
            'product_warehouse'=>'required',
            'product_route'=>'required',
            'buy_date'=>'required',
            'expire_date'=>'required',
            'buying_price'=>'required',
            'selling_price'=>'required',
        ];
    }
}
