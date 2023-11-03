<?php


namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
class shipModel extends Model
{
    protected $table = 'tbl_ship'; // Tên bảng mà model này liên kết với
    protected $primaryKey = 'ship_id'; // Tên cột khóa chính của bảng
    public $timestamps = false; // Không sử dụng các trường created_at và updated_at

    public function getDeatil($ship_id){
        $result = DB::table($this->table)->where($this->primaryKey,$ship_id);
        return $result;
    }
    public function addship($name,$code,$price, $mota)
{
    $data = [
        'ship_code' => $code,
        'ship_name' => $name,
        'ship_note' => $mota,
        'ship_price' => $price,
        'ship_status' => 1,
    ];

    try {
        $result = DB::table($this->table)->insert($data);
        return $result; // Trả về true nếu thành công, false nếu thất bại
    } catch (\Exception $e) {
        return false;
    }
}
    public function  updateship($name,$code,$price, $mota,$ship_id)
    {
        $data = [
            'ship_code' => $code,
            'ship_name' => $name,
            'ship_note' => $mota,
            'ship_price' => $price,
        ];
        try {
            $result = DB::table($this->table)->where($this->primaryKey,$ship_id)->update($data);
            return $result; // Trả về true nếu thành công, false nếu thất bại
        } catch (\Exception $e) {
            return false;
        }
    }
    public function checkDatabase( $name) {
        return DB::table($this->table)
            ->Where('ship_name', $name)
            ->exists();
    }
    public function checkDatabaseIs($name, $ship_id) {
        return DB::table($this->table)
            ->where('ship_name', $name)
            ->where('ship_id', '<>', $ship_id)
            ->exists();
    }
    public function status_toggle($status,$ship_id){
        $data['ship_status']=$status;
        try {
            $result =   DB::table($this->table)->where('ship_id',$ship_id)->update($data); 
            return $result; // Trả về true nếu thành công, false nếu thất bại
        } catch (\Exception $e) {
            return false;
        }
    }
   
}
