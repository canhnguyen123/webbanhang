@extends('admin')
@section('main')
    <div class="content-wrapper">
        <div class="flex_center">
            <div class=" with-form-800  grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" style="text-align: center">Khôi phục mật khẩu</h4>
                            <form class="forms-sample row" action="{{ route('restore.password.put') }}" method="post">
                                @csrf
                                @method('put')
                                @if ($errors->any())
                                    <div class="alert col-12 alert-danger text-center">
                                        <span>Có lỗi xảy ra vui lòng kiểm tra lại dữ liệu</span>
                                    </div>
                                @endif
                                @if (session('errorrestore'))
                                    <div class="col-12 alert alert-danger">
                                        {{ session('errorrestore') }}
                                    </div>
                                @endif
                                <div class="form-group  col-12">
                                    <div class="form-input">
                                      <i class="mdi mdi-lock-outline"></i>
                                      <input type="text" name="restore" class="form-control" required>
                                      <label>Mã khôi phục</label>
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
