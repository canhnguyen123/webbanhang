@extends('admin')
@section('main')
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="list-item-titel">
        <a href="{{route('brand_add')}}" class="item-icon flex_center mg-5 icon-edit bg-violet">
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
        <div class="item-icon  flex_center mg-5 icon-edit bg-violet" id="return-brand">
          <i class="mdi mdi-keyboard-return"></i>
          <p>Quay lại</p>
        </div>
        <div class="item-icon active-box flex_center mg-5 icon-edit bg-violet" id="ecxel-brand">
          <i class="mdi mdi-file-excel"></i>
          <p>Xuất bản excel</p>
        </div>
      </div>
    </div>
</div>
<div class="row ">
        <div class="col-md-12 grid-margin stretch-card ">
          <div class="row div-search" style="display: none">
            <form action="" class="search-form flex_center">
              <input type="text" id="brand-search" class="search-input" placeholder="Nhập thông tin tìm kiếm" required>
                <i id="brand-search-btn" class="mdi icon-search mdi-magnify"></i>
              <i class="fail-icon mdi mdi-close"></i>
            </form>
          </div>
        </div>
        <div class="col-md-12 grid-margin stretch-card ">
          <div class="row toggle-filter-div" style="display: none">
            <select class="form-select form-select-lg mb-3" id="filter-status-brand">
              <option disabled>Chọn trạng thái</option>
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
                <p class="card-title flex_center"> Danh sách thương hiệu</p>
                <div class="row">
                  <div class="col-12">
                    <div class="table-responsive">
                      <table id="example" class="display expandable-table" style="width:100%">
                        <thead>
                          <tr>
                            <th colspan="1">STT</th>
                            <th colspan="3">Tên</th>
                            <th colspan="2">Mã</th>
                            <th colspan="1" style="text-align: center">Trạng thái</th>
                            <th colspan="3" style="text-align: center">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody id="list-brand">
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
                                  <a onclick="return confirm('Bạn có muốn ẩn không ?')" href="{{route('brand_toogle_status',['brand_id'=>$item->brand_id])}}" class="item-icon mg-5 flex_center icon-edit bg-red-blink">
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
                          
                        </tbody>
                        @if ($category===0)
                        @include('ohther.pagination.pagination', [
                          'paginator' => $list_brand,'nameElement'=>$nameElement
                        ])
                      @endif
                      </table>
                    </div>
                  </div>
                  @if ($check===1&&$category===1)
                  @include('ohther.pagination.loadmore', ['pagination_nameElement' => $nameElement,'id'=>$list_brand->last()->brand_id-1,'i'=>$i])
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
