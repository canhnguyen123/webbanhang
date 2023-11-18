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
                        <a href="{{ route('statistical.product.list') }}">
                            <div class="item-titel-statistical active flex_center">
                                Sản phẩm
                            </div>
                        </a>
                        <a href="">
                            <div class="item-titel-statistical  flex_center">
                                Người dùng
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
                        <a href="">
                          <div class="item-titel-statistical  flex_center">
                              Doanh số
                          </div>
                      </a>
                    </div>
                    @yield('statistical')
                    
                  </div>

            </div>
        </div>
    </div>
@endsection
