<?php
namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class colorModel extends Model
{
    protected $table = 'tbl_color'; // Tên bảng mà model này liên kết với
    protected $primaryKey = 'color_id'; // Tên cột khóa chính của bảng
    public $timestamps = false; // Không sử dụng các trường created_at và updated_at

    // Định nghĩa các trường cho bảng và các quan hệ nếu cần

    public function addcolor($name, $code)
{
    $data = [
        'color_name' => $name,
        'color_code' => $code,
        'color_status' => 1,
    ];

    try {
        $result = DB::table($this->table)->insert($data);
        return $result; // Trả về true nếu thành công, false nếu thất bại
    } catch (\Exception $e) {
        return false;
    }
}
    public function updatecolor($name, $code,$color_id)
    {
        $data = [
            'color_name' => $name,
            'color_code' => $code,
        ];
        try {
            $result = DB::table($this->table)->where('color_id',$color_id)->update($data);
            return $result; // Trả về true nếu thành công, false nếu thất bại
        } catch (\Exception $e) {
            return false;
        }
    }
    public function checkDatabase( $code) {
        return DB::table($this->table)
            ->Where('color_code', $code)
            ->exists();
    }
    public function checkDatabaseIs($code, $color_id) {
        return DB::table($this->table)
            ->where('color_code', $code)
            ->where('color_id', '<>', $color_id)
            ->exists();
    }
    public function status_toggle($status,$color_id){
        $data['color_status']=$status;
        try {
            $result =   DB::table($this->table)->where('color_id',$color_id)->update($data); 
            return $result; // Trả về true nếu thành công, false nếu thất bại
        } catch (\Exception $e) {
            return false;
        }
    }
}
