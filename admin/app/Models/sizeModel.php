<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sizeModel extends indexModel
{
    protected $table = 'tbl_size'; // Tên bảng mà model này liên kết với
    protected $primaryKey = 'size_id'; // Tên cột khóa chính của bảng
    protected $pagination = 'tbl_pagination';  
    protected $fillable = ['size_name','size_note','size_status'];
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
    public function addsize($name,$mota)
{
    $data = [
        'size_name' => $name,
        'size_note' => $mota,
        'size_status' => 1,
    ];
    $result = $this->createData($data);
    return $result;
  
}
    public function updateId($name,$note,$id)
    {
        $data = [
            'size_name' => $name,
            'size_note' => $note,
        ];
        try {
            $result =$this->edit($data, $id);
            return $result;
        } catch (\Exception $e) {
            return false;
        }
    }
    public function checkDatabase($code,$id=null) {
        $result=$this->checkColum('size_name', $code, $id);
        return $result ;
    }
    public function status_toggle($status,$id){
        $data['size_status']=$status;
        try {
            $result =  $this->toggleStatus($id,$data); 
            return $result; // Trả về true nếu thành công, false nếu thất bại
        } catch (\Exception $e) {
            return $result;
        }
    }
}
