<?php

namespace App\Services;
use App\Interfaces\ServiceInterface;
use Illuminate\Database\Eloquent\Model;

class FunControllerServices implements ServiceInterface
{   
    private $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }
    public function getList(Model $model)
    {
        // Logic để lấy danh sách từ $model
    }

    public function getDetail(Model $model, $id)
    {
        // Logic để lấy chi tiết từ $model với $id
    }

    public function create(Model $model, array $data)
    {
        // Logic để tạo mới dữ liệu trong $model với $data
    }

    public function update(Model $model, $id, array $data)
    {
        // Logic để cập nhật dữ liệu trong $model với $data và $id
    }

    public function delete(Model $model, $id)
    {
        // Logic để xóa dữ liệu trong $model với $id
    }

    public function toggleStatus(Model $model, $id)
    {
        $getStatus = $model->find($id);
        $currentStatus = $getStatus->status;
        $newStatus = ($currentStatus === 1) ? 0 : 1;

        $result = $model->where('id', $id)->update(['status' => $newStatus]);
        $message = ($result) ? 'Cập nhật thành công' : 'Cập nhật thất bại';

        return $message;
    }
}
