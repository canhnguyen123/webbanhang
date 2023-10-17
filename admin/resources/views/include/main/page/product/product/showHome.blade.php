@extends('admin')
@section('main')
    <div class="content-wrapper">
        <div class=" row">
            <div class="col-12 row card">
              <div class="col-12 row card-body">
                <div class="col-12 titel-box mg-10">
                  <h4>Hiển thị sản phẩm hot ở trang chủ</h4>
                </div>
                <form action="{{route('product_post_showHome')}}" class="col-12" method="post">
                  {{@csrf_field()}}
                  <div class="list-checkbox ">
                    @foreach ($listShowed as $itemShow)
                        <div class="item-checkbox  product-box-w-50">
                            <input type="checkbox" name="product_id[]" value="{{$itemShow->product_id}}" checked><img class="img-tbl mg-none zoomable-image myImage" src="{{$itemShow->productImg_name}}" > {{$itemShow->product_name}}--{{$itemShow->theloai_name}}--{{$itemShow->category_name}}--{{$itemShow->phanloai_name}}
                            @if ($itemShow->product_status===1)
                            <i class="pass-icon mdi mdi-check"></i> 
                            @else
                            <i class="fail-icon mdi mdi-close"></i> 
                            @endif
                        </div>
                    @endforeach
                
                    <?php $matched = false; ?>
                    @foreach ($list_product as $item)
                        @foreach ($listShowed as $itemShow)
                            @if ($item->product_id == $itemShow->product_id)
                                <?php $matched = true; ?>
                                @break
                            @endif
                        @endforeach
                
                        @if (!$matched)
                            <div class="item-checkbox product-box-w-50">
                                <input type="checkbox" name="product_id[]" value="{{$item->product_id}}">
                                <img class="img-tbl mg-none zoomable-image myImage" src="{{$item->productImg_name}}" >   {{$item->product_name}}--{{$item->theloai_name}}--{{$item->category_name}}--{{$item->phanloai_name}} 
                                @if ($item->product_status===1)
                                <i class="pass-icon mdi mdi-check"></i> 
                                @else
                                <i class="fail-icon mdi mdi-close"></i> 
                                @endif
                            </div>
                        @endif
                
                        <?php $matched = false; ?> 
                    @endforeach
                </div>
                
                <button type="submit"  class="btn-pimar-key mr-2">Cập nhật</button>
                </form>
              
                
              </div>
              <div class="modal myModal">
                <span class="close">&times;</span>
                <img class="modal-content imgBig">
              </div>
            </div>
          
        </div>


    </div>
@endsection
