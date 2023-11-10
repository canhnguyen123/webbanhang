@extends('admin')
@section('main')
    <div class="content-wrapper">
        <div class="flex_center">
            <div class=" with-form-100w grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" style="text-align: center">Cập nhật sản phẩm</h4>

                        @foreach ($item_product as $itemProduct)
                            <div class="col-12 pd-30 list-item-titel">
                                <a href="{{ route('product_deatil_img', ['product_id' => $itemProduct->product_id]) }}"
                                    class="item-icon mg-5 flex_center icon-edit bg-red-blink">
                                    <i class="mdi mdi-folder-image"></i>
                                    <p>Ảnh</p>
                                </a>
                                <a href="{{ route('product_deatil_Quantity', ['product_id' => $itemProduct->product_id]) }}"
                                    class="item-icon mg-5 flex_center icon-edit bg-yellow-og">
                                    <i class="mdi mdi-numeric-2-box"></i>
                                    <p>Số lượng</p>
                                </a>
                            </div>
                            <form class="forms-sample row col-12"
                                action="{{ route('product_post_update', ['product_id' => $itemProduct->product_id]) }}"
                                method="POST">
                                @csrf
                                @method('put')
                                <div class="col-12 row">

                                    <div class="col-6 pd-0-mg-0-b-0 form-validate">
                                        <div class="form-group form-input col-12 ">
                                            <i class="mdi mdi-rename-box"></i>
                                            <input type="text" id="nameProduct" name="nameProduct"
                                                class="form-control check-emty nameProduct"
                                                value="{{ $itemProduct->product_name }}" required>
                                            <label> Tên sản phẩm</label>
                                        </div>
                                        <div class="col-12 err"><span class="err-text"></span></div>
                                    </div>
                                    <div class="col-6 pd-0-mg-0-b-0 form-validate">
                                        <div class="form-group form-input col-12">
                                            <i class="mdi mdi-codepen"></i>
                                            <input type="text" name="product_code"
                                                class="form-control check-emty product_code uppercaseInaput"
                                                value="{{ $itemProduct->product_code }}" required>
                                            <label> Mã sản phẩm</label>
                                        </div>
                                        <div class="col-12 err"><span class="err-text"></span></div>
                                    </div>

                                    <div class="col-4 pd-0-mg-0-b-0">
                                        <div class="form-group col-12">
                                            <label>Danh mục</label>
                                            <select class="form-control form-control-lg category_select">
                                                <option value="{{ $itemProduct->category_id }}">
                                                    {{ $itemProduct->category_name }}</option>
                                                @foreach ($listCategory as $item)
                                                    @if ($itemProduct->category_id != $item->category_id)
                                                        <option value="{{ $item->category_id }}">{{ $item->category_name }}
                                                        </option>
                                                    @endif
                                                @endforeach


                                            </select>
                                        </div>
                                        <div class="col-6 err"><span></span></div>
                                    </div>
                                    <div class="col-4 pd-0-mg-0-b-0">
                                        <div class="form-group col-12">
                                            <label>Phân loại</label>
                                            <select class="form-control form-control-lg phanloai_select">
                                                <option value="{{ $itemProduct->phanloai_id }}">
                                                    {{ $itemProduct->phanloai_name }}</option>

                                                @foreach ($listPhanLoai as $item)
                                                    @if ($itemProduct->phanloai_id != $item->phanloai_id)
                                                        <option value="{{ $item->phanloai_id }}">
                                                            {{ $item->phanloai_name }}
                                                        </option>
                                                    @endif
                                                @endforeach




                                            </select>
                                        </div>
                                        <div class="col-6 err"><span></span></div>
                                    </div>

                                    <div class="col-4 pd-0-mg-0-b-0">
                                        <div class="form-group col-12">
                                            <label>Thể loại</label>
                                            <select class="form-control form-control-lg theloai_req theloai_id"
                                                name="theloai_id">
                                                <option value="{{ $itemProduct->theloai_id }}">
                                                    {{ $itemProduct->theloai_name }}
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-6 err"><span></span></div>
                                    </div>





                                    <div class="col-6 pd-0-mg-0-b-0">
                                        <div class="form-group col-12">
                                            <label>Thương hiệu</label>

                                            <select class="form-control brand_product form-control-lg" name="brand_product">
                                                <option value="{{ $itemProduct->brand_id }}">
                                                    {{ $itemProduct->brand_name }}
                                                </option>
                                                @foreach ($listBrand as $item)
                                                    @if ($itemProduct->brand_id != $item->brand_id)
                                                        <option value="{{ $item->brand_id }}">{{ $item->brand_name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-6 err"><span></span></div>
                                    </div>
                                    <div class="col-12 row form-group">
                                        <label for="">Chất liệu :</label>
                                        @foreach ($item_product_Material as $item)
                                            <div class="col-xl-4 col-lg-6 col-sm-12 flex_start pg-15-0">
                                                <input type="checkbox" name="materialId[]" checked class="mg-right-5"
                                                    value="{{ $item->material_id  }}">
                                                {{ $item->material_name }}
                                            </div>
                                        @endforeach

                                        @foreach ($listMaterial as $Myitem)
                                            @php
                                                $isChecked = false;
                                            @endphp

                                            @foreach ($item_product_Material as $item)
                                                @if ($item->material_id === $Myitem->material_id)
                                                    @php
                                                        $isChecked = true;
                                                        break;
                                                    @endphp
                                                @endif
                                            @endforeach

                                            @if (!$isChecked)
                                                <div class="col-xl-4 col-lg-6 col-sm-12 flex_start pg-15-0">
                                                    <input type="checkbox" name="materialId[]" class="mg-right-5"
                                                        value="{{ $Myitem->material_id }}">
                                                    {{ $Myitem->material_name }}
                                                </div>
                                            @endif
                                        @endforeach
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
                                                    <textarea name="dacdiem_product" id="dacdiem_product" class="editor dacdiem_product" cols="30" rows="10">{{ $itemProduct->product_dacdiem }} </textarea>
                                                </div>
                                                <div class="carousel-item" data-bs-interval="2000">
                                                    <textarea name="mota_product" id="mota_product" class="editor mota_product" cols="30" rows="10">{{ $itemProduct->product_mota }}</textarea>

                                                </div>
                                                <div class="carousel-item">
                                                    <textarea name="baoquan_product" id="baoquan_product" class="editor baoquan_product" cols="30" rows="10">{{ $itemProduct->product_baoquan }}</textarea>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn-pimar-key mr-2">Cập nhật sản
                                            phẩm</button>
                                        <button type="reset" class="btn btn-light">Reset form</button>
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
