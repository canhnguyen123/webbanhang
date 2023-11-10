<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class shipRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'shipName' => [
                'required',
                'max:255',
                'min:1',
               
            ],
            'shipCode' => [
                'required',
                'max:255',
                'min:1',
            ],
            'shipPrice' => [
                'required',
                'integer',
                'min:0'
            ],
        ];
    }

    public function messages()
    {
        return [
            'shipName.min' => "Không được nhập :attribute nhỏ hơn :min kí tự",
            'shipName.max' => "Không được nhập :attribute nhỏ hơn :max kí tự",
            'shipName.required' => "Không được bỏ trống  :attribute ",
            'shipCode.min' => "Không được nhập :attribute nhỏ hơn :min kí tự",
            'shipCode.max' => "Không được nhập :attribute nhỏ hơn :max kí tự",
            'shipCode.required' => "Không được bỏ trống  :attribute ",
            'shipPrice.min' => "Không được nhập :attribute nhỏ hơn :min ",
            'shipPrice.integer' => "Bạn phải nhập :attribute là dạng số",
            'shipPrice.required' => "Không được bỏ trống  :attribute ",
        ];
    }

    public function attributes()
    {
        return [
            'shipName' => 'tên phương thức ship',
            'shipCode' => 'mã phương thức ship',
            'shipPrice' => 'phí ship',
        ];
    }
}
