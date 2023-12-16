@extends('admin')
@section('main')
    <div class="content-wrapper">
        <div class="flex_center">
            <div class=" with-form-100w grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" style="text-align: center">Cập nhật voucher</h4>
                        @foreach ($item_voucher as $item)
                            <form class="forms-sample row"
                                action="{{ route('voucher_post_update', ['voucher_id' => $item->voucher_id]) }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="col-12 row">

                                    <div class="col-6 pd-0-mg-0-b-0 validate-form">
                                        <div class="form-group form-input col-12 ">
                                            <i class="mdi mdi-rename-box"></i>
                                            <input type="text" name="voucher_name" class="form-control nameProduct"
                                                value="{{ $item->voucher_name }}" required>
                                            <label> Tên voucher</label>
                                        </div>
                                        <div class="col-12 err"><span class="err-text">
                                                @error('voucher_name')
                                                    {{ $message }}
                                                @enderror
                                            </span></div>
                                    </div>
                                    <div class="col-6 pd-0-mg-0-b-0 validate-form">
                                        <div class="form-group form-input col-12">
                                            <i class="mdi mdi-codepen"></i>
                                            <input type="text" name="voucher_code"
                                                class="form-control product_code uppercaseInput"
                                                value="{{ $item->voucher_code }}" required>
                                            <label> Mã voucher</label>
                                        </div>
                                        <div class="col-12 err"><span class="err-text">
                                                @error('voucher_code')
                                                    {{ $message }}
                                                @enderror
                                            </span></div>
                                    </div>


                                    <div class="col-4 pd-0-mg-0-b-0">
                                        <div class="form-group col-12">
                                            <label for="">Giới hạn</label>
                                            <select class="form-control form-control-lg check-selects"
                                                name="voucher_isLimit" id="is-limit-voucher">
                                                @if ($item->voucher_isLimit === 1)
                                                    <option value="1">Có</option>
                                                @else
                                                    <option value="0">Không</option>
                                                @endif
                                                @if ($item->voucher_isLimit !== 1)
                                                    <option value="1">Có</option>
                                                @endif
                                                @if ($item->voucher_isLimit !== 0)
                                                    <option value="0">Không</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4 pd-0-mg-0-b-0">
                                        <div class="form-group col-12">
                                            <label for="">Đơn vị</label>
                                            <select class="form-control form-control-lg voucher-unit check-selects"
                                                id="unit-voucher" name="voucher_unit">
                                                @if ($item->voucher_unit === 'Free')
                                                    <option value="Free">Free ship</option>
                                                    <option value="%">%</option>
                                                    <option value="VNĐ">VNĐ</option>
                                                @elseif ($item->voucher_unit === '%')
                                                    <option value="%">%</option>
                                                    <option value="Free">Free ship</option>
                                                    <option value="VNĐ">VNĐ</option>
                                                @else
                                                    <option value="VNĐ">VNĐ</option>
                                                    <option value="Free">Free ship</option>
                                                    <option value="%">%</option>
                                                @endif
                                            </select>
                                            <input type="hidden" value="0" name="voucher_category"
                                                id="voucher_category">
                                        </div>
                                    </div>
                                    <div class="col-4 pd-0-mg-0-b-0">
                                        <div class="form-group col-12">
                                            <label for="">Điều kiện</label>
                                            <select class="form-control form-control-lg" name="voucher_condition">
                                                @if ($item->voucher_condition === '>')
                                                    <option value=">">Lớn hơn</option>
                                                    <option value=">=">Lớn hơn hoặc bằng</option>
                                                    <option value="=">Bằng</option>
                                                    <option value="<=">Nhỏ hơn hoặc bằng</option>
                                                    <option value="<=">Nhỏ hơn</option>
                                                @elseif ($item->voucher_condition === '>=')
                                                    <option value=">=">Lớn hơn hoặc bằng</option>
                                                    <option value=">">Lớn hơn</option>
                                                    <option value="=">Bằng</option>
                                                    <option value="<=">Nhỏ hơn hoặc bằng</option>
                                                    <option value="<=">Nhỏ hơn</option>
                                                @elseif ($item->voucher_condition === '=')
                                                    <option value="=">Bằng</option>
                                                    <option value=">">Lớn hơn</option>
                                                    <option value=">=">Lớn hơn hoặc bằng</option>
                                                    <option value="<=">Nhỏ hơn hoặc bằng</option>
                                                    <option value="<=">Nhỏ hơn</option>
                                                @elseif ($item->voucher_condition === '<=')
                                                    <option value="<=">Nhỏ hơn hoặc bằng</option>
                                                    <option value=">">Lớn hơn</option>
                                                    <option value=">=">Lớn hơn hoặc bằng</option>
                                                    <option value="=">Bằng</option>
                                                    <option value="<=">Nhỏ hơn</option>
                                                @elseif ($item->voucher_condition === '<')
                                                    <option value="<=">Nhỏ hơn</option>

                                                    <option value=">">Lớn hơn</option>
                                                    <option value=">=">Lớn hơn hoặc bằng</option>
                                                    <option value="=">Bằng</option>
                                                    <option value="<=">Nhỏ hơn hoặc bằng</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4 pd-0-mg-0-b-0 validate-form row">
                                        <div class="form-group form-input col-12">
                                            <i class="mdi mdi-codepen"></i>
                                            <input type="text" name="voucher_quantity" id="voucher-quantity"
                                                value="{{$item->voucher_quantity}}"
                                                class="form-control product_code number-input get-number" required>
                                            <label> Số lượng</label>
                                        </div>
                                        <div class="col-12 err"><span class="err-text">
                                                @error('voucher_quantity')
                                                    {{ $message }}
                                                @enderror
                                            </span></div>
                                    </div>
                                    <div class="col-4 pd-0-mg-0-b-0 validate-form">
                                        <div class="form-group form-input col-12">
                                            <i class="mdi mdi-codepen"></i>
                                            <input type="text" id="voucher_number_condition" name="voucher_number"
                                            value="{{$item->voucher_number}}"
                                                class="form-control product_code  number-input  get-number" value="0"
                                                required>
                                            <label> Nhập số giảm</label>
                                        </div>
                                        <div class="col-12 err"><span class="err-text">
                                                @error('voucher_number')
                                                    {{ $message }}
                                                @enderror
                                            </span></div>
                                    </div>
                                    <div class="col-4 pd-0-mg-0-b-0 validate-form">
                                        <div class="form-group form-input col-12">
                                            <i class="mdi mdi-codepen"></i>
                                            <input type="text" name="voucher_number_condition"
                                            value="{{$item->voucher_number_condition}}"
                                                class="form-control product_code  number-input  " required>
                                            <label> Nhập số của điều kiện</label>
                                        </div>
                                        <div class="col-12 err"><span class="err-text">
                                                @error('voucher_number_condition')
                                                    {{ $message }}
                                                @enderror
                                            </span></div>
                                    </div>
                                    <div class="col-6 pd-0-mg-0-b-0 validate-form">
                                        <div class="form-group form-input col-12 ">
                                            <i class="mdi mdi-calendar-text"></i>
                                            <input type="text" name="voucher_startTime"
                                                value="{{ $item->voucher_startDate }}" class="form-control flatpickr"
                                                placeholder="Ngày bắt đầu" required>
                                        </div>
                                        <div class="col-12 err"><span class="err-text">
                                                @error('voucher_startTime')
                                                    {{ $message }}
                                                @enderror
                                            </span></div>
                                    </div>
                                    <div class="col-6 pd-0-mg-0-b-0 validate-form">
                                        <div class="form-group form-input col-12">
                                            <i class="mdi mdi-calendar-text"></i>
                                            <input type="text" name="voucher_endTime"
                                                value="{{ $item->voucher_endDate }}"
                                                class="form-control product_code uppercaseInput flatpickr"
                                                placeholder="Ngày kết thúc" required>
                                        </div>
                                        <div class="col-12 err"><span class="err-text">
                                                @error('voucher_endTime')
                                                    {{ $message }}
                                                @enderror
                                            </span></div>
                                    </div>
                                    <div class="col-12">
                                        <label for="">Mô tả</label>
                                        <textarea name="voucher_note" id="dacdiem_product" class="editor dacdiem_product" cols="30" rows="10">{{ $item->voucher_note }} </textarea>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn-pimar-key mr-2">Cập nhật voucher</button>
                                    </div>
                                </div>
                            </form>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
x`