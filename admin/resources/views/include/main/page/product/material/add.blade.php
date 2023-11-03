@extends('admin')
@section('main')
    <div class="content-wrapper">
        <div class="flex_center">
            <div class=" with-form-800  grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" style="text-align: center">Thêm mới chất liệu</h4>
                        <form class="forms-sample row" action="{{ route('material.add.post') }}" method="post">
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
                            <div class="form-group form-input col-xl-12 col-sm-12">
                                <div class="col-12">
                                    <i class="mdi mdi-rename-box"></i>
                                    <input type="text" name="materialName" class="form-control"
                                        value="{{ old('materialName') }}" required>
                                    <label> Tên chất liệu</label>

                                </div>
                                <div class="col-12 err">
                                    <span>
                                        @error('materialName')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <button type="submit" class=" btn-pimar-key mr-2" style="width: 200px;">Thêm</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
