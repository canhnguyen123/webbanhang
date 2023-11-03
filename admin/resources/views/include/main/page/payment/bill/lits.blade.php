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
    
        <div class="col-12  grid-margin stretch-card ">

            <span class="req-text-mess"></span>
          
        </div>
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <p class="card-title flex_center">Danh sách đơn hàng</p>
              
                <div class="status-payment-list">
                  @foreach ($statusPayment as $index => $itemStatus)
                    <div class="status-payment-item {{ $index === 0 ? 'active' : '' }} flex_center" data-id="{{$itemStatus->statusPayment_id}}">
                      {{$itemStatus->statusPayment_name}}
                    </div>
                  @endforeach
                </div>
              
                
                <div class="row">
                  <div class="col-12">
                    <div class="table-responsive">
                      <table id="example" class="display expandable-table" style="width:100%">
                        <thead>
                          <tr>
                            <th colspan="1">STT</th>
                            <th colspan="2">Mã</th>
                            <th colspan="2">SĐT</th>
                            <th colspan="2">Người đặt</th>
                            <th colspan="3" style="text-align: center">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody id="list-payment">
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
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                  @if ($check===1)
                  <div class="col-12 flex_center pd-30">
                    <button type="button" class=" btn-pimar-key btn-icon-text" id="btn-loadmore-methodPayment" data-id="{{ $list_payment->last()->methodPayment_id-1 }}" data-stt="{{$i-1}}">
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
