@extends('admin')
@section('main')
<div class="content-wrapper">
  <div class="flex_center">
    <div class=" with-form-800  grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title" style="text-align: center">Cập nhật thương hiệu</h4>
            @foreach ($item_brand as $item)
            <form class="forms-sample row" action="{{ route('brand_post_update',['brand_id'=>$item->brand_id]) }}" method="post">
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
                <div class="form-group form-input col-xl-6 col-sm-12">
                    <i class="mdi mdi-rename-box"></i>
                    <input type="text" name="namebrand" class="form-control" value="{{ $item->brand_name }}" required>
                    <label> Tên thương hiệu</label>
                </div>
                <div class="form-group form-input col-xl-6 col-sm-12">
                    <i class="mdi mdi-codepen"></i>
                    <input type="text" name="codebrand" class="form-control" value="{{ $item->brand_code }}" required>
                    <label> Mã thương hiệu</label>
                </div>
                <div class="col-xl-6 col-sm-12 err">
                  <span>
                      @error('namebrand')
                          {{ $message }}
                      @enderror
                  </span>
              </div>
                <div class="col-xl-6 col-sm-12 err">
                  <span>
                      @error('codebrand')
                          {{ $message }}
                      @enderror
                  </span>
              </div>
              <div class="col-12">
                <button type="submit" class=" btn-pimar-key mr-2">Cập nhật</button>
                <button type="reset" class="btn btn-light">Reset form</button>
              </div>
               
            </form>
        @endforeach
        
         
          </div>
        </div>
      </div>
    </div>

  
</div>
@endsection
