@extends('admin')
@section('main')
    <div class="content-wrapper">
        <div class="flex_center">
            <div class=" with-form-800  grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" style="text-align: center">Thêm mới quyền chi tiết</h4>
                        <form class="forms-sample row" action="{{ route('permission.add.post') }}" method="post">
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
                                    <input type="text" name="permissionName" class="form-control"
                                        value="{{ old('permissionName') }}" required>
                                    <label> Tên  quyền</label>

                                </div>
                                <div class="col-12 err">
                                    <span>
                                        @error('permissionName')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="form-group form-input col-xl-6 col-sm-12">
                                <div class="col-12">
                                    <i class="mdi mdi-codepen"></i>
                                    <input type="text" name="permissionCode" class="form-control"
                                        value="{{ old('permissionCode') }}" required>
                                    <label> Mã  quyền</label>
                                </div>
                                <div class="col-12 err">
                                    <span>
                                        @error('permissionCode')
                                            {{ $message }}
                                        @enderror

                                    </span>
                                </div>
                            </div>

                            <div class="form-group form-input col-xl-6 col-sm-12">
                                <div class="col-12">
                                    <i class="mdi mdi-rename-box"></i>
                                    <input type="text" name="permissionRouter" class="form-control"
                                        value="{{ old('permissionRouter') }}" required>
                                    <label>Đường dẫn</label>

                                </div>
                                <div class="col-12 err">
                                    <span>
                                        @error('permissionRouter')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="form-group form-input col-xl-6 col-sm-12">
                                <div class="col-12">
                                    <select class="form-select he-46 " name="permissionGroupId">
                                        <option disabled>Chọn nhóm quyền</option>
                                        @foreach ($permission_Item as $item)
                                            <option value="{{$item->permission_group_id}}">{{$item->permission_group_name}}</option>
                                        @endforeach
                                       
                                      </select>
                                </div>
                                <div class="col-12 err">
                                    <span>
                                        @error('permissionGroupId')
                                            {{ $message }}
                                        @enderror

                                    </span>
                                </div>
                            </div>
                            <div class="form-group col-xl-12 col-sm-12">
                                <label> Ghi chú</label>
                                <textarea name="permissionNote" class="editor" cols="30" rows="10"></textarea>
                            </div>
                            <button type="submit" class=" btn-pimar-key mr-2" style="width: 200px;">Thêm</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
