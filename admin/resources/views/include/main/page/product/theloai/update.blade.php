@extends('admin')
@section('main')
    <div class="content-wrapper">
            <div class=" row">
                <div class="col-4 img-div">
                    <img class="img-item-form" id="update-theloai-img" src="{{ $item_theloai->theloai_img }}" alt="">
                </div>
                <div class=" col-8  grid-margin stretch-card ">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title" style="text-align: center">Cập nhật mới thể loại</h4>
                            <form class="forms-sample row">
                                <div class="form-group col-6">
                                    <label>Danh mục</label>
                                    <select class="form-control form-control-lg" id="category_id_up">
                                        <option value="{{ $item_theloai->category_id }}">{{ $item_theloai->category_name }}
                                        </option>
                                        @foreach ($listCategory as $item)
                                            @if ($item_theloai->category_id != $item->category_id)
                                                <option value="{{ $item->category_id }}">{{ $item->category_name }}</option>
                                            @endif
                                        @endforeach
                                    </select>

                                </div>
                                <div class="form-group col-6">
                                    <label>Phân loại</label>
                                    <select class="form-control form-control-lg" id="phanloai_id_up" >
                                        <option value="{{ $item_theloai->phanloai_id }}">{{ $item_theloai->phanloai_name }}
                                        </option>
                                        @foreach ($listPhanLoai as $item)
                                            @if ($item_theloai->phanloai_id != $item->phanloai_id)
                                                <option value="{{ $item->phanloai_id }}">{{ $item->phanloai_name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group form-input col-6">
                                    <i class="mdi mdi-rename-box"></i>
                                    <input type="text" id="nametheloai" class="form-control"
                                        value="{{ $item_theloai->theloai_name }}" required>
                                    <label> Tên thể loại</label>
                                </div>
                                <div class="form-group form-input col-6">
                                    <i class="mdi mdi-codepen"></i>
                                    <input type="text" id="codetheloai" class="form-control"
                                        value="{{ $item_theloai->theloai_code }}" required>
                                    <label> Mã thể loại</label>
                                </div>
                                <div class="col-6 err"><span class="err-text-theloainame"></span></div>
                                <div class="col-6 err"><span class="err-text-theloaicode"></span></div>
                           <div class="form-group form-input col-6">

                                    <input type="file" class="upload-img-theloai form-control" >

                                </div>
                                <div class="col-12">

                                    <button type="submit" id="btn-upload-theloai-update" data-theloai={{ $item_theloai->theloai_id}} class="btn-pimar-key mr-2">Sửa</button>
                                    <button type="reset" class="btn btn-light">Reset form</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


    </div>
@endsection
