<?php

namespace App\Models;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class staffModel extends Model implements Authenticatable

{ use \Illuminate\Auth\Authenticatable;

    protected $table = 'tbl_staff';
    protected $primaryKey = 'staff_id';
    public $timestamps = false;
    protected $fillable = [
        'staff_username', 'staff_password',
    ];

    public function getAuthPassword()
    {
        return $this->staff_password;
    }

    public function getAuthIdentifierName()
    {
        return 'staff_username';
    }

    public function getAuthIdentifier()
    {
        return $this->staff_username;
    }
    public function checkLoginCredentials($username, $password)
    {
        $staff = self::where('staff_username', $username)->first();
    
        if ($staff && Hash::check($password, $staff->staff_password)) {
            if($staff->staff_status!==1){
                if($staff->staff_id===1){
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
            $uploadPath = public_path('upload');

            if (!File::exists($uploadPath)) {
                File::makeDirectory($uploadPath, 0777, true, true);
            }
            $upload = $img->move(public_path('upload/BE'), $img->getClientOriginalName());
            return $result; // Trả về true nếu thành công, false nếu thất bại
        } catch (\Exception $e) {
            return false;
        }
    }
    public function updatestaff($fullname, $email, $phone, $position_id, $note, $img, $address,$staff_id)
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
            $result = DB::table($this->table)->where('staff_id',$staff_id)->update($data);
       
            return $result; // Trả về true nếu thành công, false nếu thất bại
        } catch (\Exception $e) {
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
        $result = DB::table($setTable)->where($setcolumstatus, 1)->get();
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
