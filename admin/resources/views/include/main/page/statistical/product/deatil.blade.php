@extends('include.main.page.statistical.statistical')
@section('statistical')
    <div class="statistical-content">
        <p class="card-title flex_center">Chi tiết sản phẩm </p>
        <div class="small-titel pg-50">
            <span>Đã bán được {{ $total }} sản phẩm (chỉ tính các ở đơn hàng đã trạng thái hoàn thành) </span>
        </div>
        <div class="">
            <table id="example" class="display expandable-table" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col" style="text-align: center">STT</th>
                        <th scope="col">Màu/Size</th>
                        <th scope="col" style="text-align: center">Mã hóa đơn</th>
                        <th scope="col" style="text-align: center">Số lượng bán</th>
                        <th scope="col" style="text-align: center">Thời gian khách đặt</th>
                        <th scope="col" style="text-align: center">Thời gian hoàn thành</th>

                    </tr>
                </thead>
                <tbody id="list-productSoid">
                    @foreach ($deatilTable as $item)
                        <tr>
                            <th style="text-align: center">{{ $i++ }}</th>
                            <td>
                                <a href="{{ route('product_deatil', ['product_id' => $item->product_id]) }}">
                                    {{ $item->product_color }}/{{ $item->product_size }}
                                </a>
                            </td>
                            <td style="text-align: center">
                                <a href="{{ route('payment_deatil', ['payment_id' => $item->payment_id]) }}">
                                    {{ $item->payment_code }}
                                </a>
                            </td>
                            <td style="text-align: center">{{ $item->product_quantity }} </td>
                            <td style="text-align: center">{{ $item->created_at }}</td>
                            <td style="text-align: center">{{ $item->updated_at }}</td>


                        </tr>
                    @endforeach

                </tbody>
            </table>
            <div class="row col-12 pg-50-0">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="list-titel-statistical">
                            <div class="item-titel-statistical active flex_center product-deatil-action" data-value="6Mouth"
                                data-id={{ $product_id }}>
                                6 tháng gần nhất
                            </div>

                            <div class="item-titel-statistical  flex_center product-deatil-action" data-value="yearNow"
                                data-id={{ $product_id }}>
                                Năm nay
                            </div>

                            <div class="item-titel-statistical  flex_center product-deatil-action" data-value="yearAgo"
                                data-id={{ $product_id }}>
                                Năm ngoái
                            </div>

                            <div class="item-titel-statistical  flex_center product-deatil-action"
                                data-value="annualRevenue" data-id={{ $product_id }}>
                                Doanh thu qua các năm
                            </div>
                            <div class="item-titel-statistical  flex_center product-deatil-action" data-value="compare"
                                data-id={{ $product_id }}>
                                So sánh với sản phẩm khác
                            </div>

                        </div>
                        <div class="card-body ">
                            <div class="list-select-product compare-box row" style="display: none">
                                <div class="col-xl-6 col-sm-12 pd-10">
                                    <select class="js-example-basic-single select-change-compare " name="state"
                                        style="width: 100%;" data-id={{ $product_id }}>
                                        @foreach ($selectList as $item)
                                            <option value="{{ $item->product_id }}">{{ $item->product_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xl-6 col-sm-12 pd-10">
                                    <select class="form-select col-sl-6 col-sm-12" style="width: 100%;" aria-label="Default select example">
                                        <option selected>Chọn thời gian so sánh</option>
                                        <option value="6Mouth">6 tháng gần nhất</option>
                                        <option value="yearNow">Năm nay</option>
                                        <option value="yearAgo">Năm ngoái</option>
                                        <option value="annualRevenue">Qua các năm</option>
                                    </select>
                                </div>


                            </div>
                            <p class="card-title titel-chart-productDetail">
                                Biểu đồ số lượng bán <span class="titel-compare-product-detail">6 tháng gần nhất</span>
                            </p>
                            <div class="d-flex flex-wrap mb-5">
                                <canvas id="order-chart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
