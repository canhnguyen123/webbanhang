<?php

namespace App\Http\Controllers;
use App\Http\Requests\blogRequest;
use App\Models\blogModel;
class blogController extends Controller
{
    private $blogModel;

    public function __construct(blogModel $blogModel)
    {
        $this->blogModel = $blogModel;
    }
    public function list(){
            $blogModel = new blogModel();
            $paginate = $blogModel->getPagination()->first(); 
            $list_blog = $blogModel->paginate($paginate->pagination_limitDeaful); 
            $check = $list_blog->hasMorePages() ? 1 : 0;
            $blog=$paginate->pagination_category;
            $nameElement=$paginate->pagination_nameElement;
            $i = 1;
            return view('include.main.page.blog.lits', compact('list_blog', 'i', 'check','blog','nameElement'));
        }
    public function add(){
        return view('include.main.page.blog.add');
    }
    public function post_add(blogRequest $request){
        $code=$request->code;
        $titel=$request->titel;
        $linkImg=$request->linkImg;
        $content=$request->content;
        $name=$request->name;
        $author=$request->author;
        $check=$this->blogModel->checkDatabase($code);
        if($check){
            return response()->json([
                'status'=>'fail',
                'message' => 'Mã bài viết đã tồn tại'
            ]); 
        }else{
            $add= $this->blogModel->add($code,$titel,$linkImg,$content,$name,$author);
            if($add){
                return response()->json([
                    'status'=>'success',
                    'message' => 'Thêm thành công',
                    'redirect' => route('blog.list')
                ]);
            }
            else{
                return response()->json([
                    'status'=>'fail',
                    'message' => 'Thêm tất bại',
                ]);
            }
        }
      
    }
    public function update($id){
        $item_blog =$this->blogModel->getDeatil($id);
        return view('include.main.page.blog.update',compact('item_blog'));
    }
    public function deatil($id){
        $item_blog =$this->blogModel->getDeatil($id);
        return view('include.main.page.blog.deatil',compact('item_blog'));
    }
    
    public function post_update(blogRequest $request,$id){
        $code=$request->code;
        $titel=$request->titel;
        $linkImg=$request->linkImg;
        $content=$request->content;
        $name=$request->name;
        $author=$request->author;
        $check=$this->blogModel->checkDatabase($code,$id);
        if($check){
            return response()->json([
                'status'=>'fail',
                'message' => 'Mã bài viết đã tồn tại'
            ]); 
        }else{
            $updateId= $this->blogModel->updateId($code,$titel,$linkImg,$content,$name,$author,$id);
            if($updateId){
                return response()->json([
                    'status'=>'success',
                    'message' => 'Cập nhật thành công',
                    'redirect' => route('blog.list')
                ]);
            }
            else{
                return response()->json([
                    'status'=>'fail',
                    'message' => 'Cập nhật tất bại',
                ]);
            }
        }
    }
    public function toogle_status($id){
        $getStatus=$this->blogModel->getDeatil($id);
        
        $getStatus_now=$getStatus->blog_status;
        if($getStatus_now===1){
            $status=0;
        }else{
            $status=1;
        }
        $result = $this->blogModel->status_toggle($status,$id);
        $message = ($result) ? 'Cập nhật thành công' : 'Cập nhật thất bại';
    
        return "<script> alert('$message'); window.location.href = '" . route('blog.list') . "';</script>";
 
       }
  
}
