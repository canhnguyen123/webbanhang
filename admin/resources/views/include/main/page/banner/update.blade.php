@extends('admin')
@section('main')
    <div class="content-wrapper">
            <div class=" row">
                <div class="col-xl-4 col-sm-12 img-div">
                    <img class="img-item_banner-form"
                        src="{{$item_banner->banner_link}}"
                        alt="">
                </div>
                <div class="col-xl-8 col-sm-12  grid-margin stretch-card ">
                    <div class="card">
                        <div class="card-body ">
                            <h4 class="card-title" style="text-align: center">Cập nhật mới banner</h4>

                            <div class="col-xl-12 col-sm-12 pd-0-mg-0-b-0 pd-bt-45 validate-form">
                                <div class="form-group form-input col-12">
                                    <input type="text" id="namebanner" value="{{$item_banner->banner_name}}" class="form-control namebanner" required>
                                    <label>Tên banner</label>
                                </div>
                                <div class="col-12 err"><span class="err-text error-message"></span></div>
                            </div>

                            <div class="form-group form-input col-xl-12 col-sm-12">

                                <input type="file" class="upload-img-theloai upload-img form-control" required>

                            </div>
                            <div class="col-xl-12 col-sm-12">

                                <button type="submit" id="btn-upload-banner-update" class="btn-pimar-key mr-2" data-id="{{$item_banner->banner_id}}">Cập nhật</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection
