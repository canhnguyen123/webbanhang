<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class productRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'theloai_id' => [
                'required',
                'integer',
                'min:0',
            ],
            'brand_product' => [
                'required',
                'integer',
                'min:0',
            ],
            'product_name' => [
                'required',
                'min:4',
                'max:255',
            ],
            'product_code' => [
                'required',
                'min:4',
                'max:255',
            ],
            'listImg' => [
                'required|array',
            ],
            'materialId' => [
                'required|array',
            ],
            'listQuantity' => [
                'required|array',
            ],
        ];
    }

    public function messages()
    {
        return [
            'theloai_id.required' => "Không được bỏ trống :attribute ",
            'theloai_id.integer' => ":attribute  sai định dạng",
            'theloai_id.min' => "Không thể để :attribute nhỏ hơn bằng 0 ",
            'brand_product.required' => "Không được bỏ trống :attribute ",
            'brand_product.integer' => ":attribute  sai định dạng",
            'brand_product.min' => "Không thể để :attribute nhỏ hơn bằng 0 ",
            'product_name.required' => "Không được bỏ trống :attribute ",
            'product_name.max' => "Không thể để :attribute lớn hơn  :max kí tự",
            'product_name.min' => "Không thể để :attribute nhỏ hơn  :min kí tự",
            'product_code.required' => "Không được bỏ trống :attribute ",
            'product_code.max' => "Không thể để :attribute lớn hơn  :max kí tự",
            'product_code.min' => "Không thể để :attribute nhỏ hơn  :min kí tự",
            'listImg.required' => "Bạn chưa tải :attribute nào lên  ",
            'listImg.array' => "Tải :attribute bị lỗi",
            'materialId.required' => "Bạn chưa tải :attribute nào lên  ",
            'materialId.array' => "Tải :attribute bị lỗi",
            'listQuantity.required' => "Bạn chưa tải :attribute nào lên  ",
            'listQuantity.array' => "Tải :attribute bị lỗi",
        ];
    }

    public function attributes()
    {
        return [
            'theloai_id' => 'thể loại',
            'brand_product' => 'thương hiệu',
            'product_name' => 'tên sản phẩm',
            'product_code' => 'mã sản phẩm',
            'theloai_id' => 'thể loại',
            'brand_product' => 'thương hiệu',
            'listImg' => 'ảnh',
            'materialId' => 'chất liệu',
            'listQuantity' => 'số lượng',
        ];
    }
      
    protected function failedValidation(Validator $validator)
    {
        $response = response()->json([
            'status' => 'fail',
            'errPosition' => 'all',
            'mess' => $validator->errors(),
            'route' => ''
        ]);

        throw new HttpResponseException($response);
    }
}
