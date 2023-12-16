@foreach ($list_brand as $item)
<tr>
  <td colspan="1">{{$i++}}</td>
  <td colspan="3">{{$item->brand_name}}</td>
  <td colspan="2">{{$item->brand_code}}</td>
  <td colspan="1" style="text-align: center">
    @if ($item->brand_status===1)
    <i class="pass-icon mdi mdi-check"></i> 
    @else
    <i class="fail-icon mdi mdi-close"></i> 
    @endif
    </td>
 
  <td colspan="3" class="flex_center">
      <div class="list-icon flex_center">
        <a href="{{route('brand_update',['brand_id'=>$item->brand_id])}}" class="item-icon mg-5 flex_center icon-edit bg-yellow-og">
          <i class="mdi mdi-lead-pencil"></i>
          <p>Cập nhật</p>
        </a>  

        @if ($item->brand_status===1)
        <a onclick="return  confirm('Bạn có muốn ẩn không ?')" href="{{route('brand_toogle_status',['brand_id'=>$item->brand_id])}}" class="item-icon mg-5 flex_center icon-edit bg-red-blink">
          <i class="mdi mdi-toggle-switch"></i>
          <p>Ẩn</p>
        </a>   
        @else
        <a onclick="return confirm('Bạn có muốn hiện không ?')" href="{{route('brand_toogle_status',['brand_id'=>$item->brand_id])}}" class="item-icon mg-5 flex_center icon-edit bg-yellow-green">
          <i class="mdi mdi-toggle-switch-off"></i>
          <p>Hiện</p>
        </a> 
        @endif
       
       
      </div>
  </td>
</tr>
@endforeach