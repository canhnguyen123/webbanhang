<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class staffRequest extends FormRequest
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
            'fullname' => [
                'required',
                'max:100',
                'min:5',
            ],
            'code' => [
                'required',
                'max:100',
                'min:5',
                'regex:/^\S*$/',
            ],
            'username' => [
                'required',
                'max:100',
                'min:5',
                'regex:/^\S*$/',
            ],
            'password' => [
                'required',
                'max:100',
                'min:5',
                'regex:/^\S*$/',
            ],
            'email' => [
                'required',
                'max:100',
                'email', // Kiểm tra định dạng email
            ],
            
            'phone' => [
                'required',
                'max:20',
                'min:10',
                'integer',
                'regex:/^\S*$/',
            ],
            'codeRecovery' => [
                'required',
                'max:15',
                'min:10',
                'regex:/^\S*$/',
            ],
        ];
    }

    public function messages()
    {
        return [
            'fullname.min' => "Không được nhập :attribute nhỏ hơn :min kí tự",
            'fullname.max' => "Không được nhập :attribute lớn hơn :max kí tự",
            'fullname.required' => "Không được bỏ trông :attribute ",
            'code.min' => "Không được nhập :attribute nhỏ hơn :min kí tự",
            'code.max' => "Không được nhập :attribute nhỏ hơn :max kí tự",
            'code.required' => "Không được bỏ trông :attribute ",
            'code.regex' => ' :attribute không được chứa khoảng trắng hoặc ký tự đặc biệt.',
            'phone.min' => "Không được nhập :attribute nhỏ hơn :min kí tự",
            'phone.max' => "Không được nhập :attribute lớn hơn :max kí tự",
            'phone.required' => "Không được bỏ trông :attribute ",
            'phone.regex' => ' :attribute không được chứa khoảng trắng hoặc ký tự đặc biệt.',
            'phone.integer' => ' :attribute phải là dạng số .',
        ];
    }

    public function attributes()
    {
        return [
            'fullname' => 'họ và tên',
            'code' => 'mã nhân viên',
            'username' => 'tên đăng nhập',
            'password' => 'mật khẩu',
            'email' => 'email',
            'phone' => 'số điện thoại',
            'codeRecovery' => 'mã khôi phục',
        ];
    }
}
