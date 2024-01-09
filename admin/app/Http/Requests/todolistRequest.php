<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class todolistRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'staff_id' => [
                'required',
                'integer',
                'min:1',
            ],
            'dealine' => [
                'required',
            ],
            'name' => [
                'required',
                'min:4',
                'max:5000'
            ],
        ];
    }

    public function messages()
    {
        return [
            'staff_id.required' => "Không được bỏ trống :attribute",
            'staff_id.integer' => "Bạn đã nhập :attribute sai định dạng",
            'staff_id.min' => "Không được nhập :attribute nhỏ hơn :min",
            'dealine.required' =>  "Không được bỏ trống :attribute",
            'name.required' => "Không được bỏ trống :attribute",
            'name.max' => "Bạn đã nhập :attribute lớn hơn :max",
            'name.min' => "Không được nhập :attribute nhỏ hơn :min",
        ];
    }

    public function attributes()
    {
        return [
            'staff_id' => 'tên nhân viên',
            'dealine' => 'thời gian dealine',
            'name' => 'tên công việc',
        ];
    }
}
