@foreach ($list_user as $item)
<tr>
  <td colspan="1">{{$i++}}</td>
  <td colspan="3">{{$item->user_fullname}}</td>
  <td colspan="2">{{$item->user_username}}</td>
  <td colspan="1" style="text-align: center">
    @if ($item->user_status===1)
    <i class="pass-icon mdi mdi-check"></i> 
    @else
    <i class="fail-icon mdi mdi-close"></i> 
    @endif
    </td>
 
  <td colspan="3" class="flex_center">
      <div class="list-icon flex_center">
        <a href="{{route('user_deatil',['user_id'=>$item->user_id])}}" class="item-icon mg-5 flex_center icon-edit bg-yellow-og">
          <i class="mdi mdi-eye"></i>
          <p>Chi tiết</p>
        </a>  
    </div>
  </td>
</tr>
@endforeach
