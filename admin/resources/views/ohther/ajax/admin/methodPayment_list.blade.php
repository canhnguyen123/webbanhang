@foreach ($list_methodPayment as $item)
<tr>
  <td colspan="1">{{$i++}}</td>
  <td colspan="3">{{$item->methodPayment_name}}</td>
  <td colspan="2">{{$item->methodPayment_code}}</td>
  <td colspan="1" style="text-align: center">
    @if ($item->methodPayment_status===1)
    <i class="pass-icon mdi mdi-check"></i> 
    @else
    <i class="fail-icon mdi mdi-close"></i> 
    @endif
    </td>
 
  <td colspan="3" class="flex_center">
      <div class="list-icon flex_center">
        <div class="loadModalDeatil item-icon mg-5 flex_center icon-edit bg-da" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-text="{!! htmlspecialchars_decode($item->methodPayment_note) !!}"
          >
          <i class="mdi mdi-eye"></i>
          <p>Xem chi tiết</p>
        </div>   
        <a href="{{route('methodPayment_update',['methodPayment_id'=>$item->methodPayment_id])}}" class="item-icon mg-5 flex_center icon-edit bg-yellow-og">
          <i class="mdi mdi-lead-pencil"></i>
          <p>Cập nhật</p>
        </a>  

        @if ($item->methodPayment_status===1)
        <a onclick="return confirm('Bạn có muốn ẩn không ?')" href="{{route('methodPayment_toogle_status',['methodPayment_id'=>$item->methodPayment_id,'methodPayment_status'=>1])}}" class="item-icon mg-5 flex_center icon-edit bg-red-blink">
          <i class="mdi mdi-toggle-switch"></i>
          <p>Ẩn</p>
        </a>   
        @else
       
        <a onclick="return confirm('Bạn có muốn hiện không ?')" href="{{route('methodPayment_toogle_status',['methodPayment_id'=>$item->methodPayment_id,'methodPayment_status'=>0])}}" class="item-icon mg-5 flex_center icon-edit bg-yellow-green">
          <i class="mdi mdi-toggle-switch-off"></i>
          <p>Hiện</p>
        </a> 
        @endif
       
       
      </div>
  </td>
</tr>
@endforeach