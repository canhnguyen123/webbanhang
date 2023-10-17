<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class positionModel extends Model
{
    protected $table = 'tbl_position'; // Tên bảng mà model này liên kết với
    protected $primaryKey = 'position_id'; // Tên cột khóa chính của bảng
    public $timestamps = false; // Không sử dụng các trường created_at và updated_at

    // Định nghĩa các trường cho bảng và các quan hệ nếu cần

    public function addposition($name, $code)
{
    $data = [
        'position_name' => $name,
        'position_code' => $code,
        'position_status' => 1,
    ];

    try {
        $result = DB::table($this->table)->insert($data);
        return $result; // Trả về true nếu thành công, false nếu thất bại
    } catch (\Exception $e) {
        return false;
    }
}
    public function updateposition($name, $code,$position_id)
    {
        $data = [
            'position_name' => $name,
            'position_code' => $code,
        ];
        try {
            $result = DB::table($this->table)->where('position_id',$position_id)->update($data);
            return $result; // Trả về true nếu thành công, false nếu thất bại
        } catch (\Exception $e) {
            return false;
        }
    }
    public function checkDatabase( $code) {
        return DB::table($this->table)
            ->Where('position_code', $code)
            ->exists();
    }
    public function checkDatabaseIs($code, $position_id) {
        return DB::table($this->table)
            ->where('position_code', $code)
            ->where('position_id', '<>', $position_id)
            ->exists();
    }
    public function status_toggle($status,$position_id){
        $data['position_status']=$status;
        try {
            $result =   DB::table($this->table)->where('position_id',$position_id)->update($data); 
            return $result; // Trả về true nếu thành công, false nếu thất bại
        } catch (\Exception $e) {
            return false;
        }
    }
}
