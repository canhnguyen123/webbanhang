@extends('admin')
@section('main')
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="list-item-titel">
        <a href="{{route('banner_add')}}" class="item-icon flex_center mg-5 icon-edit bg-violet">
          <i class="mdi mdi-plus"></i>
          <p>Thêm</p>
        </a>
  
      </div>
    </div>
</div>
<div class="row ">
 
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <p class="card-title flex_center"> Danh sách banner</p>
                <div class="row">
                  <div class="col-12">
                    <div class="table-responsive">
                      <table id="example" class="display expandable-table" style="width:100%">
                        <thead>
                          <tr>
                            <th colspan="1">STT</th>
                            <th colspan="3">Tên</th>
                            <th colspan="1" style="text-align: center">Trạng thái</th>
                            <th colspan="3" style="text-align: center">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody id="list-banner">
                          @foreach ($list_banner as $item)
                          <tr>
                            <td colspan="1">{{$i++}}</td>
                            <td colspan="3">
                              <img class="img-tbl zoomable-image myImage" 
                                src="{{$item->banner_link}}" >
                                    {{$item->banner_name}}
                          </td>                        
                            <td colspan="1" style="text-align: center">
                              @if ($item->banner_status===1)
                              <i class="pass-icon mdi mdi-check"></i> 
                              @else
                              <i class="fail-icon mdi mdi-close"></i> 
                              @endif
                              </td>
                           
                            <td colspan="3" class="flex_center">
                                <div class="list-icon flex_center">
                                  <a href="{{route('banner_update',['banner_id'=>$item->banner_id])}}" class="item-icon mg-5 flex_center icon-edit bg-yellow-og">
                                    <i class="mdi mdi-lead-pencil"></i>
                                    <p>Cập nhật</p>
                                  </a>  
                                  <a href="{{route('banner_delete',['banner_id'=>$item->banner_id])}}" onclick="confirm('Bạn có muốn xóa không ?')" class="item-icon mg-5 flex_center icon-edit bg-green-o">
                                    <i class="mdi mdi-delete "></i>
                                    <p>Xóa</p>
                                  </a>  
                                  @if ($item->banner_status===1)
                                  <a onclick="confirm('Bạn có muốn ẩn không ?')" href="{{route('banner_toogle_status',['banner_id'=>$item->banner_id,'banner_status'=>1])}}" class="item-icon mg-5 flex_center icon-edit bg-red-blink">
                                    <i class="mdi mdi-toggle-switch"></i>
                                    <p>Ẩn</p>
                                  </a>   
                                  @else
                                  <a onclick="confirm('Bạn có muốn hiện không ?')" href="{{route('banner_toogle_status',['banner_id'=>$item->banner_id,'banner_status'=>0])}}" class="item-icon mg-5 flex_center icon-edit bg-yellow-green">
                                    <i class="mdi mdi-toggle-switch-off"></i>
                                    <p>Hiện</p>
                                  </a> 
                                  @endif
                                 
                                 
                                </div>
                            </td>
                          </tr>
                          @endforeach
                          
                        </tbody>
                        @if ($category===0)
                        @include('ohther.pagination.pagination', [
                          'paginator' => $list_banner,'nameElement'=>$nameElement
                        ])
                      @endif
                      </table>
                           <div class="modal myModal">
                            <span class="close">&times;</span>
                            <img class="modal-content imgBig">
                          </div>
                    </div>
                  </div>
                  @if ($check===1&&$category===1)
                    @include('ohther.pagination.loadmore', ['pagination_nameElement' => $nameElement,'id'=>$list_banner->last()->banner_id-1,'i'=>$i])
                  @endif
                 
                </div>
                </div>
              </div>
              
              
            </div>
        </div>
    </div>

  </div>
</div>
@endsection
