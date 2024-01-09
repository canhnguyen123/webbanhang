@extends('admin')
@section('main')
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="list-item-titel">
        <a href="{{route('todolist.add')}}" class="item-icon flex_center mg-5 icon-edit bg-violet">
          <i class="mdi mdi-plus"></i>
          <p>Thêm</p>
        </a>
        <div class="item-icon toggle-search flex_center mg-5 icon-edit bg-violet">
          <i class="mdi mdi-magnify"></i>
          <p>Tìm kiếm</p>
        </div>
        <div class="item-icon toggle-filter flex_center mg-5 icon-edit bg-violet">
          <i class="mdi mdi-filter"></i>
          <p>Lọc</p>
        </div>
        <div class="item-icon return-icon flex_center mg-5 icon-edit bg-violet" id="return-voucher">
          <i class="mdi mdi-keyboard-return"></i>
          <p>Quay lại</p>
        </div>
      </div>
    </div>
</div>
<div class="row ">
        <div class="col-md-12 grid-margin stretch-card ">
          <div class="row div-search" style="display: none">
            <form action="" class="search-form flex_center">
              <input type="text" id="voucher-search" class="search-input" placeholder="Nhập thông tin tìm kiếm" required>
                <i id="voucher-search-btn" class="mdi icon-search mdi-magnify"></i>
              <i class="fail-icon mdi mdi-close"></i>
            </form>
          </div>
        </div>
    
        <div class="col-12  grid-margin stretch-card ">

            <span class="req-text-mess"></span>
          
        </div>
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <p class="card-title flex_center"> Danh sách voucher</p>
                <div class="row">
                  <div class="col-12">
                    <div class="table-responsive">
                      <table id="example" class="display expandable-table" style="width:100%">
                        <thead>
                          <tr>
                            <th colspan="1">STT</th>
                            <th colspan="3">Nhân viên</th>
                            <th colspan="2">Việc cần làm</th>
                            <th colspan="1" style="text-align: center">Trạng thái</th>
                            <th colspan="3" style="text-align: center">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody id="list-voucher">
                          @foreach ($list_todolist as $item)
                          <tr>
                            <td colspan="1">{{$i++}}</td>
                            <td colspan="2"><a href="{{ route('deatil_staff', ['staff_id' => $item->staff_id]) }}">{{$item->staff->staff_fullname}}</a></td>
                            <td colspan="3"> {!! htmlspecialchars_decode($item->todolist_name) !!}</td>
                            <td colspan="1" style="text-align: center">
                              @if ($item->todolist_status===1)
                                  Đã hoàn thanh
                              @else
                                  Chưa hoàn thành
                              @endif
                              </td>
                           
                            <td colspan="3" class="flex_center">
                                <div class="list-icon flex_center">
                                  <a href="{{route('todolist.deatil',['todolist_id'=>$item->todolist_id])}}" class="item-icon mg-5 flex_center icon-edit bg-da">
                                    <i class="mdi mdi-eye"></i>
                                    <p>Xem chi tiết</p>
                                  </a> 
                                  <a href="{{route('todolist.update',['todolist_id'=>$item->todolist_id])}}" class="item-icon mg-5 flex_center icon-edit bg-yellow-og">
                                    <i class="mdi mdi-lead-pencil"></i>
                                    <p>Cập nhật</p>
                                  </a>  

                                  @if ($item->todolist_status===1)
                                  <a onclick="return confirm('Bạn xác nhận đã hoàn thành việc ?')" href="{{route('todolist.toogle',['todolist_id'=>$item->todolist_id])}}" class="item-icon mg-5 flex_center icon-edit bg-red-blink">
                                    <i class="mdi mdi-toggle-switch"></i>
                                    <p>Ẩn</p>
                                  </a>   
                                  @else
                                  <a onclick="return confirm('Bạn xác nhận chưas hoàn thành việc ?')" href="{{route('todolist.toogle',['todolist_id'=>$item->todolist_id])}}" class="item-icon mg-5 flex_center icon-edit bg-yellow-green">
                                    <i class="mdi mdi-toggle-switch-off"></i>
                                    <p>Hiện</p>
                                  </a> 
                                  @endif
                                 
                                 
                                </div>
                            </td>
                          </tr>
                          @endforeach
                          
                        </tbody>
                        @if ($category===0)
                        @include('ohther.pagination.pagination', [
                          'paginator' => $list_todolist,'nameElement'=>$nameElement
                        ])
                      @endif
                      </table>
                    </div>
                  </div>
                  @if ($check===1&&$category===1)
                    @include('ohther.pagination.loadmore', ['pagination_nameElement' => $nameElement,'id'=>$list_todolist->last()->voucher_id-1,'i'=>$i])
                  @endif
                </div>
                </div>
              </div>
    
              
            </div>
        </div>
    </div>

  </div>
</div>
@endsection
