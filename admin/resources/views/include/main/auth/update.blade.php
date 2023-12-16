@extends('admin')
@section('main')
    <div class="content-wrapper">
        <div class="flex_center">
            <div class=" with-form-800  grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" style="text-align: center">Đổi mật khẩu</h4>
                            <form class="forms-sample row" action="{{ route('update.password.put') }}" method="post">
                                @csrf
                                @method('put')
                                @if ($errors->any())
                                    <div class="alert col-12 alert-danger text-center">
                                        <span>Có lỗi xảy ra vui lòng kiểm tra lại dữ liệu</span>
                                    </div>
                                @endif
                                @if (session('errorUpdate'))
                                    <div class="col-12 alert alert-danger">
                                        {{ session('errorUpdate') }}
                                    </div>
                                @endif
                                <div class="form-group  col-xl-6 col-sm-12">
                                    <div class="form-input">
                                      <i class="mdi mdi-lock-outline"></i>
                                      <input type="text" name="oldpass" class="form-control" required>
                                      <label>Mật khẩu cũ</label>
                                      </div>
                                       <div class="err">
                                        <span>
                                            @error('oldpass')
                                                {{ $message }}
                                            @enderror
                                            @if (session('erroroldPasss'))
                                                {{ session('erroroldPasss') }}
                                          @endif
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group  col-xl-6 col-sm-12">
                                  <div class="form-input">
                                    <i class="mdi mdi-lock-outline"></i>
                                    <input type="text" name="newpass" class="form-control" required>
                                    <label>Mật khẩu mới</label>
                                    </div>
                                     <div class="err">
                                      <span>
                                          @error('newpass')
                                              {{ $message }}
                                          @enderror
                                       
                                      </span>
                                  </div>
                              </div>
                              <div class="form-group  col-xl-6 col-sm-12">
                                <div class="form-input">
                                  <i class="mdi mdi-lock-outline"></i>
                                  <input type="text" name="anewpass" class="form-control" required>
                                  <label>Xác nhận mật khẩu </label>
                                  </div>
                                   <div class="err">
                                    <span>
                                        @error('anewpass')
                                            {{ $message }}
                                        @enderror
                                        @if (session('errorANewPasss'))
                                            {{ session('errorANewPasss') }}
                                      @endif
                                    </span>
                                </div>
                            </div>
                                <div class="col-12">
                                    <button type="submit" class=" btn-pimar-key mr-2">Cập nhật</button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
