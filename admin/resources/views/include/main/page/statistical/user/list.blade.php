@extends('include.main.page.statistical.statistical')
@section('statistical')
    <div class="statistical-content">
        <p class="card-title flex_center">Danh sách người dùng</p>
        <div class="row col-12">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        {{-- <div class="list-titel-statistical">
                            <div class="item-titel-statistical active flex_center user-statisical-action"
                                data-value="all-User">
                                Tất cả
                            </div>  
                            <div class="item-titel-statistical  flex_center user-statisical-action"
                                data-value="6Mouth">
                                6 tháng gần nhất
                            </div>

                            <div class="item-titel-statistical  flex_center user-statisical-action" data-value="yearNow">
                                Năm nay
                            </div>

                            <div class="item-titel-statistical  flex_center user-statisical-action" data-value="yearAgo">
                                Năm ngoái
                            </div>
                          </div> --}}
                        <p class="card-title">Biểu đồ tỉ lệ thể loại tài khản</p>
                        <canvas id="north-america-chart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="small-titel pg-50">
            <span class="req-text-mess">Có  {{ $coutnUser1 }}/{{ $coutnUserAll }} tài khoản đang hoạt động và {{ $coutnUser0 }} Đang bị khóa </span>
        </div>
        <div class="row pg-50">
            <div class="col-xl-4 col-lg-6 col-mg-6 col-sm-12">
                <select class="form-select filter-user-bill" aria-label="Default select example">
                    <option selected disabled>Lọc theo đơn hàng/số tiền</option>
                    <option value="moneyMax">Số tiền chi nhiều nhất</option>
                    <option value="moneyMin">Số tiền chi ít nhất</option>
                    <option value="billBuyMax">Số đơn hàng mua nhiều nhất</option>
                    <option value="billBuyMin">Số đơn hàng mua ít nhất</option>
                    <option value="cmtMax">Bình luận nhiều nhất</option>
                    <option value="cmtMin">Bình luận ít nhất</option>
                    <option value="billError">Số đơn giao thất bại cao nhất</option>
                    <option value="billSuccess">Số đơn giao thất bại thấp nhất</option>
                    <option value="billCannelMax">Yêu cầu hủy đơn nhiều nhất</option>
                    <option value="billCannelMin">Yêu cầu hủy đơn ít nhất</option>
                  </select>
            </div>
            <div class="col-xl-4 col-lg-6 col-mg-6 col-sm-12">
                <select class="form-select filter-user-time" aria-label="Default select example">
                    <option selected disabled>Thời gian tạo tài khoản</option>
                    <option value="today">Hôm nay</option>
                    <option value="thisweed">Tuần này</option>
                    <option value="lastWeek">Tuần trước</option>
                    <option value="thismonth">Tháng này</option>
                    <option value="lastmonth">Tháng trước</option>
                    <option value="thisyear">Năm nay</option>
                    <option value="lastyear">Năm ngoái</option>
                    <option value="all">Tất cả</option>
                  </select>
            </div>
            <div class="col-xl-4 col-lg-6 col-mg-6 col-sm-12">
                <select class="form-select" aria-label="Default select example">
                    <option selected disabled>Số xu trong tài khoản</option>
                    <option value="1">Nhiều nhất</option>
                    <option value="2">Ít nhất</option>
                  </select>
            </div>
        </div>
        <div class="row col-12">

            <table id="example" class="display expandable-table" style="width:100%">
                <thead>
                    <tr>
                        <th colspan="1" style="text-align: center">STT</th>
                        <th colspan="3">Tên người dùng</th>
                        <th colspan="1" >Số lượt mua hàng</th>
                        <th colspan="3" >Số tiền mua</th>
                        <th colspan="1" >Số lượt bình luận</th>
                        <th colspan="1">Số đơn hủy</th>
                        <th colspan="1">Số yêu cầu hủy</th>
                        <th colspan="1">Thời gian tạo</th>
                    </tr>
                </thead>
                <tbody id="list-user-statistical">
                    @foreach ($getListUser as $item)
                        <tr>
                            <th colspan="1" style="text-align: center">{{ $i++ }}</th>
                            <td colspan="3">
                                <a href="{{ route('user_deatil', ['user_id' => $item->user_id]) }}">
                                    {{ $item->user_fullname }}
                                </a>
                            </td>
                            <td colspan="1" >{{ $item->order_count }}</td>
                            <td colspan="3" >{{number_format($item->total_amount)  }} VNĐ</td>
                            <td colspan="1">{{ $item->comment_count }}</td>
                            <td colspan="1">{{ $item->total_cancel }}</td>
                            <td colspan="1">{{ $item->cancel_count }}</td>
                            <td colspan="1" class="converer-time">{{ $item->created_at }}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        
    </div>
@endsection
