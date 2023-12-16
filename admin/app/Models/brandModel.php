<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;

class brandModel extends indexModel
{
    protected $table = 'tbl_brand'; // Tên bảng mà model này liên kết với
    protected $primaryKey = 'brand_id'; // Tên cột khóa chính của bảng
    protected $pagination = 'tbl_pagination';  
    protected $fillable = ['brand_name','brand_code','brand_status'];
    public $timestamps = false; // Không sử dụng các trường created_at và updated_at
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
        $result=$this->getDeatilId($id);
       return $result;
   }
    public function add($name,$code)
{
    $data = [
        'brand_name' => $name,
        'brand_code' => $code,
        'brand_status' => 1,
    ];
    $result = $this->createData($data);
    return $result;
  
}
    public function updateId($name,$code,$id)
    {
        $data = [
            'brand_name' => $name,
            'brand_code' => $code,
        ];
        try {
            $result =$this->edit($data, $id);
            return $result;
        } catch (\Exception $e) {
            return false;
        }
    }
    public function checkDatabase($code,$id=null) {
        $result=$this->checkColum('brand_code', $code, $id);
        return $result ;
    }
    public function status_toggle($status,$id){
        $data['brand_status']=$status;
        try {
            $result =  $this->toggleStatus($id,$data); 
            return $result; // Trả về true nếu thành công, false nếu thất bại
        } catch (\Exception $e) {
            return $result;
        }
    }
}
