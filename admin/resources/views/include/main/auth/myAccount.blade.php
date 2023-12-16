@extends('admin')
@section('main')
<div class="content-wrapper">
  <div class="flex_center">
    <div class=" with-form-800  grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title" style="text-align: center">Thông tin tài khoản</h4>
            <div class="row">
                @foreach ($infroDeatil as $itemAcount)
                    <div class="form-group  col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <p> <label>Tên tài khoản</label> : {{$itemAcount->staff_fullname}} </p>
                    </div>
                    <div class="form-group  col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <p> <label>Chức vụ</label> : {{$itemAcount->position_name}} </p>
                    </div>
                    <div class="form-group  col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <p> <label>Mã tài khoản</label> : {{$itemAcount->staff_code}} </p>
                    </div>
                    <div class="form-group  col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <p> <label>Tên đăng nhập</label> : {{$itemAcount->staff_username}} </p>
                    </div>
                    <div class="form-group  col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <p> <label>Email</label> : {{$itemAcount->staff_email}} </p>
                    </div>
                    <div class="form-group  col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <p> <label>Điện thoại</label> : {{$itemAcount->staff_phone}} </p>
                    </div>
                    <div class="form-group  col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <p> <label>Mã khôi phục</label> : {{$itemAcount->staff_codeRecovery}} </p>
                    </div>
                    <div class="form-group  col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <p> <label>Trạng thái</label> : {{$itemAcount->staff_status===1?"Đang hoạt động":"Bị Khóa"}} </p>
                    </div>
                    <div class="form-group  col-12">
                        <p> <label>Địa chỉ</label> : {{$itemAcount->staff_address}} </p>
                    </div>
                    <div class="form-group col-12">
                        <p> <label>Ghi chú</label> : {!! htmlspecialchars_decode($itemAcount->staff_note) !!}  </p>
                    </div>
                @endforeach
                
            </div>
              <div class="row">
                <table id="example" class="display expandable-table" style="width:100%">
                    <thead>
                        <tr>
                            <th colspan="1">STT</th>
                            <th colspan="3">Tên quyền</th>
                            <th colspan="3">Nhóm quyền</th>
                        </tr>
                    </thead>
                    <tbody id="list-product">
                        @foreach ($getMypemisstion as $key=> $item)
                        <tr>
                            <td colspan="1">{{$key+1}}</td>
                            <td colspan="3">{{$item->permission_name}}</td>
                            <td colspan="3">{{$item->permission_group_name}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
              </div>
          </div>
        </div>
      </div>
    </div>

  
</div>
@endsection
