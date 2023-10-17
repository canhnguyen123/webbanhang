<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sizeModel extends Model
{
    protected $table = 'tbl_size'; // Tên bảng mà model này liên kết với
    protected $primaryKey = 'size_id'; // Tên cột khóa chính của bảng
    public $timestamps = false; // Không sử dụng các trường created_at và updated_at

    // Định nghĩa các trường cho bảng và các quan hệ nếu cần

    public function addsize($name, $mota)
{
    $data = [
        'size_name' => $name,
        'size_note' => $mota,
        'size_status' => 1,
    ];

    try {
        $result = DB::table($this->table)->insert($data);
        return $result; // Trả về true nếu thành công, false nếu thất bại
    } catch (\Exception $e) {
        return false;
    }
}
    public function updatesize($name, $mota,$size_id)
    {
        $data = [
            'size_name' => $name,
            'size_note' => $mota,
        ];
        try {
            $result = DB::table($this->table)->where('size_id',$size_id)->update($data);
            return $result; // Trả về true nếu thành công, false nếu thất bại
        } catch (\Exception $e) {
            return false;
        }
    }
    public function checkDatabase( $name) {
        return DB::table($this->table)
            ->Where('size_name', $name)
            ->exists();
    }
    public function checkDatabaseIs($name, $size_id) {
        return DB::table($this->table)
            ->where('size_name', $name)
            ->where('size_id', '<>', $size_id)
            ->exists();
    }
    public function status_toggle($status,$size_id){
        $data['size_status']=$status;
        try {
            $result =   DB::table($this->table)->where('size_id',$size_id)->update($data); 
            return $result; // Trả về true nếu thành công, false nếu thất bại
        } catch (\Exception $e) {
            return false;
        }
    }
}
