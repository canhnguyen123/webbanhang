<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
class theloaiModel extends indexModel
{
    protected $table = 'tbl_theloai'; // Tên bảng mà model này liên kết với
    protected $primaryKey = 'theloai_id'; // Tên cột khóa chính của bảng
    protected $pagination = 'tbl_pagination';  
    protected $fillable = ['theloai_name','theloai_code','theloai_img','category_id','phanloai_id','theloai_status'];
    public $timestamps = false; // Không sử dụng các trường created_at và updated_at
    public function __construct()
    {
        parent::__construct();
        $this->setTableName($this->table);
        $this->setPrimaryKey($this->primaryKey);
    }

    public function getTheLoai(){
        $result =DB::table('tbl_theloai')
        ->join('tbl_category', 'tbl_theloai.category_id', '=', 'tbl_category.category_id')
        ->join('tbl_phanloai', 'tbl_theloai.phanloai_id', '=', 'tbl_phanloai.phanloai_id')
        ->select('tbl_theloai.*', 'tbl_category.category_name', 'tbl_phanloai.phanloai_name');
        return $result;
    }
    public function getJoinTheLoai($table,$joinId){
        $result =DB::table($table)
        ->join('tbl_theloai', $joinId, '=', 'tbl_theloai.theloai_id')
        ->join('tbl_category', 'tbl_theloai.category_id', '=', 'tbl_category.category_id')
        ->join('tbl_phanloai', 'tbl_theloai.phanloai_id', '=', 'tbl_phanloai.phanloai_id')
        ->select('tbl_theloai.*', 'tbl_phanloai.phanloai_name', 'tbl_category.category_name');
        return $result;
    }
    public function getDeatil($id)
    {
        $result=$this->getTheLoai()->where('tbl_theloai.theloai_id', $id)->first();
        return $result;
    }
    
    public function getPagination(){
        $result=DB::table($this->pagination)->where('pagination_tbl',$this->table);
       return $result;
   }
    public function getListTable($setTable,$setcolumstatus){
        $result=DB::table($setTable)->where($setcolumstatus,1)->get();
        return $result;
    }
    public function showHome($status){
        $result= $this->getJoinTheLoai('tbl_theloaishowhome','tbl_theloaishowhome.theloai_id')
        ->where('tbl_theloaishowhome.theloaiShowHome_status',$status)
        ->get();
        return $result;
    }
    public function checkedHome($status){
        $result=$this->getJoinTheLoai('tbl_theloaichecked','tbl_theloaichecked.theloai_id')
        ->where('tbl_theloaichecked.theloaichecked_status',$status)
        ->get();
        return $result;
    }
  
    public function add($nametheloai, $theloaiCode ,$category_id ,$phanloai_id ,$linkImg)
{
    $data = [
        'theloai_name' => $nametheloai,
        'theloai_code' => $theloaiCode,
        'category_id' => $category_id,
        'phanloai_id' => $phanloai_id,
        'theloai_img' => $linkImg,
        'theloai_status' => 1,
    ];
    $result = $this->createData($data);
    return $result;
}
   
    public function updatetheloai($nametheloai, $theloaiCode ,$category_id ,$phanloai_id ,$linkImg,$theloai_id)
    {
        $data = [
            'theloai_name' => $nametheloai,
            'theloai_code' => $theloaiCode,
            'category_id' => $category_id,
            'phanloai_id' => $phanloai_id,
            'theloai_img' => $linkImg,
        ];
    
        try {
            $result =$this->edit($data,$theloai_id);
            return $result; 
        } catch (\Exception $e) {
            return false;
        }
    }
    public function checkDatabase($code,$id=null) {
        $result=$this->checkColum('theloai_code', $code, $id);
        return $result ;
    }
    public function status_toggle($status,$id){
        $data['theloai_status']=$status;
        $result=$this->toggleStatus($id,$data);
        return $result;
    }
   
    public function updateShowHome($listTheLoai)
    {
       $result= $this->creactAupdateTheLoai($listTheLoai, 'tbl_theloaishowhome', 'theloai_id', 'theloaiShowHome_status');
        return $result;
    }
    public function updateCheckHome($listTheLoai)
    {
        $result= $this->creactAupdateTheLoai($listTheLoai, 'tbl_theloaichecked', 'theloai_id', 'theloaichecked_status');
        return $result;

    }
}
