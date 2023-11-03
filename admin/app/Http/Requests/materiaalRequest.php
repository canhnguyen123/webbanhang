<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class materiaalRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'materialName' => [
                'required',
                'max:255',
                'min:2',
               
            ],
        ];
    }

    public function messages()
    {
        return [
            'materialName.min' => "Không được nhập :attribute nhỏ hơn :min kí tự",
            'materialName.max' => "Không được nhập :attribute lớn hơn :max kí tự",
            'materialName.required' => "Không được bỏ trống :attribute ",
        ];
    }

    public function attributes()
    {
        return [
            'materialName' => 'tên chất liệu',
        ];
    }
}
