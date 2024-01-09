@extends('admin')
@section('main')
    <div class="content-wrapper">
        <div class="flex_center">
            <div class=" with-form-100w grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" style="text-align: center">Cập nhật</h4>
                        <form class="forms-sample row" action="{{ route('todolist.put.update',['todolist_id'=>$getItem->todolist_id]) }}" method="POST">
                            @csrf
                            @method('put')
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
                                            <option value="{{$getItem->staff_id}}">{{$getItem->staff->staff_fullname}}</option>
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
                                            class="form-control flatpickr"
                                            value="{{$getItem->updated_at}}"
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
                                    <textarea name="name"  class="editor"  cols="30" rows="10">{{$getItem->todolist_name}}</textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn-pimar-key mr-2">Cập nhật</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
