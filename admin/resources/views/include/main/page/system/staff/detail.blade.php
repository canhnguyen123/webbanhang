@extends('admin')
@section('main')
    <div class="content-wrapper">
        @foreach ($item_staff as $item)
        <div class=" row">
            <div class="col-4 img-div">
                <img class="img-item-form" src="{{ asset('upload/BE/' . $item->staff_linkimg) }}" alt="">
            </div>
            <div class=" col-8  grid-margin stretch-card ">
                <div class="card">
                    <div class="card-body row">
                        <h4 class="card-title" style="text-align: center">Thông tin tài khoản
                        </h4>
                   
                            <div class="col-6 pd-0-mg-0-b-0 validate-form">
                                <div class="form-group  col-12 ">
                                   
                                   <p><label> Mã nhân viên</label> : {{$item->staff_code}}</p> 
                                </div>
                            </div>
                            <div class="col-6 pd-0-mg-0-b-0 validate-form">
                                <div class="form-group  col-12 ">
                                   
                                   <p><label> Tên nhân viên</label> : {{$item->staff_fullname}}</p> 
                                </div>
                            </div>
                            <div class="col-6 pd-0-mg-0-b-0 validate-form">
                                <div class="form-group  col-12 ">
                                   
                                   <p><label> Tên đăng nhập</label> : {{$item->staff_username}}</p> 
                                </div>
                            </div>
                            <div class="col-6 pd-0-mg-0-b-0 validate-form">
                                <div class="form-group  col-12 ">
                                   
                                   <p><label> Email</label> : {{$item->staff_email}}</p> 
                                </div>
                            </div>
                            <div class="col-6 pd-0-mg-0-b-0 validate-form">
                                <div class="form-group  col-12 ">
                                   
                                   <p><label> Tên chức vụ</label> : {{$item->position_name}}</p> 
                                </div>
                            </div>
                            <div class="col-6 pd-0-mg-0-b-0 validate-form">
                                <div class="form-group  col-12 ">
                                   
                                   <p><label> Trạng thái tài khoản</label> : 
                                    @if ($item->staff_status===1)
                                       Hoạt động <i class="pass-icon mdi mdi-check"></i> 
                                    @else
                                        Bị khóa    <i class="fail-icon mdi mdi-close"></i> 
                                    @endif
                                </p> 
                                </div>
                            </div>
                            <div class="col-6 pd-0-mg-0-b-0 validate-form">
                                <div class="form-group  col-12 ">
                                   
                                   <p><label> Mã khôi phục</label> : {{$item->staff_codeRecovery}}</p> 
                                </div>
                            </div>
                            <div class="col-12 pd-0-mg-0-b-0 validate-form">
                                <div class="form-group  col-12 ">
                                   
                                   <p><label>Địa chỉ </label> : {{$item->staff_address}}</p> 
                                </div>
                            </div>
                            <div class="col-12 pd-0-mg-0-b-0 validate-form">
                                <div class="form-group  col-12 ">
                                   
                                   <p><label>Ghi chú </label> :    {!! htmlspecialchars_decode($item->staff_note) !!} </p> 
                                </div>
                            </div>

                    
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
@endsection
