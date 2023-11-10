@extends('admin')
@section('main')
    <div class="content-wrapper">
        <div class="flex_center">
            <div class=" with-form-800  grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" style="text-align: center">Cập nhật trạng thái hóa đơn</h4>
                        @foreach ($item_statusPayment as $item)
                        <form class="forms-sample row" action="{{ route('statusPayment_post_update',['statusPayment_id'=>$item->statusPayment_id]) }}" method="post">
                          @csrf
                         @method('put')
                          @if ($errors->any())
                              <div class="alert col-12 alert-danger text-center">
                                  <span>Có lỗi xảy ra vui lòng kiểm tra lại dữ liệu</span>
                              </div>
                          @endif
                          @if (session('errorMessage'))
                              <div class="col-12 alert alert-danger">
                                  {{ session('errorMessage') }}
                              </div>
                          @endif
                          <div class="form-group form-input col-6">
                              <i class="mdi mdi-rename-box"></i>
                              <input type="text" name="namestatusPayment" class="form-control"
                                  value="{{ ($item->statusPayment_name) }}" required>
                              <label> Tên trạng thái hóa đơn</label>
                          </div>
                          <div class="form-group form-input col-6">
                              <i class="mdi mdi-codepen"></i>
                              <input type="text" name="codestatusPayment" class="form-control"
                              value="{{ ($item->statusPayment_code) }}"required>
                              <label> Mã trạng thái hóa đơn</label>
                          </div>
                          <div class="col-6 err">
                              <span>
                                  @error('namestatusPayment')
                                      {{ $message }}
                                  @enderror
                              </span>
                          </div>
                          <div class="col-6 err">
                              <span>
                                  @error('codestatusPayment')
                                      {{ $message }}
                                  @enderror

                              </span>
                          </div>
                          <div class="form-group col-12">
                              <label>Ghi chú</label>
                              <textarea name="notestatusPayment" class="editor" cols="30" rows="10">{{ $item->statusPayment_note }} </textarea>
                          </div>
                          <button type="submit" class=" btn-pimar-key mr-2">Cập nhật</button>
                      </form>
                        @endforeach
                       
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
