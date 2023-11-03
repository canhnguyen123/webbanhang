@extends('admin')
@section('main')
    <div class="content-wrapper">
        <div class="flex_center">
            <div class=" with-form-800  grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" style="text-align: center">Thêm mới nhóm quyền</h4>
                        <form class="forms-sample row" action="{{ route('permission.Group.add.post') }}" method="post">
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
                                    <input type="text" name="permissionGroupName" class="form-control"
                                        value="{{ old('permissionGroupName') }}" required>
                                    <label> Tên nhóm quyền</label>

                                </div>
                                <div class="col-12 err">
                                    <span>
                                        @error('permissionGroupName')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="form-group form-input col-xl-6 col-sm-12">
                                <div class="col-12">
                                    <i class="mdi mdi-codepen"></i>
                                    <input type="text" name="permissionGroupCode" class="form-control"
                                        value="{{ old('permissionGroupCode') }}" required>
                                    <label> Mã nhóm quyền</label>
                                </div>
                                <div class="col-12 err">
                                    <span>
                                        @error('permissionGroupCode')
                                            {{ $message }}
                                        @enderror

                                    </span>
                                </div>
                            </div>


                            <div class="form-group col-xl-12 col-sm-12">
                                <label> Ghi chú</label>
                                <textarea name="permissionGroupNote" class="editor" cols="30" rows="10"></textarea>
                            </div>
                            <button type="submit" class=" btn-pimar-key mr-2" style="width: 200px;">Thêm</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
