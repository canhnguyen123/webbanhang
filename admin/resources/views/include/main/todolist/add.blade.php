@extends('admin')
@section('main')
    <div class="content-wrapper">
        <div class="flex_center">
            <div class=" with-form-100w grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" style="text-align: center">Giao việc</h4>
                        <form class="forms-sample row" action="{{ route('todo.list.add.post') }}" method="POST">
                            @csrf
                            @if ($errors->any())
                            <div class="alert col-12 alert-danger text-center">
                                <span>Có lỗi xảy ra vui lòng kiểm tra lại dữ liệu</span>
                            </div>
                         @endif
                         @if(session('errorMessage'))
                            <div class="col-12 alert alert-danger">
                                {{ session('errorMessage') }}
                            </div>
                        @endif
                            <div class="col-12 row">

                                <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 pd-0-mg-0-b-0 validate-form">
                                    <div class="form-group form-input col-12 ">
                                        <select class="form-select" name="staff_id" style="height: 46px;">
                                            <option selected disabled>Chọn nhân viên</option>
                                            @foreach ($getStaff as $item)
                                               <option value="{{$item->staff_id}}">{{$item->staff_fullname}}</option>
                                            @endforeach
                                            
                                          </select>
                                    </div>
                                    <div class="col-12 err"><span class="err-text">
                                            @error('voucher_name')
                                                {{ $message }}
                                            @enderror
                                        </span></div>
                                </div>
                                <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 pd-0-mg-0-b-0 validate-form">
                                    <div class="form-group form-input col-12">
                                        <i class="mdi mdi-calendar-text"></i>
                                        <input type="text" name="dealine"
                                            class="form-control product_code uppercaseInput flatpickr"
                                            placeholder="Thời hạn" required>
                                    </div>
                                    <div class="col-12 err"><span class="err-text">
                                            @error('voucher_endTime')
                                                {{ $message }}
                                            @enderror
                                        </span></div>
                                </div>
                                <div class="col-12" >
                                    <label for="">Việc cần  làm</label>
                                    <textarea name="name" id="dacdiem_product" class="editor dacdiem_product" cols="30" rows="10"> </textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn-pimar-key mr-2">Giao việc</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
