@extends('admin')
@section('main')
    <div class="content-wrapper">
        <div class="flex_center">
           <div class=" with-form-800  grid-margin stretch-card">
                <div class="card">
                    <div class="card-body row">
                        <h4 class="card-title" style="text-align: center">Chi tiết bài viết</h4>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <img src="{{$item_blog->blog_img}}" class="img-blog" alt="">
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 row">
                                <div class="col-12">
                                    <p><label> Mã bài viết</label> : {{$item_blog->blog_code}}</p>
                                 </div>
                                 <div class="col-12">
                                    <p><label> Tên bài viết</label> : {{$item_blog->blog_name}}</p>
                                 </div>
                                 <div class="col-12">
                                    <p><label> Tiêu đề bài viết</label> : {{$item_blog->blog_titel}}</p>
                                 </div>
                                 <div class="col-12">
                                    <p><label> Tên tác giả</label> : {{$item_blog->blog_author}}</p>
                                 </div>
                                 <div class="col-12">
                                    <p><label> Thời gian thêm</label> : {{$item_blog->created_at}}</p>
                                 </div>
                                 <div class="col-12">
                                    <p><label> Thời gian cập nhật gần nhất : </label> {{$item_blog->updated_at!==null?$item_blog->updated_at:"Chưa cập nhật"}}</p>
                                 </div>
                                 <div class="col-12">
                                    <a style="color: blald" href="{{route('deatil_staff',['staff_id'=>$item_blog->staff_id])}}"><label> Nhân viên đăng bài : </label> {{$item_blog->staff->staff_fullname}}</a>
                                </div>
                            </div>
                           

                            <div class="form-group col-xl-12 col-sm-12" style="margin-top: 20px">
                                <label>Nội dung</label><br>
                                <p>  
                                    {!! htmlspecialchars_decode($item_blog->blog_text) !!}</p>
                            </div>
                            
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
