<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class permissionGroupRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'permissionGroupName' => [
                'required',
                'max:255',
                'min:2',
               
            ],
            'permissionGroupCode' => [
                'required',
                'max:255',
                'min:1',
              
            ],
        ];
    }

    public function messages()
    {
        return [
            'permissionGroupName.min' => "Không được nhập :attribute nhỏ hơn :min kí tự",
            'permissionGroupName.max' => "Không được nhập :attribute lớn hơn :max kí tự",
            'permissionGroupName.required' => "Không được bỏ trống :attribute ",
            'permissionGroupCode.max' => "Không được nhập :attribute lớn hơn :max kí tự",
            'permissionGroupCode.min' => "Không được nhập :attribute nhỏ hơn :min kí tự",
            'permissionGroupCode.required' => "Không được bỏ trống :attribute ",
        ];
    }

    public function attributes()
    {
        return [
            'permissionGroupName' => 'tên nhóm quyền',
            'permissionGroupCode' => 'mã nhóm quyền',
        ];
    }
}
