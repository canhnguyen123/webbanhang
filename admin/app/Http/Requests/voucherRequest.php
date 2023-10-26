<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class voucherRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'voucher_name' => [
                'required',
                'max:35',
                'min:2',
               
            ],
            'voucher_code' => [
                'required',
                'max:35',
                'min:2',
                
            ],
            'voucher_quantity' => [
                'required',
                'max:35',
                'min:1',
               
            ],
            'voucher_number' => [
                'required',
                'integer',
                'min:1',
                
            ],
            'voucher_number_condition' => [
                'required',
                'integer',
                'min:1',
                
            ],
        ];
    }

    public function messages()
    {
        return [
            'voucher_name.min' => "Không được nhập :attribute nhỏ hơn :min kí tự",
            'voucher_name.max' => "Không được nhập :attribute nhỏ hơn :max kí tự",
            'voucher_name.required' => "Không được bỏ trống :attribute ",
            'voucher_code.min' => "Không được nhập :attribute nhỏ hơn :min kí tự",
            'voucher_code.max' => "Không được nhập :attribute nhỏ hơn :max kí tự",
            'voucher_code.required' => "Không được bỏ trống :attribute ",
            'voucher_quantity.min' => "Không được nhập :attribute nhỏ hơn :min kí tự",
            'voucher_quantity.integer' => "Không được nhập :attribute là gì ngoài số",
            'voucher_quantity.required' => "Không được bỏ trống :attribute ",
            'voucher_number.min' => "Không được nhập :attribute nhỏ hơn :min kí tự",
            'voucher_number.integer' => "Không được nhập :attribute là gì ngoài số",
            'voucher_number.required' => "Không được bỏ trống :attribute ",
            'voucher_number_condition.min' => "Không được nhập :attribute nhỏ hơn :min kí tự",
            'voucher_number_condition.integer' => "Không được nhập :attribute là gì ngoài số",
            'voucher_number_condition.required' => "Không được bỏ trống :attribute ",
        ];
    }

    public function attributes()
    {
        return [
            'voucher_name' => 'tên voucher',
            'voucher_code' => 'mã voucher',
            'voucher_quantity' => 'số lượng giới hạn voucher',
            'voucher_number' => 'số tiền voucher',
            'voucher_number_condition' => 'số điều kiện voucher',

        ];
    }
}
