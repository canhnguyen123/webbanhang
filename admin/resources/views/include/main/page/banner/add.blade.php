@extends('admin')
@section('main')
<div class="content-wrapper">
  <div class=" row">
    <div class="col-xl-4 col-sm-12 img-div">
       <img class="img-item-form" src="https://firebasestorage.googleapis.com/v0/b/loco-7d8c6.appspot.com/o/c6e56503cfdd87da299f72dc416023d4.jpg?alt=media&token=0f06f1ca-d5a1-48e8-a8e7-704fdca9f927" alt="">
    </div>
    <div class=" col-xl-8 col-sm-12  grid-margin stretch-card ">
        <div class="card">
          <div class="card-body ">
            <h4 class="card-title" style="text-align: center">Thêm mới banner</h4>
      
            <div class="col-xl-12 col-sm-12 pd-0-mg-0-b-0 pd-bt-45 validate-form">
              <div class="form-group form-input col-12">
                  <input type="text" id="namebanner" class="form-control namebanner" required>
                  <label>Tên banner</label>
              </div>
              <div class="col-12 err"><span class="err-text error-message"></span></div>
          </div>
           
            <div class="form-group form-input col-xl-12 col-sm-12">
             
              <input type="file" class="upload-img-theloai upload-img form-control" required>
            
            </div>
            <div class="col-xl-12 col-sm-12">
                 
              <button type="submit" id="btn-upload-banner" class="btn-pimar-key mr-2">Thêm</button>
              <button type="reset" class="btn btn-light">Reset form</button>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  
</div>
@endsection
