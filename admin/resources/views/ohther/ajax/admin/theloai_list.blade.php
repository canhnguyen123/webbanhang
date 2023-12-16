@foreach ($list_theloai as $item)
<tr>
  <td colspan="1">{{$i++}}</td>
  <td colspan="2">{{$item->category_name}}</td>
  <td colspan="2">{{$item->phanloai_name}}</td>
  <td colspan="3"><img class="img-tbl" data-bs-toggle="modal" data-bs-target="#exampleModal" src="{{$item->theloai_img}}" alt=""> {{$item->theloai_name}}</td>
  <td colspan="2">{{$item->theloai_code}}</td>
  <td colspan="1" style="text-align: center">
    @if ($item->theloai_status===1)
    <i class="pass-icon mdi mdi-check"></i> 
    @else
    <i class="fail-icon mdi mdi-close"></i> 
    @endif
    </td>
 
  <td colspan="3" class="flex_center">
      <div class="list-icon flex_center">
        <a href="{{route('theloai_update',['theloai_id'=>$item->theloai_id])}}" class="item-icon mg-5 flex_center icon-edit bg-yellow-og">
          <i class="mdi mdi-lead-pencil"></i>
          <p>Cập nhật</p>
        </a>  

        @if ($item->theloai_status===1)
        <a onclick="return confirm('Bạn có muốn ẩn không ?')" href="{{route('theloai_toogle_status',['theloai_id'=>$item->theloai_id])}}" class="item-icon mg-5 flex_center icon-edit bg-red-blink">
          <i class="mdi mdi-toggle-switch"></i>
          <p>Ẩn</p>
        </a>   
        @else
        <a onclick="return confirm('Bạn có muốn hiện không ?')" href="{{route('theloai_toogle_status',['theloai_id'=>$item->theloai_id])}}" class="item-icon mg-5 flex_center icon-edit bg-yellow-green">
          <i class="mdi mdi-toggle-switch-off"></i>
          <p>Hiện</p>
        </a> 
        @endif
       
       
      </div>
  </td>
</tr>
@endforeach