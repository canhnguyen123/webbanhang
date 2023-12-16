@extends('admin')
@section('main')
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="list-item-titel">
        <a href="{{route('theloai_add')}}" class="item-icon flex_center mg-5 icon-edit bg-violet">
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
        <div class="item-icon  flex_center mg-5 icon-edit bg-violet" id="return-theloai">
          <i class="mdi mdi-keyboard-return"></i>
          <p>Quay lại</p>
        </div>
        <a href="{{route('theloai_showHome')}}" class="item-icon  flex_center mg-5 icon-edit bg-violet active-box" id="return-theloai">
          <i class="mdi mdi-home"></i>
          <p>Hiển thị ở trang chủ</p>
        </a>
        <a href="{{route('theloai_checked')}}" class="item-icon  flex_center mg-5 icon-edit bg-violet active-box" id="return-theloai">
          <i class="mdi mdi-check"></i>
          <p>Được chọn trang chủ</p>
        </a>
      </div>
    </div>
</div>
<div class="row ">
        <div class="col-md-12 grid-margin stretch-card ">
          <div class="row div-search" style="display: none">
            <form action="" class="search-form flex_center">
              <input type="text" id="theloai-search" class="search-input" placeholder="Nhập thông tin tìm kiếm" required>
                <i id="theloai-search-btn" class="mdi icon-search mdi-magnify"></i>
              <i class="fail-icon mdi mdi-close"></i>
            </form>
          </div>
        </div>
        <div class="col-12 row  grid-margin stretch-cardfi toggle-filter-div" style="display: none">
          <div class="form-group col-4">
            <label for="exampleFormControlSelect1">Danh mục</label>
            <select class="form-control form-control-lg select_danhmuc">
              @foreach ($listCategory as $item)
               <option value="{{$item->category_id}}">{{$item->category_name}}</option>
              @endforeach
             
            </select>
          </div>
          <div class="form-group col-4">
            <label for="exampleFormControlSelect1">Phân loại</label>
            <select class="form-control form-control-lg select_theloais" >
              @foreach ($listPhanLoai as $item)
              <option value="{{$item->phanloai_id}}">{{$item->phanloai_name}}</option>
             @endforeach
            </select>
          </div>
          <div class="form-group col-4">
            <label for="exampleFormControlSelect1">Trạng thái</label>
            <select class="form-control form-control-lg select_status">
              <option value="all">Tất cả</option>
              <option value="1">Đang bật</option>
              <option value="0">Đang tắt</option>
            </select>
          </div>
        </div>

        <div class="col-12  grid-margin stretch-card ">

          <span class="req-text-mess"></span>
        
      </div>
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <p class="card-title flex_center"> Danh sách thể loại</p>
                <div class="row">
                  <div class="col-12">
                    <div class="table-responsive">
                      <table id="example" class="display expandable-table" style="width:100%">
                        <thead>
                          <tr>
                            <th colspan="1">STT</th>
                            <th colspan="2">Danh mục</th>
                            <th colspan="2">Phân loại</th>
                            <th colspan="3">Tên</th>
                            <th colspan="2">Mã</th>
                            <th colspan="1" style="text-align: center">Trạng thái</th>
                            <th colspan="3" style="text-align: center">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody id="list-theloai">
                          @foreach ($list_theloai as $item)
                          <tr>
                            <td colspan="1">{{$i++}}</td>
                            <td colspan="2">{{$item->category_name}}</td>
                            <td colspan="2">{{$item->phanloai_name}}</td>
                            <td colspan="3">
                              <img class="img-tbl zoomable-image myImage" 
                                   
                                   src="{{$item->theloai_img}}" >
                                    {{$item->theloai_name}}
                          </td>                        
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
                          
                        </tbody>

                        @if ($category===0)
                        @include('ohther.pagination.pagination', [
                          'paginator' => $list_theloai,'nameElement'=>$nameElement
                        ])
                      @endif
                    
                      </table>
                           <div class="modal myModal">
                            <span class="close">&times;</span>
                            <img class="modal-content imgBig">
                          </div>
                    </div>
                  </div>
                  @if ($check===1&&$category===1)
                  @include('ohther.pagination.loadmore', ['pagination_nameElement' => $nameElement,'id'=>$list_theloai->last()->theloai_id-1,'i'=>$i])
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
