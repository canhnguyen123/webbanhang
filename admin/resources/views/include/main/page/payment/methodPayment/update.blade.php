@extends('admin')
@section('main')
<div class="content-wrapper">
  <div class="flex_center">
    <div class=" with-form-800  grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title" style="text-align: center">Cập nhật danh mục</h4>
            @foreach ($item_methodPayment as $item)
            <form class="forms-sample row" action="{{ route('methodPayment_post_update',['methodPayment_id'=>$item->methodPayment_id]) }}" method="post">
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
                    <input type="text" name="namemethodPayment" class="form-control" value="{{ $item->methodPayment_name }}" required>
                    <label> Tên danh mục</label>
                </div>
                <div class="form-group form-input col-6">
                    <i class="mdi mdi-codepen"></i>
                    <input type="text" name="codemethodPayment" class="form-control" value="{{ $item->methodPayment_code }}" required>
                    <label> Mã danh mục</label>
                </div>
                <div class="col-6 err">
                  <span>
                      @error('namemethodPayment')
                          {{ $message }}
                      @enderror
                  </span>
              </div>
                <div class="col-6 err">
                  <span>
                      @error('codemethodPayment')
                          {{ $message }}
                      @enderror
                  </span>
              </div>
              <div class="form-group col-12">
                <label>Ghi chú</label>
                <textarea name="notemethodPayment"  class="editor" cols="30" rows="10"> {{ $item->methodPayment_note}}</textarea>
            </div>
                <button type="submit" class=" btn-pimar-key mr-2">Cập nhật</button>
            </form>
        @endforeach
        
         
          </div>
        </div>
      </div>
    </div>

  
</div>
@endsection
