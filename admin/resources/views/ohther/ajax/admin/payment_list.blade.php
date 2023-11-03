@foreach ($list_payment as $item)
<tr>
  <td colspan="1">{{$i++}}</td>
  <td colspan="2">
    @if ($item->payment_code==="")
      Chưa tạo mã
    @else
      {{$item->payment_code}}
    @endif
  </td>
  <td colspan="2">{{$item->payment_phoneUser}}</td>
  <td colspan="2">{{$item->payment_nameUser}}</td>

 
  <td colspan="3" class="flex_center">
      <div class="list-icon flex_center"> 
        <a href="{{route('payment_deatil',['payment_id'=>$item->payment_id])}}" class="item-icon mg-5 flex_center icon-edit bg-da">
          <i class="mdi mdi-eye"></i>
          <p>Xem chi tiết</p>
        </a>
        <a href="{{route('methodPayment_update',['methodPayment_id'=>$item->methodPayment_id])}}" class="item-icon mg-5 flex_center icon-edit bg-yellow-og">
          <i class="mdi mdi-lead-pencil"></i>
          <p>Cập nhật</p>
        </a>  
    </div>
  </td>
</tr>
@endforeach