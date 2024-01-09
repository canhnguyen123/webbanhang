<?php

namespace App\Models;
use Illuminate\Support\Carbon;
class notificationAdminModel extends indexModel
{
    protected $table = 'tbl_notication_admin';
    protected $primaryKey = 'notication_admin_id';
    protected $fillable = ['staff_id','notication_admin_content','notication_admin_status','created_at','updated_at'];
    public $timestamps = true; 
    public function __construct()
    {
        parent::__construct();
        $this->setTableName($this->table);
        $this->setPrimaryKey($this->primaryKey);
    }
    public function add($content,$staff_id)
{
    $data = [
        'staff_id' => $staff_id,
        'notication_admin_content' => $content,
        'notication_admin_status' => 0,
        'created_at' => Carbon::now(),
    ];
    $result = $this->createData($data);
    return $result;
  
}
}
