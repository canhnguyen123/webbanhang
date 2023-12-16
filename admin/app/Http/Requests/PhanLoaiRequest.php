<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class phanloaiRequest extends FormRequest
{
   
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'namephanloai' => [
                'required',
                'max:35',
                'min:2',
                // function ($attribute, $value, $fail) {
                //     $this->validateVietnameseCharacters($attribute, $value, $fail);
                // },
            ],
        ];
    }

    public function messages()
    {
        return [
            'namephanloai.min' => "Không được nhập :attribute nhỏ hơn :min kí tự",
            'namephanloai.max' => "Không được nhập :attribute nhỏ hơn :max kí tự",
        
        ];
    }

    public function attributes()
    {
        return [
            'namephanloai' => 'tên phân loại',
        ];
    }

}
