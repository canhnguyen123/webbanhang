<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class voucherModel extends Model
{
    protected $table = 'tbl_voucher'; // Tên bảng mà model này liên kết với
    protected $primaryKey = 'voucher_id'; // Tên cột khóa chính của bảng
    protected $pagination = 'tbl_pagination';  
    public function getPagination(){
        $result=DB::table($this->pagination)->where('pagination_tbl',$this->table);
       return $result;
   }
    public function addvoucher($name, $code, $isLimit, $unit, $voucher_category, $condition, $quantity, $number, $number_condition, $startTime, $endTime, $note)
    {
        $data = [
            'voucher_name' => $name,
            'voucher_code' => $code,
            'voucher_isLimit' => $isLimit,
            'voucher_quantity' => $quantity,
            'voucher_number' => $number,
            'voucher_unit' => $unit,
            'voucher_condition' => $condition,
            'voucher_number_condition' => $number_condition,
            'voucher_category' => $voucher_category,
            'voucher_startDate' => $startTime,
            'voucher_endDate' => $endTime,
            'voucher_status' => 1,
            'voucher_note' => $note,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ];

        try {
            $result = DB::table($this->table)->insert($data);
            return $result; // Trả về true nếu thành công, false nếu thất bại
        } catch (\Exception $e) {
            return false;
        }
    }

    public function updatevoucher($name, $code, $isLimit, $unit, $voucher_category, $condition, $quantity, $number, $number_condition, $startTime, $endTime, $note,$voucher_id)
    {
        $data = [
            'voucher_name' => $name,
            'voucher_code' => $code,
            'voucher_isLimit' => $isLimit,
            'voucher_quantity' => $quantity,
            'voucher_number' => $number,
            'voucher_unit' => $unit,
            'voucher_condition' => $condition,
            'voucher_number_condition' => $number_condition,
            'voucher_category' => $voucher_category,
            'voucher_startDate' => $startTime,
            'voucher_endDate' => $endTime,
            'voucher_note' => $note,
             ];

        try {
            $result = DB::table($this->table)->where($this->primaryKey,$voucher_id)->update($data);
            return $result; // Trả về true nếu thành công, false nếu thất bại
        } catch (\Exception $e) {
            return false;
        }
    }
    public function checkDatabase($code)
    {
        return DB::table($this->table)
            ->Where('voucher_code', $code)
            ->exists();
    }
    public function checkDatabaseIs($code, $voucher_id)
    {
        return DB::table($this->table)
            ->where('voucher_code', $code)
            ->where('voucher_id', '<>', $voucher_id)
            ->exists();
    }
    public function status_toggle($status, $voucher_id)
    {
        $data['voucher_status'] = $status;
        try {
            $result =   DB::table($this->table)->where('voucher_id', $voucher_id)->update($data);
            return $result; // Trả về true nếu thành công, false nếu thất bại
        } catch (\Exception $e) {
            return false;
        }
    }
}
