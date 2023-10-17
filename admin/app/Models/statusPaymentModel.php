<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class statusPaymentModel extends Model
{
    protected $table = 'tbl_statusPayment'; // Tên bảng mà model này liên kết với
    protected $primaryKey = 'statusPayment_id'; // Tên cột khóa chính của bảng
    public $timestamps = false; // Không sử dụng các trường created_at và updated_at

    // Định nghĩa các trường cho bảng và các quan hệ nếu cần

    public function addstatusPayment($name,$code,$note)
{
    $data = [
        'statusPayment_name' => $name,
        'statusPayment_code' => $code,
        'statusPayment_note' => $note,
        'statusPayment_status' => 1,
    ];

    try {
        $result = DB::table($this->table)->insert($data);
        return $result; // Trả về true nếu thành công, false nếu thất bại
    } catch (\Exception $e) {
        return false;
    }
}
    public function updatestatusPayment($name,$code,$statusPayment_id,$note)
    {
        $data = [
            'statusPayment_name' => $name,
            'statusPayment_code' => $code,
            'statusPayment_note' => $note,
        ];
        try {
            $result = DB::table($this->table)->where('statusPayment_id',$statusPayment_id)->update($data);
            return $result; // Trả về true nếu thành công, false nếu thất bại
        } catch (\Exception $e) {
            return false;
        }
    }
    public function checkDatabase( $code) {
        return DB::table($this->table)
            ->Where('statusPayment_code', $code)
            ->exists();
    }
    public function checkDatabaseIs($code, $statusPayment_id) {
        return DB::table($this->table)
            ->where('statusPayment_code', $code)
            ->where('statusPayment_id', '<>', $statusPayment_id)
            ->exists();
    }
    public function status_toggle($status,$statusPayment_id){
        $data['statusPayment_status']=$status;
        try {
            $result =   DB::table($this->table)->where('statusPayment_id',$statusPayment_id)->update($data); 
            return $result; // Trả về true nếu thành công, false nếu thất bại
        } catch (\Exception $e) {
            return false;
        }
    }
}
