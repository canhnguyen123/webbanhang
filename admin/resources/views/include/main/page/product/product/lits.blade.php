@extends('admin')
@section('main')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="list-item-titel">
                    <a href="{{ route('product_add') }}" class="item-icon flex_center mg-5 icon-edit bg-violet">
                        <i class="mdi mdi-plus"></i>
                        <p>Thêm</p>
                    </a>
                    <div class="item-icon toggle-search flex_center mg-5 icon-edit bg-violet">
                        <i class="mdi mdi-magnify"></i>
                        <p>Tìm kiếm</p>
                    </div>
                    <div class="item-icon toggle-filter flex_center mg-5 icon-edit bg-violet">
                        <i class="mdi mdi-filter"></i>
                        <p>Lọc</p>
                    </div>
                    <div class="item-icon  flex_center mg-5 icon-edit bg-violet" id="return-product">
                        <i class="mdi mdi-keyboard-return"></i>
                        <p>Quay lại</p>
                    </div>
                    <a href="{{route('product_showHome')}}" class="item-icon  flex_center mg-5 icon-edit bg-violet active-box" id="return-theloai">
                        <i class="mdi mdi-home"></i>
                        <p>Hiển thị ở trang chủ</p>
                      </a>
                </div>
            </div>
        </div>
        <div class="row ">
            <div class="col-md-12 grid-margin stretch-card  ">
                <div class="row div-search" style="display: none">
                    <form action="" class="search-form flex_center">
                        <input type="text" id="product-search" class="search-input" placeholder="Nhập thông tin tìm kiếm"
                            required>
                        <i id="product-search-btn" class="mdi icon-search mdi-magnify"></i>
                        <i class="fail-icon mdi mdi-close"></i>
                    </form>
                </div>
            </div>
            <div class="col-12 row pd-bt-45   grid-margin stretch-cardfi toggle-filter-div fitter-product" style="display: none">
                <div class="load-more-down flex_center"><i class="mdi mdi-chevron-down"></i></div>
                <div class="form-group col-4">
                    <label for="exampleFormControlSelect1">Danh mục</label>
                    <select class="form-control form-control-lg category_select">
                        @foreach ($listCategory as $item)
                            <option value="{{ $item->category_id }}">{{ $item->category_name }}</option>
                        @endforeach


                    </select>
                </div>
                <div class="form-group col-4">
                    <label for="exampleFormControlSelect1">Phân loại</label>
                    <select class="form-control form-control-lg phanloai_select">
                        @foreach ($listPhanLoai as $item)
                            <option value="{{ $item->phanloai_id }}">{{ $item->phanloai_name }}</option>
                        @endforeach


                    </select>
                </div>  

                <div class="form-group col-4 ">

                    <label>Thể loại</label>
                    <select class="form-control form-control-lg theloai_req theloai_id filtter">
                        <option value="all">Tất cả</option>
                    </select>

                </div>

                <div class="form-group col-4 row-2-col">
                    <label for="exampleFormControlSelect1">Trạng thái</label>
                    <select class="form-control form-control-lg select_status">
                        <option value="all">Tất cả</option>
                        <option value="1">Đang bật</option>
                        <option value="0">Đang tắt</option>
                    </select>
                </div>
                <div class="form-group row-2-col col-4">
                    <label for="exampleFormControlSelect1">Thương hiệu</label>
                    <select class="form-control form-control-lg brand_id">
                        <option value="all">Tất cả</option>
                        @foreach ($listBrand as $item)
                            <option value="{{ $item->brand_id }}">{{ $item->brand_code }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group flex_bottom div-btn-filter col-4">
                    <button type="submit" class="btn-pimar-key mr-2 filter-product"><i class="mdi mdi-filter" style="margin-right: 5px"></i> Lọc</button>
                </div>
                <div class="col-12 row filter-advanced" style="display: none">
                    <div class="form-group  col-6">
                        <label for="exampleFormControlSelect1">Màu sắc</label>
                        <select class="form-control form-control-lg color_product">
                            <option value="all">Tất cả</option>
                            @foreach ($listColor as $item)
                                <option value="{{ $item->color_name  }}">{{ $item->color_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group  col-6">
                        <label for="exampleFormControlSelect1">Kích cỡ</label>
                       
                        <select class="form-control form-control-lg size_product">
                            <option value="all">Tất cả</option>
                            @foreach ($listSize as $item)
                                <option value="{{ $item->size_name }}">{{ $item->size_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-3 pd-0-mg-0-b-0 validate-form">
                        <div class="form-group form-input col-12">
                            <input type="text" class="form-control price-out number-input startPrice" required>
                            <label>Giá bán bắt đầu</label>
                        </div>
                        <div class="col-12 err"><span class="err-text-price-out err-text error-message"></span></div>
                    </div>
                    <div class="col-3 pd-0-mg-0-b-0 validate-form">
                        <div class="form-group form-input col-12">
                            <input type="text" class="form-control price-out number-input endPrice" required>
                            <label>Giá bán kết thúc</label>
                        </div>
                        <div class="col-12 err"><span class="err-text-price-out err-text error-message"></span></div>
                    </div>
                    <div class="col-3 pd-0-mg-0-b-0 validate-form">
                        <div class="form-group form-input col-12">
                            <input type="text" class="form-control price-out err-text number-input startQuantity" required>
                            <label>Số lượng bắt đầu</label>
                        </div>
                        <div class="col-12 err"><span class="err-text-price-out err-text  error-message"></span></div>
                    </div>
                    <div class="col-3 pd-0-mg-0-b-0 validate-form">
                        <div class="form-group form-input col-12">
                            <input type="text" class="form-control price-out number-input endQuantity" required>
                            <label>Số lượng kết thúc</label>
                        </div>
                        <div class="col-12 err"><span class="err-text-price-out err-text error-message"></span></div>
                    </div>
                    <div class="form-group flex_bottom  col-6">
                        <button type="submit" class="btn-pimar-key mr-2 filter-product-plus"><i class="mdi mdi-filter" style="margin-right: 5px"></i> Lọc</button>
                    </div>
                </div>
            </div>

            <div class="col-12  grid-margin stretch-card ">

                <span class="req-text-mess"></span>

            </div>

            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title flex_center"> Danh sách sản phẩm</p>
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table id="example" class="display expandable-table" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th colspan="1">STT</th>
                                                <th colspan="3">Tên</th>
                                                <th colspan="2">Mã</th>
                                                <th colspan="1" style="text-align: center">Trạng thái</th>
                                                <th colspan="3" style="text-align: center">Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody id="list-product">
                                            @foreach ($list_product as $item)
                                                <tr>
                                                    <td colspan="1">{{ $i++ }}</td>
                                                    <td colspan="3">{{ $item->product_name }}</td>
                                                    <td colspan="2">{{ $item->product_code }}</td>
                                                    <td colspan="1" style="text-align: center">
                                                        @if ($item->product_status === 1)
                                                            <i class="pass-icon mdi mdi-check"></i>
                                                        @else
                                                            <i class="fail-icon mdi mdi-close"></i>
                                                        @endif
                                                    </td>

                                                    <td colspan="3" class="flex_center">
                                                        <div class="list-icon flex_center">
                                                            <a href="{{ route('product_deatil', ['product_id' => $item->product_id]) }}"
                                                                class="item-icon mg-5 flex_center icon-edit bg-da">
                                                                <i class="mdi mdi-eye"></i>
                                                                <p>Xem chi tiết</p>
                                                            </a>
                                                            <a href="{{ route('product_update', ['product_id' => $item->product_id]) }}"
                                                                class="item-icon mg-5 flex_center icon-edit bg-yellow-og">
                                                                <i class="mdi mdi-lead-pencil"></i>
                                                                <p>Cập nhật</p>
                                                            </a>

                                                            @if ($item->product_status === 1)
                                                                <a onclick="return confirm('Bạn có muốn ẩn không ?')"
                                                                    href="{{ route('product_toogle_status', ['product_id' => $item->product_id, 'product_status' => 1]) }}"
                                                                    class="item-icon mg-5 flex_center icon-edit bg-red-blink">
                                                                    <i class="mdi mdi-toggle-switch"></i>
                                                                    <p>Ẩn</p>
                                                                </a>
                                                            @else
                                                                <a onclick="return confirm('Bạn có muốn hiện không ?')"
                                                                    href="{{ route('product_toogle_status', ['product_id' => $item->product_id, 'product_status' => 0]) }}"
                                                                    class="item-icon mg-5 flex_center icon-edit bg-yellow-green">
                                                                    <i class="mdi mdi-toggle-switch-off"></i>
                                                                    <p>Hiện</p>
                                                                </a>
                                                            @endif


                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                        @include('ohther.pagination.pagination', [
                                            'paginator' => $list_product,
                                        ])
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div>
@endsection
