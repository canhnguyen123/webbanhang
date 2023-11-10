  @extends('admin')
@section('main')
<div class="content-wrapper">
  <div class="flex_center">
    <div class=" with-form-800  grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title" style="text-align: center">Chi tiết đơn hàng</h4>
            @foreach ($item_bill as $item)
            <form class="forms-sample row" action="{{ route('payment_action',['payment_id'=>$item->payment_id]) }}" method="post">
              {{@csrf_field()}}
              @if ($errors->any())
                <div class="alert col-12 alert-danger text-center">
                    <span>Có lỗi xảy ra vui lòng kiểm tra lại dữ liệu</span>
                </div>
             @endif
             @if(session('errorMessage'))
                <div class="col-12 alert alert-danger">
                    {{ session('errorMessage') }}
                </div>
            @endif
             @if ($item->statusPayment_id===1)
             <div class="form-group  col-6">
              <label> Tạo đơn cho khách</label>
              <select class="form-select he-46 payment-change" name="change_payment" id="payment-change">
                <option value="2">Xác nhận tạo đơn</option>
                <option value="5">Hủy không tạo đơn</option>
              </select>
            </div>
            <div class="form-group col-6 tran-0-5 payment-code" id="payment-code">
              <label> Mã đơn hàng</label>
              <input type="text" name="codePayment" id="" class="form-control" required>          
            </div>
            <div class="form-group col-12 tran-0-5 payment-note" id="payment-code">
              <label> Địa chỉ gửi hàng</label>
              <input type="text" name="localtionPayment" id="" class="form-control" required>          
            </div>
            <div class="form-group col-12 tran-0-5 payment-note" id="payment-note">
              <label> Ghi chú</label>
              <textarea name="notePayment"  class="editor" cols="30" rows="10"></textarea>
              </div>
              <div class="form-group col-12 tran-0-5 reason-mess" id="reason-mess" style="display: none">
                <label> Lý do không tạo đơn</label>
                <textarea name="reason_mess" class="editor" cols="30" rows="10"></textarea>
              </div>
              <div class="col-6 flex_start">
                <button type="submit" class=" btn-pimar-key mr-2" style="width: 200px;">Lưu</button>
             </div>
              @elseif ($item->statusPayment_id===2)
              <div class="form-group  col-6">
                <label> Đóng gói và chuyển cho bên vận chuyển</label>
                <select class="form-select he-46 payment-change" name="change_payment" id="payment-change">
                  <option value="3">Xác nhận</option>
                  <option value="5">Hủy không tạo đơn</option>
                </select>
              </div>
              <div class="form-group col-12 tran-0-5 payment-note" id="payment-note">
                <label> Ghi chú</label>
                <textarea name="notePayment"  class="editor" cols="30" rows="10"> {{$item->payment_note}} </textarea>
                </div>
                <div class="form-group col-12 tran-0-5 reason-mess" id="reason-mess" style="display: none">
                  <label> Lý do không tạo đơn</label>
                  <textarea name="reason_mess"  class="editor" cols="30" rows="10"></textarea>
                </div>
                <div class="col-6 flex_start">
                  <button type="submit" class=" btn-pimar-key mr-2" style="width: 200px;">Lưu</button>
               </div>
            
             @elseif ($item->statusPayment_id===3)
             <div class="form-group  col-6">
               <label> Xác nhận giao hàng thành công</label>
               <select class="form-select he-46 payment-change" name="change_payment" id="payment-change">
                 <option value="4">Xác nhận</option>
                 <option value="5">Hủy không tạo đơn</option>
               </select>
             </div>
             <div class="form-group col-12 tran-0-5 payment-note" id="payment-note">
               <label> Ghi chú</label>
               <textarea name="notePayment"  class="editor" cols="30" rows="10"> {{$item->payment_note}} </textarea>
               </div>
               <div class="form-group col-12 tran-0-5 reason-mess" id="reason-mess" style="display: none">
                 <label> Lý do không tạo đơn</label>
                 <textarea name="reason_mess"  class="editor" cols="30" rows="10"></textarea>
               </div>
               <div class="col-6 flex_start">
                 <button type="submit" class=" btn-pimar-key mr-2" style="width: 200px;">Lưu</button>
              </div>
              @elseif ($item->statusPayment_id===4)
             <div class="form-group  col-6">
               <label> Chuyển đơn hàng vào mục hoàn thành</label>
               <select class="form-select he-46 payment-change" name="change_payment" id="payment-change">
                 <option value="6">Xác nhận</option>
                 <option value="5">Hủy</option>
               </select>
             </div>
             <div class="form-group col-12 tran-0-5 payment-note" id="payment-note">
               <label> Ghi chú</label>
               <textarea name="notePayment"  class="editor" cols="30" rows="10"> {{$item->payment_note}} </textarea>
               </div>
               <div class="form-group col-12 tran-0-5 reason-mess" id="reason-mess" style="display: none">
                 <label> Lý do không chuyển</label>
                 <textarea name="reason_mess" class="editor" cols="30" rows="10"></textarea>
               </div>
               <div class="col-6 flex_start">
                 <button type="submit" class=" btn-pimar-key mr-2" style="width: 200px;">Lưu</button>
              </div>
          
              @endif
            </form>
            <div class="payment-infro pd-100-0 row">
              
                    <div class="col-6">
                      <p><label for="">Tên người đặt :</label> {{$item->user_fullname}} </p>
                    </div>
                    <div class="col-6">
                      <p><label for="">SĐT người đặt :</label> {{$item->user_phone}} </p>
                    </div>
                    <div class="col-6">
                      <p><label for="">Tên người nhận :</label> {{$item->payment_nameUser}} </p>
                    </div>
                    <div class="col-6">
                      <p><label for="">SĐT người đặt :</label> {{$item->payment_phoneUser}} </p>
                    </div>
                    <div class="col-6">
                      <p><label for="">Vị trí gửi :</label> 
                        @if (strlen($item->payment_localtion)===0)
                              Chưa tạo vị trí
                        @else
                          {{$item->payment_localtion}}
                        @endif
                      </p>
                    </div>
                    <div class="col-6">
                      <p><label for="">Mã đơn :</label> 
                        @if (strlen($item->payment_code)===0)
                              Chưa mã đơn
                        @else
                          {{$item->payment_code}}
                        @endif
                         </p>
                    </div>
                    <div class="col-12">
                      <p><label for="">Địa chỉ nhận :</label> 
                       {{$item->payment_addressUser}}
                         </p>
                    </div>
                    <div class="col-6">
                      <p><label for="">Phương thức thanh toán :</label> 
                       {{$item->methodPayment_name}}
                         </p>
                    </div>
                    <div class="col-6">
                      <p><label for="">Trạng thái đơn hàng:</label> 
                       {{$item->statusPayment_name}}
                         </p>
                    </div>
                    <div class="col-6">
                      <p><label for="">Trạng thái thanh toán :</label> 
                        @if ($item->isPayment===0)
                             Chưa thanh toán
                        @else
                              Đã thanh toán
                        @endif
                         </p>
                    </div>
                    <div class="col-6">
                      <p><label for="">Tổng tiền :</label> 
                        {{number_format($item->payment_allPrice)}} VNĐ
                        </p>
                    </div>
                    <div class="col-12">
                      <p><label for="">Ghi chú :</label> 
                        {{$item->payment_note}} 
                        </p>
                    </div>
                @endforeach
              
                <div class="col-12 req-div-quantity" style="padding-bottom: 20px">
                  @foreach ($item_bill_Deatil as $item)
                      <div class="swiper-slide item-quantity">
                          <div class="item-quantity-div item-quantity-color">
                            <p>Tên sản phẩm: <span>{{ $item->product_name }}</span></p>
                          </div>
                          <div class="item-quantity-div item-quantity-Size">
                              <p>Mã sản phẩm: <span>{{ $item->product_code }}</span></p>
                          </div>
                          <div class="item-quantity-div item-quantity-color">
                              <p>Màu sắc: <span>{{ $item->product_color }}</span></p>
                          </div>
                          <div class="item-quantity-div item-quantity-Size">
                              <p>Size: <span>{{ $item->product_size }}</span></p>
                          </div>
                          <div class="item-quantity-div item-quantity-quantity">
                              <p>Số lượng: <span>{{ $item->product_quantity }}</span></p>
                          </div>
                          <div class="item-quantity-div item-quantity-price-import">
                              <p>Giá lúc bán: <span>{{number_format($item->product_price)}} VNĐ</span></p>
                          </div>
                          <div class="item-quantity-div item-quantity-price-out">
                              <p>Giá hiện tại: <span>{{number_format($item->productQuantity_priceOut)}} VNĐ</span></p>
                          </div>
                      
                      </div>
                  @endforeach

              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

  
</div>
@endsection
