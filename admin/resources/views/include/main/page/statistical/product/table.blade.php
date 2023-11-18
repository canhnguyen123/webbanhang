@extends('include.main.page.statistical.statistical')
@section('statistical')
    <div class="statistical-content">
        <p class="card-title flex_center">Sản phẩm đã bán</p>
    <div class="small-titel pg-50">
        <span>Đã bán được {{$countProductSoid}}/{{$countProductAll}} sản phẩm </span>
      </div>
      <div class="row col-12">
     
        <table id="example" class="display expandable-table" style="width:100%">
          <thead>
            <tr>
              <th scope="col" style="text-align: center">STT</th>
              <th scope="col" >Tên sản phẩm</th>
              <th scope="col" style="text-align: center">Số lượt bán</th>
              <th scope="col" style="text-align: center">Tổng số lượng bán</th>
              <th colspan="3" style="text-align: center">Thao tác</th>
              </tr>
          </thead>
          <tbody id="list-productSoid">
            @foreach ($list_productSoid as $item)
            <tr>
              <th style="text-align: center">{{$i++}}</th>
              <td>
                <a href="{{route('product_deatil',['product_id'=>$item->product_id])}}">
                  {{$item->product_name}}
                </a>
              </td>
              <td style="text-align: center">{{$item->product_count}}</td>
              <td style="text-align: center">{{$item->total_quantity}}</td>
              <td>  
                <div class="flex_center w-150">
                  <a href="{{route('statistical.product.deatil',['product_id'=>$item->product_id])}}" class="item-icon mg-5 flex_center icon-edit bg-yellow-og">
                    <i class="mdi mdi-eye"></i>
                    <p>Xem chi tiết</p>
                  </a>
                </div>
                 
             </td>
            </tr>
            @endforeach
            
          </tbody>
        </table>
      </div>
      <div class="row col-12">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <p class="card-title">Order Details</p>
              <p class="font-weight-500">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page or app, etc</p>
              <div class="d-flex flex-wrap mb-5">
                <div class="mr-5 mt-3">
                  <p class="text-muted">Order value</p>
                  <h3 class="text-primary fs-30 font-weight-medium">12.3k</h3>
                </div>
                <div class="mr-5 mt-3">
                  <p class="text-muted">Orders</p>
                  <h3 class="text-primary fs-30 font-weight-medium">14k</h3>
                </div>
                <div class="mr-5 mt-3">
                  <p class="text-muted">Users</p>
                  <h3 class="text-primary fs-30 font-weight-medium">71.56%</h3>
                </div>
                <div class="mt-3">
                  <p class="text-muted">Downloads</p>
                  <h3 class="text-primary fs-30 font-weight-medium">34040</h3>
                </div> 
              </div>
              <canvas id="order-chart"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
    
@endsection
