@extends('admin')
@section('main')
    <div class="content-wrapper">
        @foreach ($item_staff as $item)
        <div class=" row">
            <div class="col-4 img-div">
                <img class="img-item-form" src="{{ asset('upload/BE/' . $item->staff_linkimg) }}" alt="">
            </div>
            <div class=" col-8  grid-margin stretch-card ">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" style="text-align: center">Cập nhật nhân viên : {{ $item->staff_code }}
                        </h4>
                        <form class="forms-sample row"
                        action="{{ route('staff_post_update', ['staff_id' => $item->staff_id]) }}"
                         method="post"
                        enctype="multipart/form-data">
                            {{ method_field('PUT') }} 
                            {{ csrf_field() }}
                          
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
                            <div class="col-6 pd-0-mg-0-b-0 validate-form">
                                <div class="form-group form-input col-12 ">
                                    <i class="mdi mdi-account-box-outline"></i>
                                    <input type="text" name="fullname" value="{{ $item->staff_fullname }}" disabled
                                        class="form-control nameProduct " required>
                                    <label> Tên nhân viên</label>
                                </div>

                                <div class="col-12 err">
                                    <span>
                                        @error('fullname')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="col-6 pd-0-mg-0-b-0 validate-form">
                                <div class="form-group form-input col-12 ">
                                    <i class="mdi mdi-account"></i>
                                    <input type="text" name="username" value="{{ $item->staff_username }}"
                                        class="form-control nameProduct " required>
                                    <label> Tên đăng nhập</label>
                                </div>
                                <div class="col-12 err">
                                    <span>
                                        @error('username')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-6 pd-0-mg-0-b-0 validate-form">
                                <div class="form-group form-input col-12 ">
                                    <i class="mdi mdi-email"></i>
                                    <input type="text" name="email" value="{{ $item->staff_email }}"
                                        class="form-control nameProduct " required>
                                    <label> Email</label>
                                </div>
                                <div class="col-12 err">
                                    <span>
                                        @error('email')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-6 pd-0-mg-0-b-0 validate-form">
                                <div class="form-group form-input col-12 ">
                                    <i class="mdi mdi-phone"></i>
                                    <input type="text" name="phone" value="{{ $item->staff_phone }}"
                                        class="form-control nameProduct " required>
                                    <label> Số điện thoại</label>
                                </div>
                                <div class="col-12 err"> <span>
                                        @error('phone')
                                            {{ $message }}
                                        @enderror
                                    </span></div>
                            </div>
                            <div class="col-4 form-group">
                                <div class="form-input">
                                    <label class="p-static"> Tỉnh/thành phố</label>
                                    <select name="city" class="form-control  form-control-lg" id="province">
                                    </select>
                                </div>

                            </div>
                            <div class="col-4 form-group">
                                <div class="form-input">
                                    <label class="p-static">Quận/huyện</label>
                                    <select name="district" id="district" class="form-control  form-control-lg">
                                        <option value="">Chọn quận/huyện</option>
                                    </select>
                                </div>

                            </div>
                            <div class="col-4 form-group ">
                                <div class="form-input">
                                    <label class="p-static">Phường/xã</label>
                                    <select name="ward" id="ward" class="form-control  form-control-lg">
                                        <option value="">Chọn phường/xã</option>
                                    </select>
                                </div>

                            </div>
                            <div class="col-12 pd-0-mg-0-b-0 validate-form">
                                <div class="form-group form-input col-12 ">
                                    <i class="mdi mdi-code-tags"></i>
                                    <input type="text" name="deatilAddress" class="form-control nameProduct ">
                                    <label> Địa chỉ cụ thể</label>
                                </div>
                                <div class="col-12 err"><span class="err-text">
                                        @error('deatilAddress')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-12">
                                <input type="hidden" name="staff_address" value="{{$item->staff_address}}" id="result_local"  required>
                            </div>
     
                  
                            <div class="form-group col-6">
                              <div class="col-12 form-input">
                                <label for="" class="p-static">Ảnh đại diện</label>
                                <input height="50px" name="imgLink"  type="file" class="upload-img-staff upload-img form-control" >
                              </div>
                              <div class="col-12 err"><span class="err-text">
                                @error('imgLink')
                                {{ $message }}
                            @enderror</span></div>
                            </div>
                            <div class="form-group col-6">
                              <div class="col-12 form-input">
                                <label for="" class="p-static">Chức vụ</label>
                                <select name="position_id" height="40px" class="form-control  form-control-lg">
                                    <option value="{{ $item->position_id }}">{{ $item->position_name }}</option>
                                    @foreach ($listPosition as $itemPosition)
                                        @if ($item->position_id != $itemPosition->position_id)
                                            <option value="{{ $itemPosition->position_id }}">
                                                {{ $itemPosition->position_code }}</option>
                                        @endif
                                    @endforeach
                                </select>
                              </div>
                              <div class="col-12 err"><span class="err-text"></span></div>
                            </div>
                    
                            <div class="col-12 form-group ">
                                <div class=" col-12 form-input">
                                    <label for="" class="p-static">Ghi chú</label>
                                    <textarea name="note" class="editor" cols="30" rows="10">{{ $item->staff_note }} </textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <select id="selectOptions" height="40px" class="form-control  form-control-lg">
                                    <option value="" >Chọn hành động</option>
                                    <option value="select-all">Chọn tất cả</option>
                                    <option value="deselect-all">Bỏ tất cả</option>
                                </select>
                            </div>
                            <div class="col-12 row pg-50-0">
                                @foreach ($listMyPemissionId as $Myitem)
                                <div class="col-xl-4 col-lg-6 col-sm-12 flex_start pg-15-0">
                                  <input type="checkbox" name="pemissionId[]" checked class="mg-right-5" value="{{ $Myitem->permission_id }}"> {{ $Myitem->permission_name }}
                                </div>
                                @endforeach
                            
                                @foreach ($listPemissionId as $Myitem)
                                    @php
                                      $isChecked = false;
                                    @endphp
                            
                                    @foreach ($listMyPemissionId as $item)
                                    @if ($item->permission_id === $Myitem->permission_id)
                                        @php
                                            $isChecked = true;
                                            break;
                                        @endphp
                                    @endif
                                    @endforeach
                            
                                    @if (!$isChecked)
                                    <div class="col-xl-4 col-lg-6 col-sm-12 flex_start pg-15-0">
                                      <input type="checkbox" class="checkbox" name="pemissionId[]" class="mg-right-5"  value="{{ $Myitem->permission_id }}"> {{ $Myitem->permission_name }}
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                            
                            <div class="col-12">

                                <button type="submit" id="btn-upload-staff" class="btn-pimar-key mr-2">Cập nhật</button>
                                <button type="reset" class="btn btn-light">Reset form</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
@endsection
