@extends('admin')
@section('main')
    <div class="content-wrapper">
        <div class=" row">
            <div class="col-4 img-div">
                <img class="img-item-form"
                    src="https://firebasestorage.googleapis.com/v0/b/loco-7d8c6.appspot.com/o/c6e56503cfdd87da299f72dc416023d4.jpg?alt=media&token=0f06f1ca-d5a1-48e8-a8e7-704fdca9f927"
                    alt="">
            </div>
            <div class=" col-8  grid-margin stretch-card ">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"  style="text-align: center">Thêm mới nhân viên</h4>
                        <form class="forms-sample row" action="{{ route('staff_post_add') }}" method="post" enctype="multipart/form-data">
                            {{@csrf_field()}}
                            @if ($errors->any())
                              <div class="alert col-12 alert-danger text-center">
                                  <span>Có lỗi xảy ra vui lòng kiểm tra lại dữ liệu</span>
                              </div>
                           @endif
                           @if(session('errorMessage'))
                              <div class="col-12 alert alert-danger">
                                  {{ session('errorMessage') }}
                              </div>
                          @endif
                            <div class="col-6 pd-0-mg-0-b-0 validate-form">
                                <div class="form-group form-input col-12 ">
                                    <i class="mdi mdi-account-box-outline"></i>
                                    <input type="text" name="fullname" class="form-control nameProduct " required>
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
                                    <i class="mdi mdi-codepen"></i>
                                    <input type="text" name="code" class="form-control nameProduct " required>
                                    <label> Mã nhân viên</label>
                                </div>
                                <div class="col-12 err">
                                    <span>
                                        @error('code')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-6 pd-0-mg-0-b-0 validate-form">
                                <div class="form-group form-input col-12 ">
                                    <i class="mdi mdi-account"></i>
                                    <input type="text" name="username" class="form-control nameProduct " required>
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
                                    <i class="mdi mdi-key-variant"></i>
                                    <input type="text" name="password" class="form-control nameProduct " required>
                                    <label> Mật khẩu</label>
                                </div>
                                <div class="col-12 err">
                                    <span>
                                        @error('password')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-6 pd-0-mg-0-b-0 validate-form">
                              <div class="form-group form-input col-12 ">
                                  <i class="mdi mdi-email"></i>
                                  <input type="text" name="email" class="form-control nameProduct " required>
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
                                  <input type="text" name="phone" class="form-control nameProduct " required>
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
                                <label  class="p-static"> Tỉnh/thành phố</label>
                                <select name="city" class="form-control  form-control-lg" id="province">
                                </select>
                            </div>

                        </div>
                        <div class="col-4 form-group">
                            <div class="form-input">
                                <label  class="p-static">Quận/huyện</label>
                                <select name="district" id="district" class="form-control  form-control-lg">
                                    <option value="">Chọn quận/huyện</option>
                                </select>
                            </div>

                        </div>
                        <div class="col-4 form-group ">
                            <div class="form-input">
                                <label  class="p-static">Phường/xã</label>
                                <select name="ward" id="ward" class="form-control  form-control-lg">
                                    <option value="">Chọn phường/xã</option>
                                </select>
                            </div>

                        </div>
                        <div class="col-12">
                            <input type="hidden" name="staff_address"  id="result_local"  required>
                        </div>
 
                        <div class="col-6 pd-0-mg-0-b-0 validate-form">
                          <div class="form-group form-input col-12 ">
                              <i class="mdi mdi-code-tags"></i>
                              <input type="text" name="deatilAddress" class="form-control nameProduct " required>
                              <label> Địa chỉ cụ thể</label>
                          </div>
                          <div class="col-12 err"><span class="err-text">
                             @error('deatilAddress')
                            {{ $message }}
                        @enderror</span></div>
                      </div>
                        <div class="col-6 pd-0-mg-0-b-0 validate-form">
                          <div class="form-group form-input col-12 ">
                              <i class="mdi mdi-code-tags"></i>
                              <input type="text" name="codeRecovery" class="form-control nameProduct " required>
                              <label> Mã khôi phục</label>
                          </div>
                          <div class="col-12 err"><span class="err-text">
                            @error('codeRecovery')
                            {{ $message }}
                        @enderror</span></div>
                      </div>
                            <div class="form-group col-6">
                              <div class="col-12 form-input">
                                <label for="" class="p-static">Ảnh đại diện</label>
                                <input height="50px" name="imgLink"  type="file" class="upload-img-staff upload-img form-control" required>
                              </div>
                              <div class="col-12 err"><span class="err-text">
                                @error('imgLink')
                                {{ $message }}
                            @enderror</span></div>
                            </div>
                            <div class="form-group col-6">
                              <div class="col-12 form-input">
                                <label for="" class="p-static">Chức vụ</label>
                               <select name="position_id"  height="40px" class="form-control  form-control-lg">
                                @foreach ($listPosition as $item)
                                  <option value="{{$item->position_id}}">{{$item->position_name}}</option>
                                @endforeach
                               </select>
                              </div>
                              <div class="col-12 err"><span class="err-text"></span></div>
                            </div>
                    
                            <div class="col-12 form-group ">
                              <div class=" col-12 form-input">
                                <label for="" class="p-static">Ghi chú</label>
                                <textarea name="note" class="editor" cols="30" rows="10"> </textarea>
                            </div>
                            </div>
                          
                        
                            <div class="col-12">

                                <button type="submit" id="btn-upload-staff" class="btn-pimar-key mr-2">Thêm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
