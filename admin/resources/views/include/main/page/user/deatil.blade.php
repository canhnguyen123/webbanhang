@extends('admin')
@section('main')
    <div class="content-wrapper">
        <div class="flex_center">
            <div class=" with-form-800  grid-margin stretch-card">
              @foreach ($deatilItem as $item)
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" style="text-align: center">Chi tiết người dùng</h4>
                        <div class="list-item-titel col-12 mg-50">
        
                          <div class="item-icon toggle-search flex_center mg-5 icon-edit bg-violet">
                            <i class="mdi mdi-magnify"></i>
                            <p>Tìm kiếm</p>
                          </div>
                          <div class="item-icon toggle-filter flex_center mg-5 icon-edit bg-violet">
                            <i class="mdi mdi-filter"></i>
                            <p>Lọc</p>
                          </div>
                          <div class="item-icon  flex_center mg-5 icon-edit bg-violet" id="return-user">
                            <i class="mdi mdi-keyboard-return"></i>
                            <p>Quay lại</p>
                          </div>
                          
                          @if ($item->user_status===1)
                          <a onclick="return confirm('Bạn có khóa tải khoản này không ?')" href="{{route('user_toogle_status',['user_id'=>$item->user_id,'user_status'=>1])}}" class="item-icon mg-5 flex_center icon-edit bg-red-blink">
                            <i class="mdi mdi-toggle-switch"></i>
                            <p>Khóa</p>
                          </a>   
                          @else
                          <a onclick="return confirm('Bạn có muốn mở khóa tài khoản này không ?')" href="{{route('user_toogle_status',['user_id'=>$item->user_id,'user_status'=>0])}}" class="item-icon mg-5 flex_center icon-edit bg-yellow-green">
                            <i class="mdi mdi-toggle-switch-off"></i>
                            <p>Mở khóa</p>
                          </a> 
                          @endif
                        </div>
                      
                            <div class="col-12 row">
                                <div class="col-5">
                                    <img class="img-user"
                                        src="
                                   @if ($item->user_linkImg === '') https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/user-sign-icon-person-symbol-human-avatar-isolated-on-white-backogrund-vector.jpg?alt=media&token=e55a5617-e31a-4bd6-86d6-c2a79a2bb8f8&_gl=1*wcu0mv*_ga*MTM1NDI4Mzc3Mi4xNjg2NjU2Nzg4*_ga_CW55HF8NVT*MTY5NjgyMTkyNC4zMS4xLjE2OTY4MjIwNTcuNDkuMC4w
                                  @else
                                  {{ $item->user_linkImg }} @endif
                                  "
                                        alt="">
                                </div>
                                <div class="col-7 row">

                                    <div class="form-group col-12 pd-0-mg-0-b-0 ">
                                        <p> <label> Tên đăng nhập</label>: {{ $item->user_username }}</p>
                                    </div>
                                    <div class="form-group col-12 pd-0-mg-0-b-0 ">
                                        <p> <label> Họ và tên</label>: {{ $item->user_fullname }}</p>
                                    </div>
                                    <div class="form-group col-12 pd-0-mg-0-b-0 ">
                                        <p> <label> Mã người dùng</label>: {{ $item->user_code }}</p>
                                    </div>
                                    <div class="form-group col-12 pd-0-mg-0-b-0 ">
                                        <p> <label> Email</label>: {{ $item->user_email }}</p>
                                    </div>
                                    <div class="form-group col-12 pd-0-mg-0-b-0 ">
                                        <p> <label> Số điện thoại</label>: {{ $item->user_phone }}</p>
                                    </div>
                                    <div class="form-group col-12 pd-0-mg-0-b-0 ">
                                        <p> <label> Địa chỉ</label>: {{ $item->user_address }}</p>
                                    </div>
                                    <div class="form-group col-12 pd-0-mg-0-b-0 ">
                                        <p> <label> Thể loại tài khoản</label>:
                                            @if ($item->user_categoryAccount === 1)
                                                Tài khoản bình thường
                                            @elseif($item->user_categoryAccount === 2)
                                                Tài khoản facebok
                                            @elseif($item->user_categoryAccount === 3)
                                                Tài khoản google
                                            @endif
                                        </p>
                                    </div>
                                    <div class="form-group col-12 pd-0-mg-0-b-0 ">
                                        <p> <label> Số xu</label>: {{ $item->user_money }}</p>
                                    </div>
                                    <div class="form-group col-12 pd-0-mg-0-b-0 ">
                                        <p> <label> Tình trạng</label>:
                                            @if ($item->user_status === 1)
                                                Hoạt động bình thường <i class="pass-icon mdi mdi-check"></i>
                                               
                                            @else
                                                Bị khóa <i class="fail-icon mdi mdi-close"></i>
                                             
                                            @endif
                                        </p>
                                    </div>
                                    <div class="form-group col-12 pd-0-mg-0-b-0 ">
                                        <p> <label> Thời gian tạo</label>: {{ $item->created_at }}</p>
                                    </div>
                                </div>


                            </div>
               
                    </div>
                </div>
                @endforeach
            </div>
        </div>


    </div>
@endsection
