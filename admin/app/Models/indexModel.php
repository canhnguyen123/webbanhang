<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class indexModel extends Model
{
    protected $table = null;
    protected $primaryKey = null;
    protected $fillable = [];

    public function setTableName($tableName)
    {
        $this->table = $tableName;
    }

    public function setPrimaryKey($primaryKey)
    {
        $this->primaryKey = $primaryKey;
    }

    public function setFillable($fillable)
    {
        $this->fillable = $fillable;
    }

    public function getList($arrange=null){
        try {
            $query = $this->orderBy($this->primaryKey, ($arrange !== 1) ? 'desc' : 'asc');
            return $query;
        } catch (\Exception $e) {
            Log::error($e);
            return null;
        }
    }
    public function getDeatilId($id){
        $result="";
        try{
            $result = $this->find($id);
            return $result;
        } catch(\Exception $e) {
            Log::error($e);
            return $result; 
        } 
    }
    public function createData(array $data){
        $result=null;
        try {
            $result = $this->create($data);
            return $result;
        } catch (\Exception $e) {
            Log::error($e);
            return $result;
        }  
    }
    public function edit(array $data, $id){
        $result="";
        try {
            $result=$this->where($this->primaryKey, $id)->update($data);
            return $result;
        } catch (\Exception $e) {
            Log::error($e);
            return false;
        }
    }
    public function checkColum($columName,$value,$id=null){
        $query=null;
        try {
            $query = $this->where($columName, $value);
            if($id!==null){
                $query->where($this->primaryKey,'<>',$id);
            }
            $result= $query->exists();
            return $result;
        } catch (\Exception $e) {
            Log::error($e);
            return $query;
        }  
    }
    public function toggleStatus($id,array $data){
        try {
            $result =$this->where($this->primaryKey,$id)->update($data); 
            return $result;
        } catch (\Exception $e) {
            Log::error($e);
            return false;
        }
    }
   
   
    public function creactAupdateTheLoai($list, $table, $id, $status)
    {
        try {
            $success = false;
    
            DB::transaction(function () use (&$success, $list, $table, $id, $status) {
                // Thao tác thứ nhất
                $existingIds = DB::table($table)->pluck($id)->all();
                foreach ($list as $theloaiId) {
                    if (!in_array($theloaiId, $existingIds)) {
                        DB::table($table)->insert([
                            $id => $theloaiId,
                            $status => 1
                        ]);
                    }
                }
    
                // Thao tác thứ hai
                DB::table($table)
                    ->whereNotIn($id, $list)
                    ->where($status, 1)
                    ->update([$status => 0]);
    
                // Thao tác thứ ba
                DB::table($table)
                    ->whereIn($id, $list)
                    ->where($status, 0)
                    ->update([$status => 1]);
    
                // Đánh dấu thành công nếu đến đây mà không có exception
                $success = true;
            });
    
            return $success;
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e);
            return false;
        }
    }
    
}
