<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class paginationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'pagination_tbl' => [
                'required',
                'max:255',
                'min:2',
               
            ],
            'pagination_name' => [
                'required',
                'max:255',
                'min:1',
              
            ],
            'pagination_primaryKey' => [
                'required',
                'max:255',
                'min:2',
               
            ],
            'pagination_nameElement' => [
                'required',
                'max:255',
                'min:1',
              
            ],
            'pagination_limitDeaful' => [
                'required',
                'integer',
                'min:1',
               
            ],
            'pagination_limitAcction' => [
                'required',
                'integer',
                'min:1',
              
            ],
        ];
    }

    public function messages()
    {
        return [
            'pagination_tbl.min' => "Không được nhập :attribute nhỏ hơn :min kí tự",
            'pagination_tbl.max' => "Không được nhập :attribute lớn hơn :max kí tự",
            'pagination_tbl.required' => "Không được bỏ trống :attribute ",

            'pagination_name.max' => "Không được nhập :attribute lớn hơn :max kí tự",
            'pagination_name.min' => "Không được nhập :attribute nhỏ hơn :min kí tự",
            'pagination_name.required' => "Không được bỏ trống :attribute ",

            'pagination_primaryKey.min' => "Không được nhập :attribute nhỏ hơn :min kí tự",
            'pagination_primaryKey.max' => "Không được nhập :attribute lớn hơn :max kí tự",
            'pagination_primaryKey.required' => "Không được bỏ trống :attribute ",

            'pagination_nameElement.max' => "Không được nhập :attribute lớn hơn :max kí tự",
            'pagination_nameElement.min' => "Không được nhập :attribute nhỏ hơn :min kí tự",
            'pagination_nameElement.required' => "Không được bỏ trống :attribute ",

            
            'pagination_limitDeaful.integer' => ":attribute phải là số nguyên",
            'pagination_limitDeaful.required' => "Không được bỏ trống :attribute ",
            'pagination_limitDeaful.min' => "Không được nhập :attribute nhỏ hơn :min",

            'pagination_limitAcction.integer' => ":attribute phải là số nguyên",
            'pagination_limitAcction.required' => "Không được bỏ trống :attribute ",
            'pagination_limitAcction.min' => "Không được nhập :attribute nhỏ hơn :min",
        ];
    }

    public function attributes()
    {
        return [
            'pagination_tbl' => 'tên bảng',
            'pagination_name' => 'tên mục',
            'pagination_primaryKey' => 'khóa chính',
            'pagination_nameElement' => 'Element name',
            'pagination_limitDeaful' => 'Số hàng lấy ra mặc định',
            'pagination_limitAcction' => 'Số hàng lấy ra theo hành động',
            
        ];
    }
}
