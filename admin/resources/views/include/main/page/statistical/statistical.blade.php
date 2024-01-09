@extends('admin')
@section('main')
    <div class="content-wrapper">
        <div class="row">

        </div>
        <div class="row ">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title flex_center">Thống kê</p>
                    </div>
                    <div class="list-titel-statistical">
                        <a href="{{ route('statistical') }}">
                            <div class="item-titel-statistical  flex_center">
                               <i class="mdi mdi-cash-usd menu-icon"></i>  Doanh số
                            </div>
                        </a>
                        <a href="{{ route('statistical.product.list') }}">
                            <div class="item-titel-statistical  flex_center">
                                <i class="mdi mdi-tshirt-crew menu-icon"></i> 
                                Sản phẩm
                            </div>
                        </a>
                        <a href="{{route('statistical.user.list')}}">
                            <div class="item-titel-statistical  flex_center">
                                <i class="mdi mdi-account-multiple-outline menu-icon"></i> Người dùng
                            </div>
                        </a>
                        <a href="">
                            <div class="item-titel-statistical  flex_center">
                                Hệ thống
                            </div>
                        </a>
                        <a href="">
                            <div class="item-titel-statistical  flex_center">
                                Hóa đơn
                            </div>
                        </a>
                      
                    </div>
                    @yield('statistical')
                    
                  </div>

            </div>
        </div>
    </div>
@endsection
