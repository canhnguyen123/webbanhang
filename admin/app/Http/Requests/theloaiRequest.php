<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class theloaiRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nametheloai' => [
                'required',
                'max:35',
                'min:2',
                // function ($attribute, $value, $fail) {
                //     $this->validateVietnameseCharacters($attribute, $value, $fail);
                // },
            ],
            'codetheloai' => [
                'required',
                'integer',
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
            'nametheloai.min' => "Không được nhập :attribute nhỏ hơn :min kí tự",
            'nametheloai.max' => "Không được nhập :attribute nhỏ hơn :max kí tự",
            'codetheloai.integer' => "Không được nhập :attribute kí tự ngoài số nguyên",
            'codetheloai.min' => "Không được nhập :attribute nhỏ hơn :min kí tự",
        ];
    }

    public function attributes()
    {
        return [
            'nametheloai' => 'tên phân loại',
            'codetheloai' => 'mã phân loại',
        ];
    }

}
