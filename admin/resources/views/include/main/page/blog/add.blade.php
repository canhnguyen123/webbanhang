@extends('admin')
@section('main')
    <div class="content-wrapper">
        <div class="flex_center">
           <div class=" with-form-800  grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" style="text-align: center">Thêm mới bài viết</h4>
                        <form class="forms-sample row">
                            <div class="form-group form-input col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="col-12">
                                    <i class="mdi mdi-rename-box"></i>
                                    <input type="text" class="form-control code-blog" required>
                                    <label> Mã bài viết</label>

                                </div>
                                <div class="col-12 err">
                                    <span class="err-text-codeBlog"></span>
                                </div>
                            </div>
                            <div class="form-group form-input col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="col-12">
                                    <input type="file" id="img-blog" class="form-control img-blog" required>
                                </div>
                                <div class="col-12 err">
                                    <span>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group form-input col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="col-12">
                                    <i class="mdi mdi-rename-box"></i>
                                    <input type="text" class="form-control author-blog" required>
                                    <label> Tên tác giả</label>

                                </div>
                                <div class="col-12 err">
                                    <span class="err-text-authorBlog"></span>
                                </div>
                            </div>
                            <div class="form-group form-input col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="col-12">
                                    <i class="mdi mdi-rename-box"></i>
                                    <input type="text" class="form-control name-blog" required>
                                    <label> Tên bài viết</label>

                                </div>
                                <div class="col-12 err">
                                    <span class="err-text-nameBlog"></span>
                                </div>
                            </div>
                            <div class="form-group form-input col-12">
                                <div class="col-12">
                                    <i class="mdi mdi-rename-box"></i>
                                    <input type="text" class="form-control titel-blog" required>
                                    <label>Tiêu đề</label>

                                </div>
                                <div class="col-12 err">
                                    <span class="err-text-titelBlog">
                                    </span>
                                </div>
                            </div>
                            <div class="form-group col-xl-12 col-sm-12">
                                <label>Nội dung</label>
                                <textarea class="editor blog-content" id="blogContent" cols="30" rows="10" style="height: 500px"></textarea>
                            </div>
                            <button type="submit" class=" btn-pimar-key mr-2 btn-add-blog"
                                style="width: 200px;">Thêm</button>



                        </form>

                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
