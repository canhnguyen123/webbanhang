@extends('admin')
@section('main')
    <div class="content-wrapper">
        <div class="flex_center">
            <div class=" with-form-800  grid-margin stretch-card">
                <div class="card">
                    <div class="card-body row">
                        <h4 class="card-title" style="text-align: center">Cập nhật quyền chi tiết</h4>
                       @foreach ($item_permission as $itemDeatil)
                        <div class="form-group  col-xl-6 col-sm-12">
                           <p> <label> Tên  quyền</label> : {{$itemDeatil->permission_name }}</p>
                        </div>
                        <div class="form-group  col-xl-6 col-sm-12">
                            <p> <label> Mã  quyền</label> : {{$itemDeatil->permission_code }}</p>
                         </div>
                         <div class="form-group  col-xl-6 col-sm-12">
                            <p> <label>  Đường dẫn router </label> : {{$itemDeatil->permission_router }}</p>
                         </div>
                         <div class="form-group  col-xl-6 col-sm-12">
                            <p> <label> Nhóm quyền</label> : {{$itemDeatil->permission_group_name }}</p>
                         </div>
                         <div class="form-group  col-xl-6 col-sm-12">
                            <p> <label> Trạng thái</label> : 
                                @if ($itemDeatil->permission_status===1)
                                 Đang bật <i class="pass-icon mdi mdi-check"></i> 
                                @else
                                 Đang tắt <i class="fail-icon mdi mdi-close"></i> 
                                @endif
                                </td>
                            </p>
                         </div>
                        <div class="form-group col-xl-12 col-sm-12">
                            <label> Ghi chú</label>
                           <div class="col-12">
                            {{$itemDeatil->permission_note }}
                           </div>
                        </div>
                       @endforeach
              
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
