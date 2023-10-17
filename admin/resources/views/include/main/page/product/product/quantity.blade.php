@extends('admin')
@section('main')
    <div class="content-wrapper">
        <div class="flex_center">
            <div class=" with-form-100w grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" style="text-align: center">Thêm mới sản phẩm</h4>
                        <form class="forms-sample row">
                          <div class="col-12 row">
                                  <div class="form-group col-12">
                                    <label for="">Size :</label>
                                    <div class="flex_warp">
                                        @foreach ($listSize as $item)
                                            <div class="item-flex">
                                                <input type="radio" class="list-size-quantity" id="{{ $item->size_name }}" name="size"
                                                    value="{{ $item->size_name }}"
                                                    @if ($loop->first) checked @endif>
                                                {{ $item->size_name }}
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="form-group col-12">
                                    <label for="">Màu:</label>
                                    <div class="flex_warp">
                                        @foreach ($listColor as $item)
                                            <div class="item-flex">
                                                <input type="radio" class="list-color-quantity"    id="{{ $item->color_name }}" name="color"
                                                    value="{{ $item->color_name }}"
                                                    @if ($loop->first) checked @endif>
                                                {{ $item->color_name }}
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="col-4 pd-0-mg-0-b-0">
                                    <div class="form-group form-input col-12 ">
                                        <input type="text" class="form-control quantity-product number-input"
                                            value="1" required>
                                        <label> Số lượng</label>
                                    </div>
                                    <div class="col-12 err"><span class="err-text-quantity-product error-message"></span>
                                    </div>
                                </div>
                                <div class="col-4 pd-0-mg-0-b-0">
                                    <div class="form-group form-input col-12">
                                        <input type="text" class="form-control price-int number-input" required>
                                        <label>Giá nhập</label>
                                    </div>
                                    <div class="col-12 err"><span class="err-text-quantity-int error-message"></span></div>
                                </div>
                                <div class="col-4 pd-0-mg-0-b-0">
                                    <div class="form-group form-input col-12">
                                        <input type="text" class="form-control price-out number-input" required>
                                        <label>Giá bán</label>
                                    </div>
                                    <div class="col-12 err"><span class="err-text-price-out error-message"></span></div>
                                </div>
                                <div class="col-12 pg-0-0-20-0">
                                    <button type="submit" class="btn-pimar-key mr-2 btn-quantity" id="add-quantity-item" data-product="{{$product_id}}">Thêm</button>
                                    <button type="submit" class="btn-pimar-key mr-2 btn-quantity" id="update-quantity-item" data-product="{{$product_id}}" style="display: none">Cập nhật</button>
                                </div>
                                <div class="col-12 req-div-quantity">
                                    @foreach ($item_product_Quantity as $item)
                                    <div class="swiper-slide item-quantity" data-id="{{$item->productQuantity_id}}">
                                        <i class="mdi mdi-border-color quantity-update"></i>
                                        <i class="mdi mdi mdi-close-box quantity-close"></i>
                                        <div class="item-quantity-div item-quantity-color">
                                            <p>Màu sắc: <span class="color-quantity">{{ $item->productQuantity_color }}</span></p>
                                        </div>
                                        <div class="item-quantity-div item-quantity-Size">
                                            <p>Size: <span class="size-quantity">{{ $item->productQuantity_size }}</span></p>
                                        </div>
                                        <div class="item-quantity-div item-quantity-quantity">
                                            <p>Số lượng: <span class="quantity-product">{{ $item->productQuantity }}</span></p>
                                        </div>
                                        <div class="item-quantity-div item-quantity-price-import">
                                            <p>Giá nhập: <span class="priceInt-quantity">{{ number_format($item->productQuantity_priceInt,0) }} VNĐ
                                            </span></p>
                                        </div>
                                        <div class="item-quantity-div item-quantity-price-out">
                                            <p>Giá bán: <span class="priceOut-quantity">{{ number_format($item->productQuantity_priceOut,0) }} VNĐ</span></p>
                                        </div>
                                        <div class="item-quantity-div ">
                                            <p>Trạng thái: <span>
                                                @if ($item->productQuantity_status===1)
                                                    Đang bật <i class="pass-icon mdi mdi-check"></i> <a href="{{route('toogle_statusQuantity',['product_id'=>$item->product_id,'productQuantity_id'=>$item->productQuantity_id,'productQuantity_status'=>1])}}" onclick="return confirm('Bạn có muốn tắt không')"><i class="mdi mdi-toggle-switch-off"></i></a>
                                                @else
                                                    Đang tắt <i class="fail-icon mdi mdi-close"></i><a href="{{route('toogle_statusQuantity',['product_id'=>$item->product_id,'productQuantity_id'=>$item->productQuantity_id,'productQuantity_status'=>0])}}" onclick="return confirm('Bạn có muốn bật không')"><i class="mdi mdi-toggle-switch"></i></a>
                                                @endif
                                            
                                                </span></p>
                                        </div>
                                    </div>
                                @endforeach


                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
      </div>


    </div>
@endsection
