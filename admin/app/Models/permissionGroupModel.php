<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class permissionGroupModel extends Model
{
    protected $table = 'tbl_permission__group'; // Tên bảng mà model này liên kết với
    protected $primaryKey = 'permission_group_id'; 
      protected $pagination = 'tbl_pagination';  
    public function getPagination(){
        $result=DB::table($this->pagination)->where('pagination_tbl',$this->table);
       return $result;
   }
    public function getDeatil($permission_group_id){
        $result=DB::table($this->table)->where($this->primaryKey,$permission_group_id);   
        return $result;
    }
    public function addpermissionGroup($name,$code,$note)
{
    $data = [
        'permission_group_name' => $name,
        'permission_group_code' => $code,
        'permission_group_note' => $note,
        'permission_group_status' => 1,
    ];

    try {
        $result = DB::table($this->table)->insert($data);
        return $result; // Trả về true nếu thành công, false nếu thất bại
    } catch (\Exception $e) {
        return false;
    }
}
    public function updatepermissionGroup($name,$code,$note,$id)
    {
        $data = [
            'permission_group_name' => $name,
            'permission_group_code' => $code,
            'permission_group_note' => $note,
            'permission_group_status' => 1,
        ];
        try {
            $result = DB::table($this->table)->where($this->primaryKey,$id)->update($data);
            return $result; // Trả về true nếu thành công, false nếu thất bại
        } catch (\Exception $e) {
            return false;
        }
    }
    public function checkDatabase( $code) {
        return DB::table($this->table)
            ->Where('permission_group_code', $code)
            ->exists();
    }
    public function checkDatabaseIs($code, $permission_group_id) {
        return DB::table($this->table)
            ->where('permission_group_code', $code)
            ->where($this->primaryKey, '<>', $permission_group_id)
            ->exists();
    }
    public function status_toggle($status,$permission_group_id){
        $data['permission_group_status']=$status;
        try {
            $result =   DB::table($this->table)->where($this->primaryKey,$permission_group_id)->update($data); 
            return $result; // Trả về true nếu thành công, false nếu thất bại
        } catch (\Exception $e) {
            return false;
        }
    }
}
