@extends('admin')
@section('main')
    <div class="content-wrapper">
        @foreach ($item_banner as $item)
            <div class=" row">
                <div class="col-4 img-div">
                    <img class="img-item-form"
                        src="{{$item->banner_link}}"
                        alt="">
                </div>
                <div class=" col-8  grid-margin stretch-card ">
                    <div class="card">
                        <div class="card-body ">
                            <h4 class="card-title" style="text-align: center">Cập nhật mới banner</h4>

                            <div class="col-12 pd-0-mg-0-b-0 pd-bt-45 validate-form">
                                <div class="form-group form-input col-12">
                                    <input type="text" id="namebanner" value="{{$item->banner_status}}" class="form-control namebanner" required>
                                    <label>Tên banner</label>
                                </div>
                                <div class="col-12 err"><span class="err-text error-message"></span></div>
                            </div>

                            <div class="form-group form-input col-12">

                                <input type="file" class="upload-img-theloai upload-img form-control" required>

                            </div>
                            <div class="col-12">

                                <button type="submit" id="btn-upload-banner-update" class="btn-pimar-key mr-2" data-id="{{$item->banner_id}}">Cập nhật</button>
                                <button type="reset" class="btn btn-light">Reset form</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
