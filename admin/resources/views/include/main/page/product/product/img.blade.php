@extends('admin')
@section('main')
    <div class="content-wrapper">
        <div class="flex_center">
            <div class=" with-form-100w grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" style="text-align: center">Quản lý hình ảnh mới sản phẩm</h4>
                        <form class="forms-sample row">

                            <div class="col-4 slider-product">
                                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                   
                                    <div class="carousel-inner">
                                        @foreach ($item_product_Img as $key => $item)
                                            <div class="carousel-item @if ($key === 0) active @endif">
                                                <img src="{{ $item->productImg_name }}" class="d-block w-100"
                                                    alt="Image {{ $key + 1 }}">
                                                <div class="infro flex_center">
                                                    <p>Ảnh thứ {{$i++}}  
                                                        @if ($item->productImg_status === 1)
                                                            <a onclick="return confirm('Bạn có muốn ẩn không ?')" href="{{route('toggle_img',['product_id'=>$item->product_id,'productImg_id'=>$item->productImg_id,'productQuantity_status'=>1])}}" class="mdi mdi-toggle-switch icon-pd-mg"></a>
                                                        @else
                                                        <a onclick="return confirm('Bạn có muốn hiện không ?')" href="{{route('toggle_img',['product_id'=>$item->product_id,'productImg_id'=>$item->productImg_id,'productQuantity_status'=>0])}}" class="mdi mdi-toggle-switch-off icon-pd-mg"></a>
                                                        @endif    
                                                <a onclick="return confirm('Bạn có muốn xóa ảnh không ?')" href="{{route('delete_img',['product_id'=>$item->product_id,'productImg_id'=>$item->productImg_id])}}" class="mdi mdi-delete icon-pd-mg"></i></a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <button class="carousel-control-prev" type="button"
                                        data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                        data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                              
                            </div>
                           
                            <div class="col-8 row">
               
                      
                                <div class="col-6 pd-0-mg-0-b-0 upload-img">
                                    <div class="form-group col-12">
                                        <label>Tải ảnh lên</label><br>
                                        <input type="file" class="file-upload" id="file-upload-product-img" multiple>
                                      
                                    </div>
                                </div>
                                <div class="col-6 pd-0-mg-0-b-0 toggle-input" style="display: none">
                                    <div class="form-group col-12 flex_center">
                                       <label for="" >Tắt</label>
                                        <input type="checkbox" class="toggle mg-10" />
                                        <label for="">Bật</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn-pimar-key mr-2" data-id="{{$product_id}}" id="add-img">Thêm ảnh</button>
                                    <button type="submit" class="btn-pimar-key mr-2" data-id="{{$product_id}}" id="upload-img" style="display: none">Cập nhật ảnh</button>

                                </div>
                            </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


    </div>
@endsection
