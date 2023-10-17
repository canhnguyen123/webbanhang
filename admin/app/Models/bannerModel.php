<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
class bannerModel extends Model
{
    protected $table = 'tbl_banner'; // Tên bảng mà model này liên kết với
    protected $primaryKey = 'banner_id'; // Tên cột khóa chính của bảng
    public function addbanner($name, $link)
{
    $data = [
        'banner_name' => $name,
        'banner_link' => $link,
        'banner_status' => 1,
        'create_at' =>  Carbon::now(),
    ];

    try {
        $result = DB::table($this->table)->insert($data);
        return $result; // Trả về true nếu thành công, false nếu thất bại
    } catch (\Exception $e) {
        return false;
    }
}
    public function updatebanner($name, $link,$banner_id)
    {
        $data = [
            'banner_name' => $name,
            'banner_link' => $link,
        ];
        try {
            $result = DB::table($this->table)->where('banner_id',$banner_id)->update($data);
            return $result; // Trả về true nếu thành công, false nếu thất bại
        } catch (\Exception $e) {
            return false;
        }
    }
    public function status_toggle($status,$banner_id){
        $data['banner_status']=$status;
        try {
            $result =   DB::table($this->table)->where('banner_id',$banner_id)->update($data); 
            return $result; // Trả về true nếu thành công, false nếu thất bại
        } catch (\Exception $e) {
            return false;
        }
    }
    public function deletebanner($banner_id)
    {
        try {
            $result = DB::table($this->table)->where('banner_id',$banner_id)->delete();
            return $result; // Trả về true nếu thành công, false nếu thất bại
        } catch (\Exception $e) {
            return false;
        }
    }
}
