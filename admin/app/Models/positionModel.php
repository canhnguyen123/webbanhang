<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class positionModel extends Model
{
    protected $table = 'tbl_position'; // Tên bảng mà model này liên kết với
    protected $primaryKey = 'position_id'; // Tên cột khóa chính của bảng
     protected $pagination = 'tbl_pagination';  
    public function getPagination(){
        $result=DB::table($this->pagination)->where('pagination_tbl',$this->table);
       return $result;
   }
    public function selectTable($tableName, $primaryKeyId, $status)
    {
        $result = DB::table($tableName)->orderBy($primaryKeyId, 'desc')->where($status, 1);
        return $result;
    }
    public function getDataPemission($position_id)
    {
        $result = DB::table('tbl_position_permission')
            ->join('tbl_permission__group', 'tbl_position_permission.permission_group_id', '=', 'tbl_permission__group.permission_group_id')
            ->select('tbl_position_permission.permission_group_id', 'tbl_permission__group.permission_group_name')
            ->orderBy('tbl_position_permission.position_permission_id', 'desc')
            ->where('tbl_position_permission.position_permission_status', 1)
            ->where('tbl_position_permission.position_id', $position_id);
        return $result;
    }
    public function updatePemissionGroup($pemissionGroup,$position_id)
    {
            try{
                $existingPhanQuyenIds = DB::table('tbl_position_permission')
                ->where('position_id', $position_id)
                ->pluck('permission_group_id')
                ->toArray();
            if ($pemissionGroup) {
            foreach ($pemissionGroup as $item) {
                if (in_array($item, $existingPhanQuyenIds)) {
                    DB::table('tbl_position_permission')
                        ->where('position_id', $position_id)
                        ->where('permission_group_id', $item)
                        ->update(['position_permission_status' => 1]);
                } else {
                    // Thêm mới hàng nếu chưa tồn tại
                    DB::table('tbl_position_permission')->insert([
                        'position_id' => $position_id,
                        'permission_group_id' => $item,
                        'position_permission_status' => 1
                    ]);
                }
            }
            DB::table('tbl_position_permission')
                ->where('position_id', $position_id)
                ->whereNotIn('permission_group_id', $pemissionGroup)
                ->update(['position_permission_status' => 0]);
        }
        return true;
    } catch (\Exception $e) {
        // Xử lý lỗi nếu cần
        return false;
    }
    }
    public function addposition($name, $code)
    {
        $data = [
            'position_name' => $name,
            'position_code' => $code,
            'position_status' => 1,
        ];

        try {
            $result = DB::table($this->table)->insertGetId($data);
            return $result; 
        } catch (\Exception $e) {
            return false;
        }
    }
    public function addPemissionGroup($listPemissionGroup, $position_id)
    {
        $success = true; // Mặc định là thành công

        foreach ($listPemissionGroup as $item) {
            $data = [
                'permission_group_id' => $item,
                'position_id' => $position_id,
                'position_permission_status' => 1,
            ];

            try {
                $result = DB::table('tbl_position_permission')->insert($data);
                if (!$result) {
                    // Nếu có lỗi khi thêm một bản ghi, đặt biến $success thành false
                    $success = false;
                }
            } catch (\Exception $e) {
                $success = false;
            }
        }

        return $success; // Trả về true nếu tất cả bản ghi đều thành công, false nếu có ít nhất một bản ghi không thành công
    }

    public function updateposition($name, $code, $position_id)
    {
        $data = [
            'position_name' => $name,
            'position_code' => $code,
        ];
        try {
            $result = DB::table($this->table)->where($this->primaryKey, $position_id)->update($data);
            return $result; // Trả về true nếu thành công, false nếu thất bại
        } catch (\Exception $e) {
            return false;
        }
    }
    public function checkDatabase($code)
    {
        return DB::table($this->table)
            ->Where('position_code', $code)
            ->exists();
    }
    public function checkDatabaseIs($code, $position_id)
    {
        return DB::table($this->table)
            ->where('position_code', $code)
            ->where('position_id', '<>', $position_id)
            ->exists();
    }
    public function status_toggle($status, $position_id)
    {
        $data['position_status'] = $status;
        try {
            $result =   DB::table($this->table)->where('position_id', $position_id)->update($data);
            return $result; // Trả về true nếu thành công, false nếu thất bại
        } catch (\Exception $e) {
            return false;
        }
    }
}
