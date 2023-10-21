@extends('admin')
@section('main')
    <div class="content-wrapper">
        <div class="flex_center">
            <div class=" with-form-100w grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" style="text-align: center">Chi tiết voucher</h4>
                        @foreach ($item_voucher as $item)
                        <div class="col-12 row">

                          <div class="col-6 pd-0-mg-0-b-0 validate-form">
                              <div class="form-group  col-12 ">
                                <p>  <label> Tên voucher</label> :{{$item->voucher_name}}</p>
                              </div>
                          </div>
                          <div class="col-6 pd-0-mg-0-b-0 validate-form">
                              <div class="form-group col-12">
                                  <p><label> Mã voucher</label>: {{$item->voucher_code}}</p>
                              </div>
                          </div>


                          <div class="col-4 pd-0-mg-0-b-0">
                              <div class="form-group col-12">
                                  <label for="">Giới hạn</label>
                                  <select class="form-control form-control-lg check-selects" name="voucher_isLimit"
                                      id="is-limit-voucher">
                                      <option value="1">Có</option>
                                      <option value="0">Không</option>
                                  </select>
                              </div>
                          </div>
                          <div class="col-4 pd-0-mg-0-b-0">
                              <div class="form-group col-12">
                                  <label for="">Đơn vị</label>
                                  <select class="form-control form-control-lg voucher-unit check-selects"
                                      id="unit-voucher" name="voucher_unit">
                                      <option value="Free">Free ship</option>
                                      <option value="%">%</option>
                                      <option value="VNĐ">VNĐ</option>
                                  </select>
                                  <input type="hidden" value="0" name="voucher_category" id="voucher_category">
                              </div>
                          </div>
                          <div class="col-4 pd-0-mg-0-b-0">
                              <div class="form-group col-12">
                                  <label for="">Điều kiện</label>
                                  <select class="form-control form-control-lg" name="voucher_condition">
                                      <option value=">">Lớn hơn</option>
                                      <option value=">=">Lớn hơn hoặc bằng</option>
                                      <option value=">=">Bằng</option>
                                      <option value="<=">Nhỏ hơn hoặc bằng</option>
                                      <option value=">=">Nhỏ hơn </option>
                                  </select>
                              </div>
                          </div>
                          <div class="col-4 pd-0-mg-0-b-0 validate-form row">
                              <div class="form-group form-input col-12">
                                  <i class="mdi mdi-codepen"></i>
                                  <input type="text" name="voucher_quantity" id="voucher-quantity"
                                      class="form-control product_code number-input get-number" required>
                                  <label> Số lượng</label>
                              </div>
                              <div class="col-12 err"><span class="err-text"></span></div>
                          </div>
                          <div class="col-4 pd-0-mg-0-b-0 validate-form">
                              <div class="form-group form-input col-12">
                                  <i class="mdi mdi-codepen"></i>
                                  <input type="text" id="voucher_number_condition" name="voucher_number"
                                      class="form-control product_code  number-input  get-number" value="0" required>
                                  <label> Nhập số giảm</label>
                              </div>
                              <div class="col-12 err"><span class="err-text"></span></div>
                          </div>
                          <div class="col-4 pd-0-mg-0-b-0 validate-form">
                              <div class="form-group form-input col-12">
                                  <i class="mdi mdi-codepen"></i>
                                  <input type="text" name="voucher_number_condition"
                                      class="form-control product_code  number-input  " required>
                                  <label> Nhập số của điều kiện</label>
                              </div>
                              <div class="col-12 err"><span class="err-text"></span></div>
                          </div>
                          <div class="col-6 pd-0-mg-0-b-0 validate-form">
                              <div class="form-group form-input col-12 ">
                                  <i class="mdi mdi-calendar-text"></i>
                                  <input type="text" name="voucher_startTime"
                                      class="form-control flatpickr nameProduct " required>
                                  <label> Ngày bắt đầu</label>
                              </div>
                              <div class="col-12 err"><span class="err-text"></span></div>
                          </div>
                          <div class="col-6 pd-0-mg-0-b-0 validate-form">
                              <div class="form-group form-input col-12">
                                  <i class="mdi mdi-calendar-text"></i>
                                  <input type="text" name="voucher_endTime"
                                      class="form-control product_code uppercaseInput flatpickr  " required>
                                  <label>Ngày kết thúc</label>
                              </div>
                              <div class="col-12 err"><span class="err-text"></span></div>
                          </div>
                          <div class="col-12">
                              <label for="">Mô tả</label>
                              <textarea name="voucher_note" id="dacdiem_product" class="editor dacdiem_product" cols="30" rows="10"> </textarea>
                          </div>
                          <div class="col-12">
                              <button type="submit" class="btn-pimar-key mr-2">Thêm voucher</button>
                          </div>
                      </div>
                        @endforeach
                      

                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
