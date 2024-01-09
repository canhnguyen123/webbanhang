@extends('include.main.page.statistical.statistical')
@section('statistical')
    <div class="statistical-content">
        <p class="card-title flex_center">Doanh số sản phẩm</p>
        <div class="small-titel pg-50">
            <div class="list-titel-statistical">

                <div class="item-titel-statistical active flex_center revenue-action" data-value="6Mouth">
                    6 tháng gần đây
                </div>

                <div class="item-titel-statistical  flex_center revenue-action" data-value="yearNow">
                    Năm nay
                </div>

                <div class="item-titel-statistical  flex_center revenue-action" data-value="yearAgo">
                    Năm ngoái
                </div>

                <div class="item-titel-statistical  flex_center revenue-action" data-value="annualRevenue">
                    Doanh thu qua các năm
                </div>

            </div>
            <span >Tổng doanh thu {{ number_format($allMoney) }} VNĐ</span>
        </div>
        <div class="row col-12">

            <table id="example" class="display expandable-table" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col" style="text-align: center">STT</th>
                        <th scope="col">Tháng</th>
                        <th scope="col" >Tổng số lượng bán</th>
                        <th scope="col" >Doanh thu</th>
                    </tr>
                </thead>
                <tbody id="list-revenue">
                    @foreach ($list as $item)
                        <tr>
                            <th style="text-align: center">{{ $i++ }}</th>
                            <td>
                                {{ $item->month_name }}
                            </td>

                            <td >
                                {{ $item->total }}
                            </td>
                            <td >
                                {{ number_format($item->money) }} VNĐ
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            <div class="flex_center pd-50 box-loadmore"></div>
        </div>
        <div class="row col-12 mg-50">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">Biều đồ doanh thu</p>
                     
                        <canvas id="order-chart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
