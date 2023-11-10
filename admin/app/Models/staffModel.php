<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class staffModel extends Model implements Authenticatable

{
    use AuthenticableTrait;
  
    protected $table = 'tbl_staff';
    protected $primaryKey = 'staff_id';
    public $timestamps = false;
    protected $fillable = [
        'staff_username', 'staff_password',
    ];
    protected $pagination = 'tbl_pagination';  
    public function getPagination(){
            $result=DB::table($this->pagination)->where('pagination_tbl',$this->table);
        return $result;
    }
    public function getAuthPassword()
    {
        return $this->staff_password;
    }
    public function getAuthIdentifier()
    {
        return $this->staff_id;
    }
    public function getAuthIdentifierName()
    {
        return 'staff_id';
    }

   
    public function checkLoginCredentials($username, $password)
    {
        $getID =DB::table($this->table)-> where('staff_username', $username)->first();
        $staff = self::where('staff_id',$getID->staff_id)->first();

        if ($staff && Hash::check($password, $staff->staff_password)) {
            if ($staff->staff_status !== 1) {
                if ($staff->staff_id === 1) {
                    return $staff;
                }
                return null;
            }
            return $staff;
        }

        return null;
    }

    public function addstaff($fullname, $code, $username, $password, $email, $phone, $codeRecovery, $position_id, $note, $img, $address)
    {
        $data = [
            'position_id' => $position_id,
            'staff_code' => $code,
            'staff_fullname' => $fullname,
            'staff_username' => $username,
            'staff_password' => bcrypt($password),
            'staff_linkimg' => $img->getClientOriginalName(),
            'staff_odlPass' => bcrypt($password),
            'staff_email' => $email,
            'staff_phone' => $phone,
            'staff_note' => $note,
            'staff_status' => 1,
            'staff_codeRecovery' => $codeRecovery,
            'staff_address' => $address,
        ];

        try {
            $result = DB::table($this->table)->insert($data);
            $staff_id = DB::getPdo()->lastInsertId();
            $select_GroupId = $this->selectPemisstionGroup($position_id);
            foreach ($select_GroupId as $itemGroup) {
                $select_deatilQuyen = $this->selectPemisstionDeatil($itemGroup->permission_group_id);
                foreach ($select_deatilQuyen as $item_deatil_quyen) {
                    $this->addDeatilPemisstion($item_deatil_quyen->permission_id, $staff_id);
                }
            }
            $uploadPath = public_path('upload');

            if (!File::exists($uploadPath)) {
                File::makeDirectory($uploadPath, 0777, true, true);
            }
            $img->move(public_path('upload/BE'), $img->getClientOriginalName());


            return $result; // Trả về true nếu thành công, false nếu thất bại
        } catch (\Exception $e) {
            return false;
        }
    }
    public function selectPemisstionGroup($position_id)
    {
        $result = DB::table('tbl_position_permission')
            ->select('permission_group_id')
            ->where('position_id', $position_id)
            ->where('position_permission_status', 1)
            ->get();
        return $result;
    }
    public function selectPemisstionDeatil($permission_group_id)
    {
        $result = DB::table('tbl_permission')
            ->select('permission_id')
            ->where('permission_group_id', $permission_group_id)
            ->where('permission_status', 1)
            ->get();
        return $result;
    }
    public function addDeatilPemisstion($permission_id, $staff_id)
    {
        $data2 = [
            'staff_id' => $staff_id,
            'permission_id' => $permission_id,
            'staff_permission_status' => 1
        ];
        try {
            $result = DB::table('tbl_staff_permission')->insert($data2);
            return $result; // Trả về true nếu thành công, false nếu thất bại
        } catch (\Exception $e) {
            return false;
        }
    }
    public function updatestaff($fullname, $email, $phone, $position_id, $note, $img, $address, $staff_id, $pemissionId)
    {
        $data = [
            'position_id' => $position_id,
            'staff_fullname' => $fullname,
            'staff_linkimg' => $img,
            'staff_email' => $email,
            'staff_phone' => $phone,
            'staff_note' => $note,
            'staff_address' => $address,
        ];

        try {
            $result = DB::table($this->table)->where('staff_id', $staff_id)->update($data);
        //    $this->updatePemission($pemissionId, $staff_id);
            return $result; // Trả về true nếu thành công, false nếu thất bại
        } catch (\Exception $e) {
            return false;
        }
    }
    public function updatePemission($pemission, $staff_id)
    {
        try {
            $existingPhanQuyenIds = DB::table('tbl_staff_permission')
                ->where('staff_id', $staff_id)
                ->pluck('permission_id')
                ->toArray();
            if ($pemission) {
                foreach ($pemission as $item) {
                    if (in_array($item, $existingPhanQuyenIds)) {
                        DB::table('tbl_staff_permission')
                            ->where('staff_id', $staff_id)
                            ->where('permission_id', $item)
                            ->update(['staff_permission_status' => 1]);
                    } else {
                        // Thêm mới hàng nếu chưa tồn tại
                        DB::table('tbl_staff_permission')->insert([
                            'staff_id' => $staff_id,
                            'permission_id' => $item,
                            'staff_permission_status' => 1
                        ]);
                    }
                }
                DB::table('tbl_staff_permission')
                    ->where('staff_id', $staff_id)
                    ->whereNotIn('permission_id', $pemission)
                    ->update(['staff_permission_status' => 0]);
            
            }
            return true;
        } catch (\Exception $e) {
            // Xử lý lỗi nếu cần
            return false;
        }
    }
    public function checkDatabase($code)
    {
        return DB::table($this->table)
            ->Where('staff_code', $code)
            ->exists();
    }
    public function checkDatabaseIs($code, $staff_id)
    {
        return DB::table($this->table)
            ->where('staff_code', $code)
            ->where('staff_id', '<>', $staff_id)
            ->exists();
    }
    public function status_toggle($status, $staff_id)
    {
        $data['staff_status'] = $status;
        try {
            $result =   DB::table($this->table)->where('staff_id', $staff_id)->update($data);
            return $result; // Trả về true nếu thành công, false nếu thất bại
        } catch (\Exception $e) {
            return false;
        }
    }
    public function getListTable($setTable, $setcolumstatus)
    {
        $result = DB::table($setTable)->where($setcolumstatus, 1);
        return $result;
    }
    public function getMyListTable($staff_id)
    {
        $result = DB::table('tbl_staff_permission')
            ->join('tbl_permission', 'tbl_staff_permission.permission_id', '=', 'tbl_permission.permission_id')
            ->select('tbl_staff_permission.permission_id', 'tbl_permission.permission_name')
            ->where('tbl_staff_permission.staff_permission_status', 1)
            ->where('tbl_staff_permission.staff_id', $staff_id);
        return $result;
    }
    public function getDetail($staff_id)
    {
        $result = DB::table($this->table)
            ->join('tbl_position', 'tbl_staff.position_id', '=', 'tbl_position.position_id')
            ->where('tbl_staff.staff_id', $staff_id)
            ->select('tbl_staff.*', 'tbl_position.position_name') // Thay đổi chỗ này
            ->get();

        return $result;
    }
}
