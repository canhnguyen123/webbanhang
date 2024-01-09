<?php

namespace App\Models;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
class blogModel extends indexModel
{
    protected $table = 'tbl_blog'; // Tên bảng mà model này liên kết với
    protected $primaryKey = 'blog_id';
    protected $pagination = 'tbl_pagination';
    public function staff()
    {
        return $this->belongsTo(staffModel::class, 'staff_id', 'staff_id');
    }
    
    protected $fillable = [
        'staff_id',
        'blog_titel',
        'blog_code',
        'blog_img',
        'blog_text',
        'blog_status',
        'blog_name',
        'blog_author',
        'created_at',
        'updated_at'];
        public function __construct()
        {
            parent::__construct();
            $this->setTableName($this->table);
            $this->setPrimaryKey($this->primaryKey);
        }

   public function getPagination(){
        $result=DB::table($this->pagination)->where('pagination_tbl',$this->table);
       return $result;
   }
   public function getDeatil($id){
    $result = $this->with(['staff' => function ($query) {
        $query->select('staff_id', 'staff_fullname');
    }])->find($id);

    Log::debug($result->staff);

    return $result;
}


    public function add($code,$titel,$linkImg,$content,$name,$author)
{
    $data = [
        'staff_id' => Auth::id(),
        'blog_titel' => $titel,
        'blog_code' => $code,
        'blog_name' => $name,
        'blog_author' => $author,
        'blog_img' => $linkImg,
        'blog_text' => $content,
        'blog_status' => 1,
        'created_at' => Carbon::now(),
    ];
    $result = $this->createData($data);
    return $result;
  
}
    public function updateId($code,$titel,$linkImg,$content,$name,$author,$id)
    {
        $data = [
            'blog_titel' => $titel,
            'blog_code' => $code,
            'blog_name' => $name,
            'blog_author' => $author,
            'blog_img' => $linkImg,
            'blog_text' => $content,
            'updated_at' => Carbon::now(),
        ];
        Log::error($data);
        $result = $this->edit($data,$id);
        return $result;
    }
    public function checkDatabase($code,$id=null) {
        $result=$this->checkColum('blog_code', $code, $id);
        return $result ;
    }
    public function status_toggle($status,$id){
        $data['blog_status']=$status;
        try {
            $result =  $this->toggleStatus($id,$data); 
            return $result; // Trả về true nếu thành công, false nếu thất bại
        } catch (\Exception $e) {
            return $result;
        }
    }
   
 
}
