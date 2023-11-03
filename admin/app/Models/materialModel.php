<?php
namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class materialModel extends Model
{
   
    protected $table = 'tbl_material'; // Tên bảng mà model này liên kết với
    protected $primaryKey = 'material_id'; // Tên cột khóa chính của bảng
    public function getDeatil($material_id){
        $result=DB::table($this->table)->where($this->primaryKey,$material_id);   
        return $result;
    }
    public function addmarerial($name)
{
    $data = [
        'material_name' => $name,
        'material_status' => 1,
    ];

    try {
        $result = DB::table($this->table)->insert($data);
        return $result; // Trả về true nếu thành công, false nếu thất bại
    } catch (\Exception $e) {
        return false;
    }
}
public function updateMaterial($name,$id)
{
    $data = [
        'material_name' => $name,
    ];

    try {
        $result = DB::table($this->table)->where($this->primaryKey,$id)->update($data);
        return $result; // Trả về true nếu thành công, false nếu thất bại
    } catch (\Exception $e) {
        return false;
    }
}
    public function checkDatabase($name) {
        return DB::table($this->table)
            ->Where('material_name', $name)
            ->exists();
    }
    public function checkDatabaseIs($name, $material_id) {
        return DB::table($this->table)
            ->where('material_name', $name)
            ->where($this->primaryKey, '<>', $material_id)
            ->exists();
    }
    public function status_toggle($status,$material_id){
        $data['material_status']=$status;
        try {
            $result =   DB::table($this->table)->where($this->primaryKey,$material_id)->update($data); 
            return $result; // Trả về true nếu thành công, false nếu thất bại
        } catch (\Exception $e) {
            return false;
        }
    }
}
