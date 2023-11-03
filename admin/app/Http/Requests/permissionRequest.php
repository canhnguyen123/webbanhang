<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class permissionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'permissionName' => [
                'required',
                'max:100',
                'min:2',
              
            ],
            'permissionCode' => [
                'required',
                'max:100',
                'min:1',
                
            ],
            'permissionRouter' => [
                'required',
                'max:100',
                'min:2',
            ],
            // 'permissionGroupId' => [
            //     'required',                
            // ],
        ];
    }

    public function messages()
    {
        return [
            'permissionName.min' => "Không được nhập :attribute nhỏ hơn :min kí tự",
            'permissionName.max' => "Không được nhập :attribute nhỏ hơn :max kí tự",
            'permissionName.required' => "Không được bỏ trống :attribute ",
            'permissionCode.min' => "Không được nhập :attribute nhỏ hơn :min kí tự",
            'permissionCode.max' => "Không được nhập :attribute nhỏ hơn :max kí tự",
            'permissionCode.required' => "Không được bỏ trống :attribute ",
            'permissionRouter.min' => "Không được nhập :attribute nhỏ hơn :min kí tự",
            'permissionRouter.max' => "Không được nhập :attribute nhỏ hơn :max kí tự",
            'permissionRouter.required' => "Không được bỏ trống :attribute ",
            // 'permissionGroupId.required' => "Không được bỏ trống :attribute ",
        ];
    }

    public function attributes()
    {
        return [
            'permissionName' => 'tên quyền',
            'permissionCode' => 'mã quyền',
            'permissionRouter' => 'đường dẫn',
            // 'permissionGroupId' => 'nhóm quyền',
        ];
    }
}
