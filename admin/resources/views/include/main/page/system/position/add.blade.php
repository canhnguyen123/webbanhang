@extends('admin')
@section('main')
<div class="content-wrapper">
  <div class="flex_center">
    <div class=" with-form-800  grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title" style="text-align: center">Thêm mới ví trí</h4>
            <form class="forms-sample row" action="{{ route('position_post_add') }}" method="post">
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
                <input type="text" name="nameposition" class="form-control" value="{{ old('nameposition') }}" required>
                <label> Tên ví trí</label>
              </div>
              <div class="form-group form-input col-6">
                <i class="mdi mdi-codepen"></i>
                <input type="text" name="codeposition" class="form-control" value="{{ old('codeposition') }}" required>
                <label> Mã ví trí</label>
              </div>
              <div class="col-6 err">
                <span>
                    @error('nameposition')
                        {{ $message }}
                    @enderror
                </span>
            </div>
              <div class="col-6 err">
                <span>
                    @error('codeposition')
                        {{ $message }}
                    @enderror
                  
                </span>
            </div>
              <button type="submit" class=" btn-pimar-key mr-2">Thêm</button>
             
            </form>
          </div>
        </div>
      </div>
    </div>

  
</div>
@endsection
