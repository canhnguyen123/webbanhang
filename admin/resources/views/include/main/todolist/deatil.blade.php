@extends('admin')
@section('main')
    <div class="content-wrapper">
        <div class="flex_center">
            <div class=" with-form-100w grid-margin stretch-card">
                <div class="card">
                    
                    <div class="card-body">
                        <h4 class="card-title" style="text-align: center">Chi tiết việc đã giao</h4>
                        <div class="col-12 row">
                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 pd-0-mg-0-b-0">
                                <div class="form-group  ">
                                    <p><label for="">Người nhận việc :</label>{{$getItem->staff->staff_fullname}}</p>   
                               </div>
                            </div>
                            
                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 pd-0-mg-0-b-0">
                                <div class="form-group ">
                                    <p><label for="">Người nhận việc :</label>
                                        @if ($getItem->todolist_status===1)
                                            Đã hoàn thành
                                        @else
                                            Chưa hoàn thành
                                        @endif
                                    </p>   
                               </div>
                            </div>

                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 pd-0-mg-0-b-0">
                                <div class="form-group ">
                                   <p><label for=""> Thời gian giao việc : </label> {{$getItem->created_at}}</p>  
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 pd-0-mg-0-b-0">
                                <div class="form-group">
                                   <p><label for=""> Thời hạn hoàn thành : </label> {{$getItem->updated_at}}</p>  
                                </div>
                            </div>
                            <div class="col-12 form-group" >
                                <label for="">Việc cần  làm :</label><br>
                                {!! htmlspecialchars_decode($getItem->todolist_name) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
