<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class phanloaiModel extends Model
{
    protected $table = 'tbl_phanloai'; // Tên bảng mà model này liên kết với
    protected $primaryKey = 'phanloai_id'; // Tên cột khóa chính của bảng
    public $timestamps = false; // Không sử dụng các trường created_at và updated_at

    // Định nghĩa các trường cho bảng và các quan hệ nếu cần

    public function addphanloai($name, $code)
{
    $data = [
        'phanloai_name' => $name,
        'phanloai_code' => $code,
        'phanloai_status' => 1,
    ];

    try {
        $result = DB::table($this->table)->insert($data);
        return $result; // Trả về true nếu thành công, false nếu thất bại
    } catch (\Exception $e) {
        return false;
    }
}
    public function updatephanloai($name, $code,$phanloai_id)
    {
        $data = [
            'phanloai_name' => $name,
            'phanloai_code' => $code,
        ];
        try {
            $result = DB::table($this->table)->where('phanloai_id',$phanloai_id)->update($data);
            return $result; // Trả về true nếu thành công, false nếu thất bại
        } catch (\Exception $e) {
            return false;
        }
    }
    public function checkDatabase( $code) {
        return DB::table($this->table)
            ->Where('phanloai_code', $code)
            ->exists();
    }
    public function checkDatabaseIs($code, $phanloai_id) {
        return DB::table($this->table)
            ->where('phanloai_code', $code)
            ->where('phanloai_id', '<>', $phanloai_id)
            ->exists();
    }
    public function status_toggle($status,$phanloai_id){
        $data['phanloai_status']=$status;
        try {
            $result =   DB::table($this->table)->where('phanloai_id',$phanloai_id)->update($data); 
            return $result; // Trả về true nếu thành công, false nếu thất bại
        } catch (\Exception $e) {
            return false;
        }
    }
}
