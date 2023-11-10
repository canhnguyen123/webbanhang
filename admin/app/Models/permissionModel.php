<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class permissionModel extends Model
{
    protected $table = 'tbl_permission'; // Tên bảng mà model này liên kết với
    protected $primaryKey = 'permission_id';
     protected $pagination = 'tbl_pagination';  
    public function getPagination(){
        $result=DB::table($this->pagination)->where('pagination_tbl',$this->table);
       return $result;
   }
    public function getDeatil($permission_id){
        $result=DB::table($this->table)
        ->join('tbl_permission__group','tbl_permission.permission_group_id','=','tbl_permission__group.permission_group_id')
        ->select('tbl_permission.*','tbl_permission__group.permission_group_name')
        ->where('tbl_permission.permission_id',$permission_id);   
        return $result;
    }
    public function getTable(){
        $result=DB::table('tbl_permission__group')->where('permission_group_status',1)->get();   
        return $result;
    }
    public function addpermission($name,$code,$router,$GroupId,$note)
{
    $data = [
        'permission_name' => $name,
        'permission_code' => $code,
        'permission_group_id' => $GroupId,
        'permission_router' => $router,
        'permission_note' => $note,
        'permission_status' => 1,
    ];

    try {
        $result = DB::table($this->table)->insert($data);
        return $result; // Trả về true nếu thành công, false nếu thất bại
    } catch (\Exception $e) {
        return false;
    }
}
public function updatepermission($name,$code,$router,$GroupId,$note,$permission_id)
{
    $data = [
        'permission_name' => $name,
        'permission_code' => $code,
        'permission_group_id' => $GroupId,
        'permission_router' => $router,
        'permission_note' => $note,
    ];

    try {
        $result = DB::table($this->table)->where($this->primaryKey,$permission_id)->update($data);
        return $result;
    } catch (\Exception $e) {
        return false;
    }
}
    public function checkDatabase($code) {
        return DB::table($this->table)
            ->Where('permission_code', $code)
            ->exists();
    }
    public function checkDatabaseIs($code, $permission_id) {
        return DB::table($this->table)
            ->where('permission_code', $code)
            ->where($this->primaryKey, '<>', $permission_id)
            ->exists();
    }
    public function status_toggle($status,$permission_id){
        $data['permission_status']=$status;
        try {
            $result =   DB::table($this->table)->where($this->primaryKey,$permission_id)->update($data); 
            return $result; // Trả về true nếu thành công, false nếu thất bại
        } catch (\Exception $e) {
            return false;
        }
    }
}
