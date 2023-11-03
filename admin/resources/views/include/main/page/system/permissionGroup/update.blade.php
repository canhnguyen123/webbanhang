@extends('admin')
@section('main')
    <div class="content-wrapper">
        <div class="flex_center">
            <div class=" with-form-800  grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" style="text-align: center">Cập nhật mới nhóm quyền</h4>
                        @foreach ($item_permissionGroup as $item)
                        <form class="forms-sample row" action="{{ route('permission.Group.update.post',['permissionGroup_id'=>$item->permission_group_id]) }}" method="post">
                          {{ @csrf_field() }}
                          @method('put')
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
                                      value="{{ $item->permission_group_name }}" required>
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
                                      value="{{ $item->permission_group_code }}" required>
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
                              <textarea name="permissionGroupNote" class="editor" cols="30" rows="10">
                                {{ $item->permission_group_note }}
                              </textarea>
                          </div>
                          <button type="submit" class=" btn-pimar-key mr-2" style="width: 200px;">Cập nhật</button>

                      </form>
                        @endforeach
                  
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
