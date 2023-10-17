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
                // function ($attribute, $value, $fail) {
                //     $this->validateVietnameseCharacters($attribute, $value, $fail);
                // },
            ],
            'codeCategory' => [
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
            'nameCategory.min' => "Không được nhập :attribute nhỏ hơn :min kí tự",
            'nameCategory.max' => "Không được nhập :attribute nhỏ hơn :max kí tự",
            'codeCategory.integer' => "Không được nhập :attribute kí tự ngoài số nguyên",
            'codeCategory.min' => "Không được nhập :attribute nhỏ hơn :min kí tự",
        ];
    }

    public function attributes()
    {
        return [
            'nameCategory' => 'tên danh mục',
            'codeCategory' => 'mã danh mục',
        ];
    }

    private function validateVietnameseCharacters($attribute, $value, $fail)
    {
        if (!preg_match('/^[\p{L}\s]+$/u', $value)) {
            $fail('Bạn chỉ được nhập các ký tự chữ tiếng Việt.');
        }
    }
}
