@extends('admin')
@section('main')
    <div class="content-wrapper">
        <div class="flex_center">
            <div class=" with-form-100w grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" style="text-align: center">Chi tiết sản phẩm</h4>
                        @foreach ($item_product as $itemProduct)
                            <div class="col-12 forms-sample row">
                                <div class="col-4 slider-product">
                                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-indicators">
                                            @foreach ($item_product_Img as $key => $item)
                                                <button type="button" data-bs-target="#carouselExampleIndicators"
                                                    data-bs-slide-to="{{ $key }}"
                                                    @if ($key === 0) class="active" @endif></button>
                                            @endforeach
                                        </div>
                                        <div class="carousel-inner">
                                            @foreach ($item_product_Img as $key => $item)
                                                <div class="carousel-item @if ($key === 0) active @endif">
                                                    <img src="{{ $item->productImg_name }}" class="d-block w-100"
                                                        alt="Image {{ $key + 1 }}">
                                                </div>
                                            @endforeach
                                        </div>
                                        <button class="carousel-control-prev" type="button"
                                            data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button"
                                            data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>


                                </div>
                                <div class="col-8 row">

                                    <div class="col-6 pd-0-mg-0-b-0">
                                        <div class="form-group col-12 ">
                                            <p> <label> Tên sản phẩm</label>: {{ $itemProduct->product_name }}</p>
                                        </div>
                                        <div class="col-12 err"><span class="err-text"></span></div>
                                    </div>
                                    <div class="col-6 pd-0-mg-0-b-0">
                                        <div class="form-group col-12">
                                            <p> <label> Mã sản phẩm</label>: {{ $itemProduct->product_code }}</p>

                                        </div>

                                    </div>

                                    <div class="col-4 pd-0-mg-0-b-0">
                                        <div class="form-group col-12">
                                            <p><label>Danh mục</label>: {{ $itemProduct->category_name }}</p>

                                        </div>
                                    </div>
                                    <div class="col-4 pd-0-mg-0-b-0">
                                        <div class="form-group col-12">

                                            <p> <label>Phân loại</label>: {{ $itemProduct->phanloai_name }}</p>
                                        </div>

                                    </div>

                                    <div class="col-4 pd-0-mg-0-b-0">
                                        <div class="form-group col-12">

                                            <p> <label>Thể loại</label>: {{ $itemProduct->theloai_name }}</p>
                                        </div>

                                    </div>
                                    <h4 class="card-title" style="text-align: center">Quản lý số lượng</h4>
                                    <div class="col-12 req-div-quantity" style="padding-bottom: 20px">
                                        @foreach ($item_product_Quantity as $item)
                                            <div class="swiper-slide item-quantity">

                                                <div class="item-quantity-div item-quantity-color">
                                                    <p>Màu sắc: <span>{{ $item->productQuantity_color }}</span></p>
                                                </div>
                                                <div class="item-quantity-div item-quantity-Size">
                                                    <p>Size: <span>{{ $item->productQuantity_size }}</span></p>
                                                </div>
                                                <div class="item-quantity-div item-quantity-quantity">
                                                    <p>Số lượng: <span>{{ $item->productQuantity }}</span></p>
                                                </div>
                                                <div class="item-quantity-div item-quantity-price-import">
                                                    <p>Giá nhập: <span>  {{number_format( $item->productQuantity_priceInt)}} VNĐ</span></p>
                                                </div>
                                                <div class="item-quantity-div item-quantity-price-out">
                                                    <p>Giá bán: <span>{{number_format( $item->productQuantity_priceOut)}} VNĐ</span></p>
                                                </div>
                                                <div class="item-quantity-div ">
                                                    <p>Trạng thái: <span>
                                                            @if ($item->productQuantity_status)
                                                                Đang bật <i class="pass-icon mdi mdi-check"></i>
                                                            @else
                                                                Đang tắt <i class="fail-icon mdi mdi-close"></i>
                                                            @endif

                                                        </span></p>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>


                                    <div class="col-6 pd-0-mg-0-b-0">
                                        <div class="form-group col-12">
                                            <p> <label>Thương hiệu</label>: {{ $itemProduct->brand_name }}</p>

                                        </div>

                                    </div>
                                    <div class="col-6 pd-0-mg-0-b-0">
                                        <div class="form-group col-12">
                                            <p> <label>Trạng thái</label>:
                                                @if ($itemProduct->product_status === 1)
                                                    Đang bật <i class="pass-icon mdi mdi-check"></i>
                                                @else
                                                    Đang tắt <i class="fail-icon mdi mdi-close"></i>
                                                @endif
                                            </p>

                                        </div>

                                    </div>
                                    <div class="col-12 form-group">
                                        <p><label for="">Chất liệu : </label> 
                                        @foreach ($item_product_Material as $item)
                                            {{$item->material_name}}, 
                                        @endforeach
                                        </p>
                                    </div>
                                    <div class="col-12">
                                        <div id="carouselExampleDark" class="carousel carousel-dark slide">
                                            <div class="tab-pane">
                                                <p data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                                                    aria-current="true" aria-label="Slide 1">Đặc điểm</p>
                                                <p data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                                                    aria-label="Slide 2">Mô tả</p>
                                                <p data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                                                    aria-label="Slide 3">Bảo quản</p>
                                            </div>
                                            <div class="carousel-inner">
                                                <div class="carousel-item active" data-bs-interval="10000">
                                                    {!! htmlspecialchars_decode($itemProduct->product_dacdiem) !!}  
                                                </div>
                                                <div class="carousel-item" data-bs-interval="2000">
                                                    {!! htmlspecialchars_decode( $itemProduct->product_mota) !!}

                                                </div>
                                                <div class="carousel-item">
                                                    {!! htmlspecialchars_decode($itemProduct->product_baoquan) !!}
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                        @endforeach
                        <div class="col-12 div-cmt-box">
                            <div class="box-cmt-header flex_center">
                                <h4>Bình luận sản phẩm</h4>
                            </div>
                            <div class=" list-cmt">
                                @foreach ($listCmt as $item)
                                <div class="cmt-item">
                                    <div class="cmt-item-header">
                                        <div class="cmt-item-img">
                                            <img src="
                                            @if ($item->user_id===null)
                                                https://firebasestorage.googleapis.com/v0/b/doan-59ab4.appspot.com/o/admin-icon-strategy-collection-thin-600nw-2307398667.webp?alt=media&token=effed445-5211-4a87-a056-3fc6d5e06ad3
                                            @else
                                                @if ($item->user_linkImg==="")
                                                    https://firebasestorage.googleapis.com/v0/b/doan-59ab4.appspot.com/o/user-profile-icon-free-vector.jpg?alt=media&token=77b7ad6c-3d70-4090-8bab-6fae0b6e0bba
                                                @else
                                                    {{$item->user_linkImg}}
                                                @endif
                                            @endif
                                            " alt="">
                                        </div>
                                        <div class="cmt-item-infro-user flex_start">
                                          
                                            <p>
                                                @if ($item->user_id===null)
                                                    Quản trị viên <small>({{ $item->created_at }})</small>
                                                @else
                                                    {{$item->user_fullname}} <small>({{ $item->created_at }})</small>
                                                @endif

                                            </p>
                                        </div>
                                    </div>
                                    <div class="cmt-item-ifro">
                                        <p> {{$item->comment_context}} </p>
                                    </div>
                                    <div class="reqly-link flex_start">
                                        <p class="reqly-link-text feedback-cmt" style="margin-right: 35px" data-id="{{$item->comment_id}}">Phản hồi</p>
                                        <p class="reqly-link-text count-cmt" data-product_id={{$product_id}} data-id="{{$item->comment_id}}">Có {{$item->feedback_count}} comment phản hồi</p>
                                    </div>
                                    
                                </div>
                                @endforeach

                            </div>
                            <div class="form-input-cmt flex_center">
                                 <form action="" class="form-input-cmt-content">
                                    <input type="text" class="input-cmt" placeholder="Nhập bình luận">
                                   <div class="btn-post-cmt flex_center" data-id="{{$product_id}}">
                                    <i class="mdi mdi-arrow-right"></i>
                                   </div>
                                </form>
                            </div>
                           
                        </div>
                      
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
