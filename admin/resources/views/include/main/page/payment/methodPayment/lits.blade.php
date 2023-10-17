@extends('admin')
@section('main')
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="list-item-titel">
        <a href="{{route('methodPayment_add')}}" class="item-icon flex_center mg-5 icon-edit bg-violet">
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
        <div class="item-icon return-icon flex_center mg-5 icon-edit bg-violet" id="return-methodPayment">
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
              <input type="text" id="methodPayment-search" class="search-input" placeholder="Nhập thông tin tìm kiếm" required>
                <i id="methodPayment-search-btn" class="mdi icon-search mdi-magnify"></i>
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
                <p class="card-title flex_center"> Danh sách phương thức thanh toán</p>
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
                        <tbody id="list-methodPayment">
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
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                  @if ($check===1)
                  <div class="col-12 flex_center pd-30">
                    <button type="button" class=" btn-pimar-key btn-icon-text" id="btn-loadmore-methodPayment" data-id="{{ $list_methodPayment->last()->methodPayment_id-1 }}" data-stt="{{$i-1}}">
                      <i class="mdi mdi-arrow-down"></i>
                      Xem  thêm
                    </button>
                  </div>
                  @endif
                </div>
                </div>
              </div>
    
              
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Mô tả</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <span class="text-mota-table"></span>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    
  </div>
</div>
@endsection
