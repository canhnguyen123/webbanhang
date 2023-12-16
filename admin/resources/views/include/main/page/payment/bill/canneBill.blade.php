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
        <div class="col-md-12 grid-margin stretch-card ">
          <div class="row toggle-filter-div" style="display: none">
            <select class="form-select form-select-lg mb-3" id="filter-status-canneBill">
              <option disabled>Chọn trạng thái</option>
              <option value="1">Đã xử lý</option>
              <option value="0">Chưa xử lý</option>
            </select>
        
          </div>
        </div>
        <div class="col-12  grid-margin stretch-card ">

            <span class="req-text-mess"></span>
          
        </div>
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <p class="card-title flex_center">Danh sách yêu cầu hủy đơn</p>
              <div class="row">
                  <div class="col-12">
                    <div class="table-responsive">
                      <table id="example" class="display expandable-table" style="width:100%">
                        <thead>
                          <tr>
                            <th colspan="1">STT</th>
                            <th colspan="2">Mã đơn</th>
                            <th colspan="2">Tên người gửi</th>
                            <th colspan="2">Tên đăng nhập</th>
                            <th colspan="1">Trạng thái</th>
                            <th colspan="2">Thời gian</th>
                            <th colspan="1" style="text-align: center">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody id="list-payment">
                          @foreach ($getCanneBill as $item)
                          <tr>
                            <td colspan="1">{{$i++}}</td>
                            <td colspan="2">
                              <a href="{{route('payment_deatil',['payment_id'=>$item->payment_id])}}">
                                @if ($item->payment_code==="")
                                Chưa tạo mã
                                @else
                                  {{$item->payment_code}}
                                @endif
                              </a>
                               
                              </td>
                            <td colspan="2">
                              <a href="{{route('user_deatil',['user_id'=>$item->user_id])}}">
                                {{$item->user_fullname}}
                              </a>
                              </td>
                            <td colspan="2">
                              <a href="{{route('user_deatil',['user_id'=>$item->user_id])}}">
                                {{$item->user_username}}
                            </a>
                            </td>
                            <td colspan="1" style="text-align: center">
                              @if ($item->request_cancellation_status===1)
                              <i class="pass-icon mdi mdi-check"></i> 
                              @else
                              <i class="fail-icon mdi mdi-close"></i> 
                              @endif
                            </td>
                            <td colspan="2">
                             
                                {{$item->create_at}}
                       
                            </td>
                           <td colspan="1" class="flex_center">
                                @if ($item->request_cancellation_status===1)
                                <div class="list-icon flex_center"> 
                                  <div  class="item-icon mg-5 flex_center icon-edit bg-da toggle-modal"
                                     data-bs-toggle="modal" 
                                     data-bs-target="#exampleModal" 
                                     data-reason="{!! htmlspecialchars_decode( $item->request_cancellation_mess) !!}"
                                     data-user_id="{{( $item->user_id)}}"
                                     data-payment_id="{{( $item->payment_id)}}"
                                     data-id="{{( $item->request_cancellation_id)}}"> 
                                     <i class="mdi mdi-lead-pencil"></i>
                                    <p>Xem chi tiết</p>
                                  </div> 
                              </div>
                                @else
                                Không đồng ý 
                                @endif
                              
                            </td>
                          </tr>
                          @endforeach
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                  {{-- @if ($check===1)
                  <div class="col-12 flex_center pd-30">
                    <button type="button" class=" btn-pimar-key btn-icon-text" id="btn-loadmore-methodPayment" data-id="{{ $list_payment->last()->methodPayment_id-1 }}" data-stt="{{$i-1}}">
                      <i class="mdi mdi-arrow-down"></i>
                      Xem  thêm
                    </button>
                  </div>
                  @endif --}}
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
            <h5 class="modal-title" id="exampleModalLabel">Xác nhận hủy đơn cho khách</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body ">
            <div class="col-xl-12 col-sm-12 pd-0-mg-0-b-0 form-group  col-12 flex_start">
              <label for="">Lý do hủy : </label><br>
              <p class="text-reason"></p>
            </div>
              <div class="col-xl-12 col-sm-12 pd-0-mg-0-b-0 form-group  col-12 flex_start" style="margin-top: 20px !important">
                <input type="checkbox" class="toggle-box-canne-bill" id="toggle-box-canne-bill"><span class="canne-bill-text">Xác nhận</span>
           </div>
             <div class="col-xl-12 col-sm-12 pd-0-mg-0-b-0 " style="margin-top: 20px !important">
              <div class="form-group form-input col-12">
                  <input type="text"  class="form-control response-content" required>
                  <label>Nội dung phản hồi</label>
              </div>
          </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
            <button type="button" class="btn btn-primary btn-canne-bill">Lưu</button>
          </div>
        </div>
      </div>
    </div>
    
  </div>
</div>
@endsection
