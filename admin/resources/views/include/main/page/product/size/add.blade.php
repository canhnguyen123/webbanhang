@extends('admin')
@section('main')
<div class="content-wrapper">
  <div class="flex_center">
    <div class=" with-form-800  grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title" style="text-align: center">Thêm mới kích cỡ</h4>
            <form class="forms-sample row" action="{{ route('size_post_add') }}" method="post">
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
                <input type="text" name="namesize" class="form-control uppercaseInput" value="{{ old('namesize') }}" required>
                <label> Tên kích cỡ</label>
              </div>
              <div class="form-group form-input col-6">
                <i class="mdi mdi-codepen"></i>
                <input type="text" name="motasize" class="form-control" value="{{ old('motasize') }}" required>
                <label> Mô tả ngắn</label>
              </div>
              <div class="col-6 err">
                <span>
                    @error('namesize')
                        {{ $message }}
                    @enderror
                </span>
            </div>
              <div class="col-6 err">
                <span>
                    @error('motasize')
                        {{ $message }}
                    @enderror
                  
                </span>
            </div>
            <div class="col-12">
              <button type="submit" class="btn-pimar-key mr-2">Thêm</button>
              <button type="reset" class="btn btn-light">Reset form</button>  
            </div>
             
            </form>
          </div>
        </div>
      </div>
    </div>

  
</div>
@endsection
