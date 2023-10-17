@extends('admin')
@section('main')
<div class="content-wrapper">
  <div class="flex_center">
    <div class=" with-form-800  grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title" style="text-align: center">Cập nhật danh mục</h4>
            @foreach ($item_category as $item)
            <form class="forms-sample row" action="{{ route('category_post_update',['category_id'=>$item->category_id]) }}" method="post">
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
                <div class="form-group form-input col-6">
                    <i class="mdi mdi-rename-box"></i>
                    <input type="text" name="nameCategory" class="form-control" value="{{ $item->category_name }}" required>
                    <label> Tên danh mục</label>
                </div>
                <div class="form-group form-input col-6">
                    <i class="mdi mdi-codepen"></i>
                    <input type="text" name="codeCategory" class="form-control" value="{{ $item->category_code }}" required>
                    <label> Mã danh mục</label>
                </div>
                <div class="col-6 err">
                  <span>
                      @error('nameCategory')
                          {{ $message }}
                      @enderror
                  </span>
              </div>
                <div class="col-6 err">
                  <span>
                      @error('codeCategory')
                          {{ $message }}
                      @enderror
                  </span>
              </div>
                <button type="submit" class=" btn-pimar-key mr-2">Cập nhật</button>
                <button type="reset" class="btn btn-light">Reset form</button>
            </form>
        @endforeach
        
         
          </div>
        </div>
      </div>
    </div>

  
</div>
@endsection
