@foreach ($list_size as $item)
<tr>
  <td colspan="1">{{$i++}}</td>
  <td colspan="3">{{$item->size_name}}</td>
  <td colspan="2">{{$item->size_note}}</td>
  <td colspan="1" style="text-align: center">
    @if ($item->size_status===1)
    <i class="pass-icon mdi mdi-check"></i> 
    @else
    <i class="fail-icon mdi mdi-close"></i> 
    @endif
    </td>
 
  <td colspan="3" class="flex_center">
      <div class="list-icon flex_center">
        <a href="{{route('size_update',['size_id'=>$item->size_id])}}" class="item-icon mg-5 flex_center icon-edit bg-yellow-og">
          <i class="mdi mdi-lead-pencil"></i>
          <p>Cập nhật</p>
        </a>  

        @if ($item->size_status===1)
        <a onclick="return confirm('Bạn có muốn ẩn không ?')" href="{{route('size_toogle_status',['size_id'=>$item->size_id,'size_status'=>1])}}" class="item-icon mg-5 flex_center icon-edit bg-red-blink">
          <i class="mdi mdi-toggle-switch"></i>
          <p>Ẩn</p>
        </a>   
        @else
        <a onclick="return confirm('Bạn có muốn hiện không ?')" href="{{route('size_toogle_status',['size_id'=>$item->size_id,'size_status'=>0])}}" class="item-icon mg-5 flex_center icon-edit bg-yellow-green">
          <i class="mdi mdi-toggle-switch-off"></i>
          <p>Hiện</p>
        </a> 
        @endif
       
       
      </div>
  </td>
</tr>
@endforeach