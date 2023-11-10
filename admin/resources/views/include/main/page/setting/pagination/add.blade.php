@extends('admin')
@section('main')
    <div class="content-wrapper">
        <div class="flex_center">
            <div class=" with-form-800  grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" style="text-align: center">Thêm mới phân trang</h4>
                        <form class="forms-sample row" action="{{ route('pagination.post.add') }}" method="post">
                            {{ @csrf_field() }}
                            @if ($errors->any())
                                <div class="alert col-12 alert-danger text-center">
                                    <span>Có lỗi xảy ra vui lòng kiểm tra lại dữ liệu</span>
                                </div>
                            @endif
                            @if (session('errorMessage'))
                                <div class="col-12 alert alert-danger">
                                    {{ session('errorMessage') }}
                                </div>
                            @endif
                            <div class="form-group form-input col-xl-6 col-sm-12">
                                <div class="col-12">
                                    <i class="mdi mdi-rename-box"></i>
                                    <input type="text" name="pagination_tbl" class="form-control"
                                        value="{{ old('pagination_tbl') }}" required>
                                    <label> Tên  bảng</label>

                                </div>
                                <div class="col-12 err">
                                    <span>
                                        @error('pagination_tbl')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="form-group form-input col-xl-6 col-sm-12">
                                <div class="col-12">
                                    <i class="mdi mdi-codepen"></i>
                                    <input type="text" name="pagination_name" class="form-control"
                                        value="{{ old('pagination_name') }}" required>
                                    <label> Tên mục</label>
                                </div>
                                <div class="col-12 err">
                                    <span>
                                        @error('pagination_name')
                                            {{ $message }}
                                        @enderror

                                    </span>
                                </div>
                            </div>

                            <div class="form-group form-input col-xl-6 col-sm-12">
                                <div class="col-12">
                                    <i class="mdi mdi-rename-box"></i>
                                    <input type="text" name="pagination_primaryKey" class="form-control"
                                        value="{{ old('pagination_primaryKey') }}" required>
                                    <label>Khóa chính</label>

                                </div>
                                <div class="col-12 err">
                                    <span>
                                        @error('pagination_primaryKey')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                     
                            <div class="form-group form-input col-xl-6 col-sm-12">
                                <div class="col-12">
                                    <i class="mdi mdi-rename-box"></i>
                                    <input type="text" name="pagination_nameElement" class="form-control"
                                        value="{{ old('pagination_nameElement') }}" required>
                                    <label>Element Name</label>

                                </div>
                                <div class="col-12 err">
                                    <span>
                                        @error('pagination_nameElement')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="form-group form-input col-xl-6 col-sm-12">
                                <div class="col-12">
                                    <i class="mdi mdi-rename-box"></i>
                                    <input type="text" name="pagination_limitDeaful" class="form-control"
                                        value="{{ old('pagination_limitDeaful') }}" required>
                                    <label>Số hàng mặc định</label>

                                </div>
                                <div class="col-12 err">
                                    <span>
                                        @error('pagination_limitDeaful')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="form-group form-input col-xl-6 col-sm-12">
                                <div class="col-12">
                                    <i class="mdi mdi-rename-box"></i>
                                    <input type="text" name="pagination_limitAcction" class="form-control"
                                        value="{{ old('pagination_limitAcction') }}" required>
                                    <label>Số hàng lấy ra theo hành động</label>

                                </div>
                                <div class="col-12 err">
                                    <span>
                                        @error('pagination_limitAcction')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="form-group form-input col-xl-6 col-sm-12">
                                <div class="col-12">
                                    <select class="form-select he-46 " name="pagination_category">
                                        <option disabled>Chọn kiểu phân trang</option>
                                        <option value="0">Phân trang truyền thống</option>
                                        <option value="1">Loadmore</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-12 col-sm-12">
                                <button type="submit" class=" btn-pimar-key mr-2" style="width: 200px;">Thêm</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
