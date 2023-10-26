@extends('admin')
@section('main')
    <div class="content-wrapper">
        <div class="flex_center">
            <div class=" with-form-100w grid-margin stretch-card">
                <div class="card">
                    
                    <div class="card-body">
                        <h4 class="card-title" style="text-align: center">Chi tiết voucher</h4>

                        @foreach ($item_voucher as $item)
                            <div class="col-12 row">

                                <div class="col-6 pd-0-mg-0-b-0 validate-form">
                                    <div class="form-group  col-12 ">
                                        <p> <label> Tên voucher</label> :{{ $item->voucher_name }}</p>
                                    </div>
                                </div>
                                <div class="col-6 pd-0-mg-0-b-0 validate-form">
                                    <div class="form-group col-12">
                                        <p><label> Mã voucher</label>: {{ $item->voucher_code }}</p>
                                    </div>
                                </div>


                                <div class="col-4 pd-0-mg-0-b-0 validate-form">
                                    <div class="form-group col-12">
                                        <p><label> Giới hạn </label>:
                                            @if ($item->voucher_isLimit === 1)
                                                Có
                                            @else
                                                không
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                <div class="col-4 pd-0-mg-0-b-0 validate-form">
                                    <div class="form-group col-12">
                                        <p><label> Đơn vị </label>:
                                            @if ($item->voucher_unit === 0)
                                                Free ship
                                            @elseif($item->voucher_unit === 1)
                                                %
                                            @else
                                                VNĐ
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                <div class="col-4 pd-0-mg-0-b-0 validate-form">
                                    <div class="form-group col-12">
                                        <p><label> Điều kiện </label>:
                                            @if ($item->voucher_condition === '>')
                                                Lớn hơn {{ number_format($item->voucher_number_condition, 0, '.', ',') }}
                                                VNĐ
                                            @elseif ($item->voucher_condition === '>=')
                                                Lớn hơn hoặc bằng
                                                {{ number_format($item->voucher_number_condition, 0, '.', ',') }} VNĐ
                                            @elseif ($item->voucher_condition === '=')
                                                Bằng {{ number_format($item->voucher_number_condition, 0, '.', ',') }} VNĐ
                                            @elseif ($item->voucher_condition === '<=')
                                                Nhỏ hơn hoặc bằng
                                                {{ number_format($item->voucher_number_condition, 0, '.', ',') }} VNĐ
                                            @elseif ($item->voucher_condition === '<')
                                                Nhỏ hơn {{ number_format($item->voucher_number_condition, 0, '.', ',') }}
                                                VNĐ
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                <div class="col-4 pd-0-mg-0-b-0 validate-form">
                                    <div class="form-group col-12">
                                        <p><label> Số lượng giới hạn</label>:
                                            @if ($item->voucher_isLimit === 1)
                                                {{ $item->voucher_quantity }}
                                            @else
                                                không giới hạn
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                <div class="col-4 pd-0-mg-0-b-0 validate-form">
                                    <div class="form-group col-12">
                                        <p><label> Số tiền giảm </label>:
                                            {{ number_format($item->voucher_number, 0, '.', ',') }} VNĐ</p>
                                    </div>
                                </div>
                                <div class="col-4 pd-0-mg-0-b-0 validate-form">
                                    <div class="form-group col-12">
                                        <p><label>Thể loại voucher</label>: 
                                            @if ($item->voucher_category === 0)
                                               Free ship
                                            @elseif ($item->voucher_category === 1)
                                                Giảm theo %
                                            @else
                                                Giảm giá  theo VNĐ
                                            @endif
                                        </p>
                                    </div>
                                </div>

                                <div class="col-4 pd-0-mg-0-b-0 validate-form">
                                    <div class="form-group col-12">
                                        <p><label>Ngày bắt đầu</label>: 
                                            {{ $item->voucher_startDate }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-4 pd-0-mg-0-b-0 validate-form">
                                    <div class="form-group col-12">
                                        <p><label>Ngày kết thúc</label>: 
                                            {{ $item->voucher_endDate }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-4 pd-0-mg-0-b-0 validate-form">
                                    <div class="form-group col-12">
                                        <p><label>Trạng thái</label>: 
                                            
                                            @if ($item->voucher_status === 1)
                                                Đang hoạt động
                                            @else
                                                Đã tắt
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="">Mô tả</label><br>
                                    {!! htmlspecialchars_decode($item->voucher_note) !!}
                                </div>
                              
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
