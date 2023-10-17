@extends('admin')
@section('main')
    <div class="content-wrapper">
        <div class="flex_center">
            <div class=" with-form-100w grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" style="text-align: center">Thêm mới sản phẩm</h4>
                        <form class="forms-sample row">

                            <div class="col-4 slider-product">
                                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-indicators">
                                      <!-- Thẻ này sẽ được tự động tạo sau khi tải lên hình ảnh -->
                                    </div>
                                    <div class="carousel-inner">
                                      <!-- Thẻ này sẽ được tự động tạo sau khi tải lên hình ảnh -->
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                      <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                      <span class="visually-hidden">Next</span>
                                    </button>
                                  </div>
                            </div>
                            <div class="col-8 row">

                                <div class="col-6 pd-0-mg-0-b-0 validate-form">
                                    <div class="form-group form-input col-12 ">
                                        <i class="mdi mdi-rename-box"></i>
                                        <input type="text" id="nameProduct" class="form-control nameProduct " required>
                                        <label> Tên sản phẩm</label>
                                    </div>
                                    <div class="col-12 err"><span class="err-text"></span></div>
                                </div>
                                <div class="col-6 pd-0-mg-0-b-0 validate-form">
                                    <div class="form-group form-input col-12">
                                        <i class="mdi mdi-codepen"></i>
                                        <input type="text" name="product_code" class="form-control product_code uppercaseInput   " required>
                                        <label> Mã sản phẩm</label>
                                    </div>
                                    <div class="col-12 err"><span class="err-text"></span></div>
                                </div>

                                <div class="col-4 pd-0-mg-0-b-0">
                                    <div class="form-group col-12">
                                        <label>Danh mục</label>
                                        <select class="form-control form-control-lg category_select">
                                            @foreach ($listCategory as $item)
                                                <option value="{{ $item->category_id }}">{{ $item->category_name }}</option>
                                            @endforeach


                                        </select>
                                    </div>
                                    <div class="col-6 err"><span></span></div>
                                </div>
                                <div class="col-4 pd-0-mg-0-b-0">
                                    <div class="form-group col-12">
                                        <label>Phân loại</label>
                                        <select class="form-control form-control-lg phanloai_select">
                                            @foreach ($listPhanLoai as $item)
                                                <option value="{{ $item->phanloai_id }}">{{ $item->phanloai_name }}</option>
                                            @endforeach


                                        </select>
                                    </div>
                                    <div class="col-6 err"><span></span></div>
                                </div>

                                <div class="col-4 pd-0-mg-0-b-0">
                                    <div class="form-group col-12">
                                        <label>Thể loại</label>
                                        <select class="form-control form-control-lg theloai_req theloai_id">

                                        </select>
                                    </div>
                                    <div class="col-6 err"><span></span></div>
                                </div>



                                <div class="form-group col-12">
                                    <label for="">Size :</label>
                                    <div class="flex_warp">
                                        @foreach ($listSize as $item)
                                            <div class="item-flex">
                                                <input type="radio" id="{{ $item->size_name }}" name="size"
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
                                                <input type="radio" id="{{ $item->color_name }}" name="color"
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
                                    <button type="submit" class="btn-pimar-key mr-2 add-quantity-item">Thêm</button>

                                </div>
                                <div class="col-12 req-div-quantity">


                                </div>


                                <div class="col-6 pd-0-mg-0-b-0">
                                    <div class="form-group col-12">
                                        <label>Thương hiệu</label>

                                        <select class="form-control brand_product form-control-lg">
                                            @foreach ($listBrand as $item)
                                                <option value="{{ $item->brand_id }}">{{ $item->brand_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-6 err"><span></span></div>
                                </div>
                                <div class="col-6 pd-0-mg-0-b-0">
                                    <div class="form-group col-12">
                                      <label>Tải ảnh lên</label><br>
                                      <input type="file" class="file-upload" id="file-upload-product" multiple>
                                      <div class="col-6 err"><span></span></div>
                                    </div>
                                  </div>
                                <div class="col-12">
                                    <div id="carouselExampleDark" class="carousel carousel-dark slide">
                                        <div class="tab-pane">
                                          <p data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1">Đặc điểm</p>
                                          <p  data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2">Mô tả</p>
                                          <p  data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3">Bảo quản</p>
                                        </div>
                                        <div class="carousel-inner">
                                          <div class="carousel-item active" data-bs-interval="10000">
                                            <textarea name="editor1" id="dacdiem_product" class="editor dacdiem_product" cols="30" rows="10"> </textarea>
                                        </div>
                                          <div class="carousel-item" data-bs-interval="2000">
                                            <textarea name="editor2" id="mota_product" class="editor mota_product" cols="30" rows="10"></textarea>

                                          </div>
                                          <div class="carousel-item">
                                            <textarea name="editor3" id="baoquan_product" class="editor baoquan_product" cols="30" rows="10"></textarea>

                                          </div>
                                        </div>
                                      </div>    
                                </div>
                              <div class="col-12">
                                    <button type="submit" class="btn-pimar-key mr-2" id="add-product">Thêm sản phẩm</button>
                                    <button type="reset" class="btn btn-light">Reset form</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
      </div>


    </div>
@endsection
