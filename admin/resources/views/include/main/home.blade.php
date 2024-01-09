@extends('admin')
@section('main')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold" >Chúc 1 ngày tốt lành</h3>
                        <h6 class="font-weight-normal mb-0">Dù mệt mỏi như nào hãy cố gắng làm việc nhá !!!</span></h6>
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="justify-content-end d-flex">
                            <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button"
                                    id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                                    <a class="dropdown-item" href="#">January - March</a>
                                    <a class="dropdown-item" href="#">March - June</a>
                                    <a class="dropdown-item" href="#">June - August</a>
                                    <a class="dropdown-item" href="#">August - November</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card tale-bg">
                    <div class="card-people mt-auto">
                        <img src="{{ asset('BE/images/dashboard/people.svg') }}" alt="people">
                        <div class="weather-info">
                            <div class="d-flex">
                                <div>
                                    <h2 class="mb-0 font-weight-normal"><i class="icon-sun mr-2"></i>31<sup>C</sup></h2>
                                </div>
                                <div class="ml-2">
                                    <h4 class="location font-weight-normal">Bangalore</h4>
                                    <h6 class="font-weight-normal">India</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin transparent">
                <div class="row">
                    <div class="col-md-6 mb-4 stretch-card transparent">
                        <div class="card card-tale">
                            <div class="card-body">
                                <p class="mb-4">Lượt truy cập</p>
                                <p class="fs-30 mb-2">4006</p>
                                <p>Hôm nay</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4 stretch-card transparent">
                        <div class="card card-dark-blue">
                            <div class="card-body">
                                <p class="mb-4">Số đơn chờ xác nhận</p>
                                <p class="fs-30 mb-2">{{$countPayment}} </p>
                                <p>Tất cả</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                        <div class="card card-light-blue">
                            <div class="card-body">
                                <p class="mb-4">Số yêu cầu hủy đơn</p>
                                <p class="fs-30 mb-2">{{$countRequest_cancellation}}</p>
                                <p>Tất cả</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 stretch-card transparent">
                        <div class="card card-light-danger">
                            <div class="card-body">
                                <p class="mb-4">Số commet mới</p>
                                <p class="fs-30 mb-2">47033</p>
                                <p>Hôm nay</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-sm-12  grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title revenue-action active" data-value="6Mouth">Doanh thu 6 tháng gần nhất</p>
                       
                        <canvas id="order-chart" class="oder-chart-one"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-sm-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <p class="card-title">Tỉ lệ đơn thành công/thất bại 6 tháng gần đây</p>
                        </div>
                    
                        <div id="sales-legend" class="chartjs-legend mt-4 mb-2"></div>
                        <canvas id="sales-chart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-md-12 grid-margin stretch-card">
                <div class="card position-relative">
                    <div class="card-body">
                        <div id="detailedReports" class="carousel slide detailed-report-carousel position-static pt-2"
                            data-ride="carousel">

                            <div class="carousel-inner">
                                @foreach ($listProductTH as $item)
                                    <div class="carousel-item {{ $i == 1 ? 'active' : '' }}">
                                        <div class="row">
                                            <div class="col-md-12 col-xl-3 d-flex flex-column justify-content-start">
                                                <div class="ml-xl-4 mt-3">

                                                    <p class="card-title">Sản phẩm bán chạy số {{ $i++ }} trong tháng</p>
                                                    <p class="mb-8 mb-xl-10">Mã sản phẩm: {{ $item->product_code }} </p>
                                                    <p class="mb-2 mb-xl-0">Tên sản phẩm: {{ $item->product_name }} </p>
                                                    <p class="mb-2 mb-xl-0">Bán được: {{ $item->total_quantity }} cái</p>
                                                    <p>
                                                        <?php
                                                        $string = $item->variants;
                                                        $array = explode(',', $string);
                                                        $resultArray = [];
                                                        
                                                        $tempArray = [];
                                                        
                                                        foreach ($array as $element) {
                                                            $subArray = explode(' - ', $element);
                                                        
                                                            $key = $subArray[1] . ' - ' . $subArray[2];
                                                        
                                                            if (isset($tempArray[$key])) {
                                                                $tempArray[$key]['quantity'] += $subArray[0];
                                                            } else {
                                                                $tempArray[$key] = [
                                                                    'quantity' => $subArray[0],
                                                                    'size' => $subArray[1],
                                                                    'color' => $subArray[2],
                                                                ];
                                                            }
                                                        }
                                                        
                                                        $resultArray = array_values($tempArray);
                                                        ?>
                                                        
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-xl-9">
                                                <div class="row">
                                                    <div class="col-md-6 border-right">
                                                        <div class="table-responsive mb-3 mb-md-0 mt-3">
                                                            <table class="table table-borderless report-table">
                                                                @foreach ($resultArray as $itemQuantity)
                                                                    <tr>
                                                                        <td class="text-muted">{{ $itemQuantity['size'] }}
                                                                            / {{ $itemQuantity['color'] }}</td>
                                                                        <td class="w-100 px-0">
                                                                            <div class="progress progress-md mx-4">
                                                                                <div class="progress-bar bg-primary"
                                                                                    role="progressbar"
                                                                                    style="width: {{ $itemQuantity['quantity'] }}%"
                                                                                    aria-valuenow="100"
                                                                                    aria-valuemin="0" aria-valuemax="100">
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <h5 class="font-weight-bold mb-0">
                                                                                {{ $itemQuantity['quantity'] }}</h5>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mt-3">
                                                        <canvas id="north-america-chart"></canvas>
                                                        <div id="north-america-legend"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#detailedReports" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#detailedReports" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title mb-0">Sản phẩm bán chạy trong tháng</p>
                        <div class="table-responsive">
                            <table class="table table-striped table-borderless">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên</th>
                                        <th>Mã</th>
                                        <th>SL bán</th>
                                  
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($listProduct10 as $key=> $item10thProduct)
                                        <tr>
                                        <td class="font-weight-bold">{{$key+1}} </td>
                                        <td> 
                                            <a href="{{route('product_deatil',['product_id'=>$item10thProduct->product_id])}}">
                                                {{$item10thProduct->product_name}} 
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{route('product_deatil',['product_id'=>$item10thProduct->product_id])}}">
                                             {{$item10thProduct->product_code}} 
                                            </a>
                                        </td>
                                        <td>{{$item10thProduct->total_quantity}} </td>
                                    </tr>
                                   
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Việc cần làm</h4>
                        <div class="list-wrapper pt-2">
                            <ul class="d-flex flex-column-reverse todo-list todo-list-custom">
                           </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 stretch-card grid-margin">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title mb-0">Projects</p>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th class="pl-0  pb-2 border-bottom">Places</th>
                                        <th class="border-bottom pb-2">Orders</th>
                                        <th class="border-bottom pb-2">Users</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="pl-0">Kentucky</td>
                                        <td>
                                            <p class="mb-0"><span class="font-weight-bold mr-2">65</span>(2.15%)</p>
                                        </td>
                                        <td class="text-muted">65</td>
                                    </tr>
                                    <tr>
                                        <td class="pl-0">Ohio</td>
                                        <td>
                                            <p class="mb-0"><span class="font-weight-bold mr-2">54</span>(3.25%)</p>
                                        </td>
                                        <td class="text-muted">51</td>
                                    </tr>
                                    <tr>
                                        <td class="pl-0">Nevada</td>
                                        <td>
                                            <p class="mb-0"><span class="font-weight-bold mr-2">22</span>(2.22%)</p>
                                        </td>
                                        <td class="text-muted">32</td>
                                    </tr>
                                    <tr>
                                        <td class="pl-0">North Carolina</td>
                                        <td>
                                            <p class="mb-0"><span class="font-weight-bold mr-2">46</span>(3.27%)</p>
                                        </td>
                                        <td class="text-muted">15</td>
                                    </tr>
                                    <tr>
                                        <td class="pl-0">Montana</td>
                                        <td>
                                            <p class="mb-0"><span class="font-weight-bold mr-2">17</span>(1.25%)</p>
                                        </td>
                                        <td class="text-muted">25</td>
                                    </tr>
                                    <tr>
                                        <td class="pl-0">Nevada</td>
                                        <td>
                                            <p class="mb-0"><span class="font-weight-bold mr-2">52</span>(3.11%)</p>
                                        </td>
                                        <td class="text-muted">71</td>
                                    </tr>
                                    <tr>
                                        <td class="pl-0 pb-0">Louisiana</td>
                                        <td class="pb-0">
                                            <p class="mb-0"><span class="font-weight-bold mr-2">25</span>(1.32%)</p>
                                        </td>
                                        <td class="pb-0">14</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-title">Charts</p>
                                <div class="charts-data">
                                    <div class="mt-3">
                                        <p class="mb-0">Data 1</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="progress progress-md flex-grow-1 mr-4">
                                                <div class="progress-bar bg-inf0" role="progressbar" style="width: 95%"
                                                    aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <p class="mb-0">5k</p>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <p class="mb-0">Data 2</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="progress progress-md flex-grow-1 mr-4">
                                                <div class="progress-bar bg-info" role="progressbar" style="width: 35%"
                                                    aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <p class="mb-0">1k</p>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <p class="mb-0">Data 3</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="progress progress-md flex-grow-1 mr-4">
                                                <div class="progress-bar bg-info" role="progressbar" style="width: 48%"
                                                    aria-valuenow="48" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <p class="mb-0">992</p>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <p class="mb-0">Data 4</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="progress progress-md flex-grow-1 mr-4">
                                                <div class="progress-bar bg-info" role="progressbar" style="width: 25%"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <p class="mb-0">687</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 stretch-card grid-margin grid-margin-md-0">
                        <div class="card data-icon-card-primary">
                            <div class="card-body">
                                <p class="card-title text-white">Number of Meetings</p>
                                <div class="row">
                                    <div class="col-8 text-white">
                                        <h3>34040</h3>
                                        <p class="text-white font-weight-500 mb-0">The total number of sessions within the
                                            date range.It is calculated as the sum . </p>
                                    </div>
                                    <div class="col-4 background-icon">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">Notifications</p>
                        <ul class="icon-data-list">
                            <li>
                                <div class="d-flex">
                                    <img src="{{ asset('BE/images/faces/face1.jpg') }}" alt="user">
                                    <div>
                                        <p class="text-info mb-1">Isabella Becker</p>
                                        <p class="mb-0">Sales dashboard have been created</p>
                                        <small>9:30 am</small>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex">
                                    <img src="{{ asset('BE/images/faces/face2.jpg') }}" alt="user">
                                    <div>
                                        <p class="text-info mb-1">Adam Warren</p>
                                        <p class="mb-0">You have done a great job #TW111</p>
                                        <small>10:30 am</small>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex">
                                    <img src="{{ asset('BE/images/faces/face3.jpg') }}" alt="user">
                                    <div>
                                        <p class="text-info mb-1">Leonard Thornton</p>
                                        <p class="mb-0">Sales dashboard have been created</p>
                                        <small>11:30 am</small>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex">
                                    <img src="{{ asset('BE/images/faces/face4.jpg') }}" alt="user">
                                    <div>
                                        <p class="text-info mb-1">George Morrison</p>
                                        <p class="mb-0">Sales dashboard have been created</p>
                                        <small>8:50 am</small>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex">
                                    <img src="{{ asset('BE/images/faces/face5.jpg') }}" alt="user">
                                    <div>
                                        <p class="text-info mb-1">Ryan Cortez</p>
                                        <p class="mb-0">Herbs are fun and easy to grow.</p>
                                        <small>9:00 am</small>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
