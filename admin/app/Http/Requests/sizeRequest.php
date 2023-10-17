<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class sizeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'namesize' => [
                'required',
                'max:35',
                'min:1',
                // function ($attribute, $value, $fail) {
                //     $this->validateVietnameseCharacters($attribute, $value, $fail);
                // },
            ],
            'motasize' => [
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
            'namesize.min' => "Không được nhập :attribute nhỏ hơn :min kí tự",
            'namesize.max' => "Không được nhập :attribute nhỏ hơn :max kí tự",
            'motasize.min' => "Không được nhập :attribute nhỏ hơn :min kí tự",
        ];
    }

    public function attributes()
    {
        return [
            'namesize' => 'tên phân loại',
            'motasize' => 'mã phân loại',
        ];
    }
}
