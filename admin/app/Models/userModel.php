<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class userModel extends Model
{
    protected $table = 'tbl_user'; // Tên bảng mà model này liên kết với
    protected $primaryKey = 'user_id'; // Tên cột khóa chính của bảng
    protected $pagination = 'tbl_pagination';  
    public function getPagination(){
        $result=DB::table($this->pagination)->where('pagination_tbl',$this->table);
       return $result;
   }
    public function deatil($user_id){
     $result=   DB::table('tbl_user')->where('user_id',$user_id);
        return $result;
    }
    public function checkDatabase( $code) {
        return DB::table($this->table)
            ->Where('user_code', $code)
            ->exists();
    }
    public function checkDatabaseIs($code, $user_id) {
        return DB::table($this->table)
            ->where('user_code', $code)
            ->where('user_id', '<>', $user_id)
            ->exists();
    }
    public function status_toggle($status,$user_id){
        $data['user_status']=$status;
        try {
            $result =   DB::table($this->table)->where('user_id',$user_id)->update($data); 
            return $result; // Trả về true nếu thành công, false nếu thất bại
        } catch (\Exception $e) {
            return false;
        }
    }
}
