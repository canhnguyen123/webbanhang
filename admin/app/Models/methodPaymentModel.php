<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class methodPaymentModel extends Model
{
    protected $table = 'tbl_methodPayment'; // Tên bảng mà model này liên kết với
    protected $primaryKey = 'methodPayment_id'; // Tên cột khóa chính của bảng
    public $timestamps = false; // Không sử dụng các trường created_at và updated_at

    // Định nghĩa các trường cho bảng và các quan hệ nếu cần

    public function addmethodPayment($name,$code,$category,$note)
{
    $data = [
        'methodPayment_name' => $name,
        'methodPayment_code' => $code,
        'methodPayment_category' => $category,
        'methodPayment_note' => $note,
        'methodPayment_status' => 1,
    ];

    try {
        $result = DB::table($this->table)->insert($data);
        return $result; // Trả về true nếu thành công, false nếu thất bại
    } catch (\Exception $e) {
        return false;
    }
}
    public function updatemethodPayment($name,$code,$methodPayment_id,$note,$category)
    {
        $data = [
            'methodPayment_name' => $name,
            'methodPayment_code' => $code,
            'methodPayment_note' => $note,
            'methodPayment_category' => $category,
        ];
        try {
            $result = DB::table($this->table)->where('methodPayment_id',$methodPayment_id)->update($data);
            return $result; // Trả về true nếu thành công, false nếu thất bại
        } catch (\Exception $e) {
            return false;
        }
    }
    public function checkDatabase( $code) {
        return DB::table($this->table)
            ->Where('methodPayment_code', $code)
            ->exists();
    }
    public function checkDatabaseIs($code, $methodPayment_id) {
        return DB::table($this->table)
            ->where('methodPayment_code', $code)
            ->where('methodPayment_id', '<>', $methodPayment_id)
            ->exists();
    }
    public function status_toggle($status,$methodPayment_id){
        $data['methodPayment_status']=$status;
        try {
            $result =   DB::table($this->table)->where('methodPayment_id',$methodPayment_id)->update($data); 
            return $result; // Trả về true nếu thành công, false nếu thất bại
        } catch (\Exception $e) {
            return false;
        }
    }
}
