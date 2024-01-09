<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class todolistModel extends indexModel
{
    protected $table = 'tbl_todolist'; // Tên bảng mà model này liên kết với
    protected $primaryKey = 'todolist_id';
    protected $pagination = 'tbl_pagination';
    protected $fillable = ['staff_id','todolist_name','todolist_status','created_at','updated_at'];
    public $timestamps = true; 
    public function __construct()
    {
        parent::__construct();
        $this->setTableName($this->table);
        $this->setPrimaryKey($this->primaryKey);
    }
    public function staff()
    {
        return $this->belongsTo(staffModel::class, 'staff_id', 'staff_id');
    }
   public function getPagination(){
        $result=DB::table($this->pagination)->where('pagination_tbl',$this->table);
       return $result;
   }
   public function getDeatil($id){
        $result=$this->getDeatilId($id);
       return $result;
   }
    public function add($name,$staff_id,$dealine)
{
    $data = [
        'staff_id' => $staff_id,
        'todolist_name' => $name,
        'todolist_status' => 0,
        'created_at' => Carbon::now(),
        'updated_at' => $dealine,
    ];
    $result = $this->createData($data);
    return $result;
  
}
    public function updateDB($name,$staff_id,$dealine,$id)
    {
        $data = [
            'staff_id' => $staff_id,
            'todolist_name' => $name,
            'updated_at' => $dealine,
        ];
        $result = $this->edit($data,$id);
        return $result;
    }
    public function status_toggle($status,$id){
        $data['todolist_status']=$status;
        try {
            $result =  $this->toggleStatus($id,$data); 
            return $result; // Trả về true nếu thành công, false nếu thất bại
        } catch (\Exception $e) {
            return $result;
        }
    }
   
}
