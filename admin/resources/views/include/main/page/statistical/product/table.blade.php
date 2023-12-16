@extends('include.main.page.statistical.statistical')
@section('statistical')
    <div class="statistical-content">
        <p class="card-title flex_center">Sản phẩm đã bán</p>
        <div class="small-titel pg-50">
            <span>Đã bán được {{ $countProductSoid }}/{{ $countProductAll }} sản phẩm </span>
        </div>
        <div class="row col-12">

            <table id="example" class="display expandable-table" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col" style="text-align: center">STT</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col" style="text-align: center">Số lượt bán</th>
                        <th scope="col" style="text-align: center">Tổng số lượng bán</th>
                        <th colspan="3" style="text-align: center">Thao tác</th>
                    </tr>
                </thead>
                <tbody id="list-productSoid">
                    @foreach ($list_productSoid as $item)
                        <tr>
                            <th style="text-align: center">{{ $i++ }}</th>
                            <td>
                                <a href="{{ route('product_deatil', ['product_id' => $item->product_id]) }}">
                                    {{ $item->product_name }}
                                </a>
                            </td>
                            <td style="text-align: center">{{ $item->product_count }}</td>
                            <td style="text-align: center">{{ $item->total_quantity }}</td>
                            <td>
                                <div class="flex_center w-150">
                                    <a href="{{ route('statistical.product.deatil', ['product_id' => $item->product_id]) }}"
                                        class="item-icon mg-5 flex_center icon-edit bg-yellow-og">
                                        <i class="mdi mdi-eye"></i>
                                        <p>Xem chi tiết</p>
                                    </a>
                                </div>

                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <div class="row col-12">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="list-titel-statistical">
                            <div class="item-titel-statistical active flex_center product-all-action"
                                data-value="6Mouth">
                                6 tháng gần nhất
                            </div>

                            <div class="item-titel-statistical  flex_center product-all-action" data-value="yearNow">
                                Năm nay
                            </div>

                            <div class="item-titel-statistical  flex_center product-all-action" data-value="yearAgo">
                                Năm ngoái
                            </div>

                            <div class="item-titel-statistical  flex_center product-all-action"
                                data-value="annualRevenue">
                                Doanh thu qua các năm
                            </div>  

                        </div>
                        <p class="card-title">Biểu đồ số lượng bán</p>
                        <canvas id="order-chart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
