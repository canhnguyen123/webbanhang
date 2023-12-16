@extends('admin')
@section('main')
    <div class="content-wrapper">
        <div class="flex_center">
            <div class=" with-form-800  grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" style="text-align: center">Thêm mới phân loại</h4>
                        <form class="forms-sample row" action="{{ route('phanloai_post_add') }}" method="post">
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
                            <div class="col-12">
                                <div class="form-group form-input ">
                                    <i class="mdi mdi-rename-box"></i>
                                    <input type="text" name="namephanloai" class="form-control"
                                        value="{{ old('namephanloai') }}" required>
                                    <label> Tên phân loại</label>
                                </div>
                                <div class="col-6 err">
                                    <span>
                                        @error('namephanloai')
                                            {{ $message }}
                                        @enderror

                                    </span>
                                </div>
                            </div>
                            <button type="submit" class="btn-pimar-key mr-2">Thêm</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
