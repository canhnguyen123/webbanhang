<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categoryModel extends Model
{
    protected $table = 'tbl_category'; // Tên bảng mà model này liên kết với
    protected $primaryKey = 'category_id';
    protected $pagination = 'tbl_pagination'; // Tên cột khóa chính của bảng
    public $timestamps = false; // Không sử dụng các trường created_at và updated_at
   
   public function getPagination(){
        $result=DB::table($this->pagination)->where('pagination_tbl',$this->table);
       return $result;
   }
    public function addCategory($name, $code)
{
    $data = [
        'category_name' => $name,
        'category_code' => $code,
        'category_status' => 1,
    ];

    try {
        $result = DB::table($this->table)->insert($data);
        return $result; // Trả về true nếu thành công, false nếu thất bại
    } catch (\Exception $e) {
        return false;
    }
}
    public function updateCategory($name, $code,$category_id)
    {
        $data = [
            'category_name' => $name,
            'category_code' => $code,
        ];
        try {
            $result = DB::table($this->table)->where('category_id',$category_id)->update($data);
            return $result; // Trả về true nếu thành công, false nếu thất bại
        } catch (\Exception $e) {
            return false;
        }
    }
    public function checkDatabase( $code) {
        return DB::table($this->table)
            ->Where('category_code', $code)
            ->exists();
    }
    public function checkDatabaseIs($code, $category_id) {
        return DB::table($this->table)
            ->where('category_code', $code)
            ->where('category_id', '<>', $category_id)
            ->exists();
    }
    public function status_toggle($status,$category_id){
        $data['category_status']=$status;
        try {
            $result =   DB::table($this->table)->where('category_id',$category_id)->update($data); 
            return $result; // Trả về true nếu thành công, false nếu thất bại
        } catch (\Exception $e) {
            return false;
        }
    }
}
