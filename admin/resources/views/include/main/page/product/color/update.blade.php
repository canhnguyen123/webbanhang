@extends('admin')
@section('main')
<div class="content-wrapper">
  <div class="flex_center">
    <div class=" with-form-800  grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title" style="text-align: center">Cập nhật màu sắc</h4>
            <form class="forms-sample row" action="{{ route('color_post_update',['color_id'=>$item_color->color_id]) }}" method="post">
                @csrf
                @method('put')
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
                <div class="form-group form-input col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <i class="mdi mdi-rename-box"></i>
                    <input type="text" name="namecolor" class="form-control" value="{{ $item_color->color_name }}" required>
                    <label> Tên màu sắc</label>
                </div>
                <div class="form-group form-input col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <i class="mdi mdi-codepen"></i>
                    <input type="text" name="color_code" class="form-control" value="{{ $item_color->color_code }}" required>
                    <label> Mã màu sắc</label>
                </div>
                <div class="col-6 err">
                  <span>
                      @error('namecolor')
                          {{ $message }}
                      @enderror
                  </span>
              </div>
                <div class="col-6 err">
                  <span>
                      @error('color_code')
                          {{ $message }}
                      @enderror
                  </span>
              </div>
                <button type="submit" class=" btn-pimar-key mr-2">Cập nhật</button>
            </form>
        
          </div>
        </div>
      </div>
    </div>

  
</div>
@endsection
