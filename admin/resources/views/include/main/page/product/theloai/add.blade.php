@extends('admin')
@section('main')
<div class="content-wrapper">
  <div class=" row">
    <div class="col-4 img-div">
       <img class="img-item-form" src="https://firebasestorage.googleapis.com/v0/b/loco-7d8c6.appspot.com/o/c6e56503cfdd87da299f72dc416023d4.jpg?alt=media&token=0f06f1ca-d5a1-48e8-a8e7-704fdca9f927" alt="">
    </div>
    <div class=" col-8  grid-margin stretch-card ">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title" style="text-align: center">Thêm mới thể loại</h4>
            <form class="forms-sample row">
            <div class="form-group col-6">
              <label >Danh mục</label>
              <select class="form-control form-control-lg" id="category_id">
                @foreach ($listCategory as $item)
                    <option value="{{$item->category_id}}">{{$item->category_name}}</option>
                @endforeach
            </select>
            
            </div>
            <div class="form-group col-6">
              <label >Phân loại</label>
              <select class="form-control form-control-lg" id="phanloai_id">
                @foreach ($listPhanLoai as $item)
                <option value="{{$item->phanloai_id}}">{{$item->phanloai_name}}</option>
                @endforeach
              </select>
            </div>
              <div class="form-group form-input col-6">
                <i class="mdi mdi-rename-box"></i>
                <input type="text" id="nametheloai" class="form-control" value="{{ old('nametheloai') }}" required>
                <label> Tên thể loại</label>
              </div>
              <div class="form-group form-input col-6">
                <i class="mdi mdi-codepen"></i>
                <input type="text" id="codetheloai" class="form-control" value="{{ old('codetheloai') }}" required>
                <label> Mã thể loại</label>
              </div>
            <div class="col-6 err"><span class="err-text-theloainame"></span></div>
            <div class="col-6 err"><span class="err-text-theloaicode"></span></div>
            <div class="form-group form-input col-6">
             
              <input type="file" class="upload-img-theloai form-control" required>
            
            </div>
            <div class="col-12">
                 
              <button type="submit" id="btn-upload-theloai" class="btn-pimar-key mr-2">Thêm</button>
              <button type="reset" class="btn btn-light">Reset form</button>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  
</div>
@endsection
