@extends('admin')
@section('main')
<div class="content-wrapper">
  <div class="flex_center">
    <div class=" with-form-800  grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title" style="text-align: center">Thêm mới trạng thái hóa đơn</h4>
            <form class="forms-sample row" action="{{ route('statusPayment_post_add') }}" method="post">
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
              <div class="form-group form-input col-6">
                <i class="mdi mdi-rename-box"></i>
                <input type="text" name="namestatusPayment" class="form-control" value="{{ old('namestatusPayment') }}" required>
                <label> Tên trạng thái hóa đơn</label>
              </div>
              <div class="form-group form-input col-6">
                <i class="mdi mdi-codepen"></i>
                <input type="text" name="codestatusPayment" class="form-control" value="{{ old('codestatusPayment') }}" required>
                <label> Mã trạng thái hóa đơn</label>
              </div>
              <div class="col-6 err">
                <span>
                    @error('namestatusPayment')
                        {{ $message }}
                    @enderror
                </span>
            </div>
              <div class="col-6 err">
                <span>
                    @error('codestatusPayment')
                        {{ $message }}
                    @enderror
                  
                </span>
            </div>
            <div class="form-group col-12">
                <label>Ghi chú</label>
                <textarea name="notestatusPayment"  class="editor" cols="30" rows="10"> </textarea>
            </div>
              <button type="submit" class=" btn-pimar-key mr-2">Thêm</button>
            </form>
          </div>
        </div>
      </div>
    </div>

  
</div>
@endsection
