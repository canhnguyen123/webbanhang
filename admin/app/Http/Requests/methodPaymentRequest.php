<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class methodPaymentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'namemethodPayment' => [
                'required',
                'max:35',
                'min:2',
            
            ],
            'codemethodPayment' => [
                'required',
                'max:10',
                'min:1',
            ],
        ];
    }

    public function messages()
    {
        return [
            'namemethodPayment.min' => "Không được nhập :attribute nhỏ hơn :min kí tự",
            'namemethodPayment.max' => "Không được nhập :attribute nhỏ hơn :max kí tự",
            'codemethodPayment.max' => "Không được nhập :attribute lớn hơn :max kí tự",
            'codemethodPayment.min' => "Không được nhập :attribute nhỏ hơn :min kí tự",
        ];
    }

    public function attributes()
    {
        return [
            'namemethodPayment' => 'tên danh mục',
            'codemethodPayment' => 'mã danh mục',
        ];
    }

    private function validateVietnameseCharacters($attribute, $value, $fail)
    {
        if (!preg_match('/^[\p{L}\s]+$/u', $value)) {
            $fail('Bạn chỉ được nhập các ký tự chữ tiếng Việt.');
        }
    }
}
