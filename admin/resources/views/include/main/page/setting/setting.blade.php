@extends('admin')
@section('main')
    <div class="content-wrapper">
        <div class="flex_center">
            <div class=" with-form-800  grid-margin stretch-card">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title" style="text-align: center">Danh sách cài đặt</h4>

                        <a href="{{route('pagination.list')}}" class="">Phân trang</a>
                        </div>
                    </div>


                </div>
            </div>
        </div>


    </div>
@endsection
