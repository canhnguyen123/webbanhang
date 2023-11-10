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
              <div class="form-group col-xl-6 col-sm-12">
                <div class="col-12  form-input">
                  <i class="mdi mdi-rename-box"></i>
                  <input type="text" name="nameposition" class="form-control" value="{{ old('nameposition') }}" required>
                  <label> Tên ví trí</label>
                </div>
                <div class="col-12 err">
                  <span>
                      @error('nameposition')
                          {{ $message }}
                      @enderror
                  </span>
              </div>
              </div>
              <div class="form-group col-xl-6 col-sm-12">
                <div class="col-12  form-input">
                  <i class="mdi mdi-codepen"></i>
                  <input type="text" name="codeposition" class="form-control" value="{{ old('codeposition') }}" required>
                  <label> Mã ví trí</label>
                </div>
                <div class="col-12 err">
                  <span>
                      @error('codeposition')
                          {{ $message }}
                      @enderror
                    
                  </span>
              </div>
              </div>
              <div class="col-12 row pg-50-0">
                  @foreach ($getPemissionGroup as $item)
                    <div class="col-xl-4 col-lg-6 col-sm-12 flex_start pg-15-0">
                      <input type="checkbox" name="pemissionGroup[]" class="mg-right-5" value="{{$item->permission_group_id}}"> {{$item->permission_group_name}}
                    </div>
                  @endforeach
                  
              </div>
          
              <button type="submit" class=" btn-pimar-key mr-2">Thêm</button>
             
            </form>
          </div>
        </div>
      </div>
    </div>

  
</div>
@endsection
