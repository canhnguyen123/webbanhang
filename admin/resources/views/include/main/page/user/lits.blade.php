@extends('admin')
@section('main')
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="list-item-titel">
        
        <div class="item-icon toggle-search flex_center mg-5 icon-edit bg-violet">
          <i class="mdi mdi-magnify"></i>
          <p>Tìm kiếm</p>
        </div>
        <div class="item-icon toggle-filter flex_center mg-5 icon-edit bg-violet">
          <i class="mdi mdi-filter"></i>
          <p>Lọc</p>
        </div>
        <div class="item-icon  flex_center mg-5 icon-edit bg-violet" id="return-user">
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
              <input type="text" id="user-search" class="search-input" placeholder="Nhập thông tin tìm kiếm" required>
                <i id="user-search-btn" class="mdi icon-search mdi-magnify"></i>
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
                <p class="card-title flex_center"> Danh sách người dùng</p>
                <div class="row">
                  <div class="col-12">
                    <div class="table-responsive">
                      <table id="example" class="display expandable-table" style="width:100%">
                        <thead>
                          <tr>
                            <th colspan="1">STT</th>
                            <th colspan="3">Họ tên</th>
                            <th colspan="2">Tên đăng nhập</th>
                            <th colspan="1" style="text-align: center">Trạng thái</th>
                            <th colspan="3" style="text-align: center">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody id="list-user">
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
                          
                        </tbody>
                        @if ($category===0)
                        @include('ohther.pagination.pagination', [
                          'paginator' => $list_user,'nameElement'=>$nameElement
                        ])
                      @endif
                      </table>
                    </div>
                  </div>
                  @if ($check===1&&$category===1)
                  @include('ohther.pagination.loadmore', ['pagination_nameElement' => $nameElement,'id'=>$list_user->last()->user_id-1,'i'=>$i])
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
