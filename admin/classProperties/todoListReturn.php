<?php 

namespace App\classProperties;

class TodoListReturn {
    public $id;
    public $name;
    public $status;
    public $created_at;
    public $dealine;

    public function __construct($id, $name, $status, $created_at, $dealine) {
        $this->id = $id;
        $this->name = $name;
        $this->status = $status;
        $this->created_at = $created_at;
        $this->dealine = $dealine;
    }
}
