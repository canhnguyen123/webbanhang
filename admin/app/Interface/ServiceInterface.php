<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface ServiceInterface
{
    public function getList(Model $model);
    public function getDetail(Model $model, $id);
    public function create(Model $model, array $data);
    public function update(Model $model, $id, array $data);
    public function delete(Model $model, $id);
    public function toggleStatus(Model $model, $id);
}
