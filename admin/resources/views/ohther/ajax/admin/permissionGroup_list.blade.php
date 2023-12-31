@foreach ($list_permissionGroup as $item)
<tr>
  <td colspan="1">{{$i++}}</td>
  <td colspan="3">{{$item->permission_group_name}}</td>
  <td colspan="2">{{$item->permission_group_code}}</td>
  <td colspan="1" style="text-align: center">
    @if ($item->permission_group_status===1)
    <i class="pass-icon mdi mdi-check"></i> 
    @else
    <i class="fail-icon mdi mdi-close"></i> 
    @endif
    </td>
 
  <td colspan="3" class="flex_center">
      <div class="list-icon flex_center">
        <a href="{{route('permission.Group.update',['permissionGroup_id'=>$item->permission_group_id])}}" class="item-icon mg-5 flex_center icon-edit bg-yellow-og">
          <i class="mdi mdi-lead-pencil"></i>
          <p>Cập nhật</p>
        </a>  

        @if ($item->permission_group_status===1)
        <a onclick="return confirm('Bạn có muốn ẩn không ?')" href="{{route('permission.Group.toggle',['permissionGroup_id'=>$item->permission_group_id,'permissionGroup_status'=>1])}}" class="item-icon mg-5 flex_center icon-edit bg-red-blink">
          <i class="mdi mdi-toggle-switch"></i>
          <p>Ẩn</p>
        </a>   
        @else
        <a onclick="return confirm('Bạn có muốn hiện không ?')" href="{{route('permission.Group.toggle',['permissionGroup_id'=>$item->permission_group_id,'permissionGroup_status'=>0])}}" class="item-icon mg-5 flex_center icon-edit bg-yellow-green">
          <i class="mdi mdi-toggle-switch-off"></i>
          <p>Hiện</p>
        </a> 
        @endif
       
       
      </div>
  </td>
</tr>
@endforeach