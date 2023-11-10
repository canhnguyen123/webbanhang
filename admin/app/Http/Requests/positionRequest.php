<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class positionRequest extends FormRequest
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
            'nameposition' => [
                'required',
                'max:35',
                'min:2',
                // function ($attribute, $value, $fail) {
                //     $this->validateVietnameseCharacters($attribute, $value, $fail);
                // },
            ],
            'codeposition' => [
                'required',
                'max:15',
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
            'nameposition.min' => "Không được nhập :attribute nhỏ hơn :min kí tự",
            'nameposition.max' => "Không được nhập :attribute nhỏ hơn :max kí tự",
            'codeposition.max' => "Không được nhập :attribute nhỏ hơn :max kí tự",
            'codeposition.min' => "Không được nhập :attribute nhỏ hơn :min kí tự",
        ];
    }

    public function attributes()
    {
        return [
            'nameposition' => 'tên ví trí',
            'codeposition' => 'mã ví trí',
        ];
    }
}
