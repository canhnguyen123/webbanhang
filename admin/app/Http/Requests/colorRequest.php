<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class colorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'namecolor' => [
                'required',
                'max:35',
                'min:2',
                // function ($attribute, $value, $fail) {
                //     $this->validateVietnameseCharacters($attribute, $value, $fail);
                // },
            ],
            'color_code' => [
                'required',
                'min:1',
                // function ($attribute, $value, $fail) {
                //     $this->validateVietnameseCharacters($attribute, $value, $fail);
                // },
            ],
        ];
    }

    public function messages()
    {
        return [
            'namecolor.min' => "Không được nhập :attribute nhỏ hơn :min kí tự",
            'namecolor.max' => "Không được nhập :attribute nhỏ hơn :max kí tự",
            // 'color_code.max' => "Không được nhập :attribute kí tự ngoài số nguyên",
            'color_code.min' => "Không được nhập :attribute nhỏ hơn :min kí tự",
        ];
    }

    public function attributes()
    {
        return [
            'namecolor' => 'tên màu sắc',
            'color_code' => 'ghi chú màu sắc',
        ];
    }
}
