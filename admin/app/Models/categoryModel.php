<?php


namespace App\Models;
use Illuminate\Support\Facades\DB;
class categoryModel extends indexModel   
{
    protected $table = 'tbl_category'; // Tên bảng mà model này liên kết với
    protected $primaryKey = 'category_id';
    protected $pagination = 'tbl_pagination';
    protected $fillable = ['category_name','category_status'];
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
    public function add($name)
{
    $data = [
        'category_name' => $name,
        'category_status' => 1,
    ];
    $result = $this->createData($data);
    return $result;
  
}
    public function updateCategory($name,$id)
    {
        $data = [
            'category_name' => $name,
        ];
        try {
            $result =$this->edit($data, $id);
            return $result;
        } catch (\Exception $e) {
            return false;
        }
    }
    public function checkDatabase($code,$id=null) {
        $result=$this->checkColum('category_name', $code, $id);
        return $result ;
    }
    public function status_toggle($status,$id){
        $data['category_status']=$status;
        try {
            $result =  $this->toggleStatus($id,$data); 
            return $result; // Trả về true nếu thành công, false nếu thất bại
        } catch (\Exception $e) {
            return $result;
        }
    }
   
 
}
