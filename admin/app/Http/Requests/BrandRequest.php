<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Cho phép tất cả các request
    }

    public function rules(): array
    {
        return [
            'namebrand' => [
                'required',
                'max:35',
                'min:2',
                // function ($attribute, $value, $fail) {
                //     $this->validateVietnameseCharacters($attribute, $value, $fail);
                // },
            ],
            'codebrand' => [
                'required',
                'max:10',
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
            'namebrand.min' => "Không được nhập :attribute nhỏ hơn :min kí tự",
            'namebrand.max' => "Không được nhập :attribute nhỏ hơn :max kí tự",
            'codebrand.max' => "Không được nhập :attribute hỏ hơn :min kí tự",
            'codebrand.min' => "Không được nhập :attribute nhỏ hơn :min kí tự",
        ];
    }

    public function attributes()
    {
        return [
            'namebrand' => 'tên danh mục',
            'codebrand' => 'mã danh mục',
        ];
    }

    private function validateVietnameseCharacters($attribute, $value, $fail)
    {
        if (!preg_match('/^[\p{L}\s]+$/u', $value)) {
            $fail('Bạn chỉ được nhập các ký tự chữ tiếng Việt.');
        }
    }
}
