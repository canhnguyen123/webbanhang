<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class categoryRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true; // Cho phép tất cả các request
    }

    public function rules(): array
    {
        return [
            'nameCategory' => [
                'required',
                'max:35',
                'min:2',
            ],
        ];
    }

    public function messages()
    {
        return [
            'nameCategory.min' => "Không được nhập :attribute nhỏ hơn :min kí tự",
            'nameCategory.max' => "Không được nhập :attribute nhỏ hơn :max kí tự",
        ];
    }

    public function attributes()
    {
        return [
            'nameCategory' => 'tên danh mục',
        ];
    }

    private function validateVietnameseCharacters($attribute, $value, $fail)
    {
        if (!preg_match('/^[\p{L}\s]+$/u', $value)) {
            $fail('Bạn chỉ được nhập các ký tự chữ tiếng Việt.');
        }
    }
}
