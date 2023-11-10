@extends('admin')
@section('main')
    <div class="content-wrapper">
        <div class=" row">
            <div class="col-12 row card">
              <div class="col-12 row card-body">
                <div class="col-12 titel-box mg-10">
                  <h4>Hiển thị thể loại từ trang chủ</h4>
                </div>
                <form action="{{route('theloai_post_showHome')}}" class="col-12" method="post">
                  {{@csrf_field()}}
                  <div class="list-checkbox">
                    @foreach ($listShowed as $itemShow)
                        <div class="item-checkbox mg-10">
                            <input type="checkbox" name="theloai_id[]" value="{{$itemShow->theloai_id}}" checked>{{$itemShow->theloai_name}}--{{$itemShow->category_name}}--{{$itemShow->phanloai_name}}
                            @if ($itemShow->theloai_status===1)
                            <i class="pass-icon mdi mdi-check"></i> 
                            @else
                            <i class="fail-icon mdi mdi-close"></i> 
                            @endif
                        </div>
                    @endforeach
                
                    <?php $matched = false; ?>
                    @foreach ($list_theloai as $item)
                        @foreach ($listShowed as $itemShow)
                            @if ($item->theloai_id == $itemShow->theloai_id)
                                <?php $matched = true; ?>
                                @break
                            @endif
                        @endforeach
                
                        @if (!$matched)
                            <div class="item-checkbox mg-10">
                                <input type="checkbox" name="theloai_id[]" value="{{$item->theloai_id}}">{{$item->theloai_name}}--{{$item->category_name}}--{{$item->phanloai_name}} 
                                @if ($item->theloai_status===1)
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
            </div>
          
        </div>


    </div>
@endsection
