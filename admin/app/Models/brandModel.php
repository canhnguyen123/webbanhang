<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class brandModel extends Model
{
    protected $table = 'tbl_brand'; // Tên bảng mà model này liên kết với
    protected $primaryKey = 'brand_id'; // Tên cột khóa chính của bảng
    public $timestamps = false; // Không sử dụng các trường created_at và updated_at

    // Định nghĩa các trường cho bảng và các quan hệ nếu cần

    public function addbrand($name, $code)
{
    $data = [
        'brand_name' => $name,
        'brand_code' => $code,
        'brand_status' => 1,
    ];

    try {
        $result = DB::table($this->table)->insert($data);
        return $result; // Trả về true nếu thành công, false nếu thất bại
    } catch (\Exception $e) {
        return false;
    }
}
    public function updatebrand($name, $code,$brand_id)
    {
        $data = [
            'brand_name' => $name,
            'brand_code' => $code,
        ];
        try {
            $result = DB::table($this->table)->where('brand_id',$brand_id)->update($data);
            return $result; // Trả về true nếu thành công, false nếu thất bại
        } catch (\Exception $e) {
            return false;
        }
    }
    public function checkDatabase( $code) {
        return DB::table($this->table)
            ->Where('brand_code', $code)
            ->exists();
    }
    public function checkDatabaseIs($code, $brand_id) {
        return DB::table($this->table)
            ->where('brand_code', $code)
            ->where('brand_id', '<>', $brand_id)
            ->exists();
    }
    public function status_toggle($status,$brand_id){
        $data['brand_status']=$status;
        try {
            $result =   DB::table($this->table)->where('brand_id',$brand_id)->update($data); 
            return $result; // Trả về true nếu thành công, false nếu thất bại
        } catch (\Exception $e) {
            return false;
        }
    }
}
