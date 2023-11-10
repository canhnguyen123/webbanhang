<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paginationModel extends Model
{

    protected $table = 'tbl_pagination'; // Tên bảng mà model này liên kết với
    protected $primaryKey = 'pagination_id';
    protected $pagination = 'tbl_pagination';
    public function getPagination()
    {
        $result = DB::table($this->pagination)->where('pagination_tbl', $this->table);
        return $result;
    }
    public function getDeatil($pagination_id)
    {
        $result = DB::table($this->table)->where($this->primaryKey, $pagination_id);
        return $result;
    }
    public function addpagination($tbl, $name, $primaryKey, $nameElement, $limitDeaful, $limitAcction, $category)
    {
        $data = [
            'pagination_tbl' => $tbl,
            'pagination_name' => $name,
            'pagination_primaryKey' => $primaryKey,
            'pagination_category' => $category,
            'pagination_nameElement' => $nameElement,
            'pagination_limitDeaful' => $limitDeaful,
            'pagination_limitAcction' => $limitAcction,
            'pagination_status' => 1,
        ];

        try {
            $result = DB::table($this->table)->insert($data);
            return $result; // Trả về true nếu thành công, false nếu thất bại
        } catch (\Exception $e) {
            return false;
        }
    }
    public function updatepagination($tbl, $name, $primaryKey, $nameElement, $limitDeaful, $limitAcction, $category,$pagination_id)
    {
        $data = [
            'pagination_tbl' => $tbl,
            'pagination_name' => $name,
            'pagination_primaryKey' => $primaryKey,
            'pagination_category' => $category,
            'pagination_nameElement' => $nameElement,
            'pagination_limitDeaful' => $limitDeaful,
            'pagination_limitAcction' => $limitAcction
        ];

        try {
            $result = DB::table($this->table)->where($this->primaryKey,$pagination_id)->update($data);
            return $result; 
        } catch (\Exception $e) {
            return false;
        }
    }
    public function checkDatabase($code)
    {
        return DB::table($this->table)
            ->Where('pagination_tbl', $code)
            ->exists();
    }
    public function checkDatabaseIs($code, $pagination_id)
    {
        return DB::table($this->table)
            ->where('pagination_tbl', $code)
            ->where($this->primaryKey, '<>', $pagination_id)
            ->exists();
    }
    public function status_toggle($status, $pagination_id)
    {
        $data['pagination_status'] = $status;
        try {
            $result =   DB::table($this->table)->where($this->primaryKey, $pagination_id)->update($data);
            return $result; // Trả về true nếu thành công, false nếu thất bại
        } catch (\Exception $e) {
            return false;
        }
    }
}
