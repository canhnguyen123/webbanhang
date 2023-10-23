<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productModel extends Model
{
    protected $table = 'tbl_product';
    protected $tableImg = 'tbl_product_img';
    protected $tableQuantity = 'tbl_product_quantity'; // Tên bảng mà model này liên kết với
    protected $primaryKey = 'product_id';
    protected $primaryKeyImg = 'productImg_id';
    protected $primaryKeyQuantity = 'productQuantity_id'; // Tên cột khóa chính của bảng
    public $timestamps = false; // Không sử dụng các trường created_at và updated_at

    // Định nghĩa các trường cho bảng và các quan hệ nếu cần

    public function addtourDeatil($location, $tour_id, $price, $name, $code, $startTime, $endTime, $startTimeTour, $transport, $infro, $listImg)
{
    $data = [
        'tour_category_id' => $tour_id,
        'category_tour_deatil_price' => $price,
        'tour_deatil_code' => $code,
        'tour_deatil_name' => $name,
        'tour_deatil_localtion' => $location,
        'tour_deatil_start' => $startTimeTour,
        'tour_deatil_startTime' => $startTime,
        'tour_deatil_endTime' => $endTime,
        'tour_deatil_transport' => $transport,
        'tour_deatil_infro' => $infro,
        'category_tour_status' => 1,
    ];

    try {
        $result = DB::table($this->table)->insertGetId($data);
        if ($result) {
            $this->addImg($listImg, $result);
        }
        return $result; // Trả về true nếu thành công, false nếu thất bại
    } catch (\Exception $e) {
        return false;
    }
}

public function addImg($listImg, $id)
{
    $success = true; // Sử dụng biến này để theo dõi kết quả
    foreach ($listImg as $item) {
        $data = [
            'tour_deatil_id' => $id,
            'tour_deatil_img_link' => $item,
            'tour_deatil_img_status' => 1,
        ];
        try {
            $result = DB::table('tbl_tour_deatil__img')->insert($data);
            if (!$result) {
                $success = false;
            }
        } catch (\Exception $e) {
            $success = false;
        }
    }
    return $success; // Trả về true nếu tất cả ảnh được chèn thành công, false nếu có lỗi
}

    function getDeatil($product_id){
        $result=DB::table('tbl_product')
        ->join('tbl_brand',"tbl_product.brand_id","=","tbl_brand.brand_id")
        ->join('tbl_theloai',"tbl_product.theloai_id","=","tbl_theloai.theloai_id")
        ->join("tbl_category", "tbl_theloai.category_id", "=", "tbl_category.category_id")
        ->join("tbl_phanloai", "tbl_theloai.phanloai_id", "=", "tbl_phanloai.phanloai_id")
        ->where('tbl_product.product_id', $product_id)
        ->select("tbl_product.*", "tbl_theloai.*", "tbl_category.*", "tbl_phanloai.*","tbl_brand.*")
        ->get();
        return $result;
    }

    public function getQuantity($product_id){
        $result=DB::table($this->tableQuantity)
        ->where($this->primaryKey,$product_id)
        ->get();
        return $result;
    }
    public  function getDeatilImg($product_id){
        $result=DB::table($this->tableImg)
        ->where($this->primaryKey,$product_id)
        ->get();
        return $result;
    }
    function addProductQuantity($listQuantity, $product_id)
    {
        try {
            // Bắt đầu giao dịch
            DB::beginTransaction();

            foreach ($listQuantity as $item) {
                $data = [
                    'product_id' => $product_id,
                    'productQuantity_color' => $item[0],
                    'productQuantity_size' => $item[1],
                    'productQuantity' => $item[2],
                    'productQuantity_priceInt' => $item[3],
                    'productQuantity_priceOut' => $item[4],
                    'productQuantity_status' => 1,
                ];

                // Thêm mục vào bảng
                DB::table($this->tableQuantity)->insert($data);
            }

            // Commit giao dịch
            DB::commit();

            return true; // Trả về true nếu thành công
        } catch (\Exception $e) {
            // Rollback giao dịch nếu có lỗi
            DB::rollBack();

            return false; // Trả về false nếu có lỗi
        }
    }
    function addProductQuantityDeatil($size,$color,$quantity,$priceInt,$priceOut, $product_id)
    {
    
          
                $data = [
                    'product_id' => $product_id,
                    'productQuantity_color' => $color,
                    'productQuantity_size' => $size,
                    'productQuantity' => $quantity,
                    'productQuantity_priceInt' => $priceInt,
                    'productQuantity_priceOut' => $priceOut,
                    'productQuantity_status' => 1,
                ];

                // Thêm mục vào bảng
              $result=  DB::table($this->tableQuantity)->insert($data);
        return $result;

        
    }
    function updateProductQuantityDeatil($size,$color,$quantity,$priceInt,$priceout,  $productQuantity_id)
    {
    
          
                $data = [
                   
                    'productQuantity_color' => $color,
                    'productQuantity_size' => $size,
                    'productQuantity' => $quantity,
                    'productQuantity_priceInt' => $priceInt,
                    'productQuantity_priceOut' => $priceout,
                   
                ];

                // Thêm mục vào bảng
              $result=  DB::table($this->tableQuantity)->where($this->primaryKeyQuantity,$productQuantity_id)->update($data);
        return $result;

        
    }
    public function getListTable($setTable, $setcolumstatus)
    {
        $result = DB::table($setTable)->where($setcolumstatus, 1)->get();
        return $result;
    }

    public function updateproduct($theloai_id, $product_name,$product_code,$brand_product,$baoquan_product,$mota_product,$dacdiem_product, $product_id)
    {
        $data = [
            'product_name' => $product_name,
            'product_code' => $product_code,
            'theloai_id' => $theloai_id,
            'brand_id' => $brand_product,
            'product_mota' => $mota_product,
            'product_dacdiem' => $dacdiem_product,
            'product_baoquan' => $baoquan_product,
        ];
        try {
            $result = DB::table($this->table)->where('product_id', $product_id)->update($data);
            return $result; // Trả về true nếu thành công, false nếu thất bại
        } catch (\Exception $e) {
            return false;
        }
    }
    public function checkDatabase($code)
    {
        return DB::table($this->table)
            ->Where('product_code', $code)
            ->exists();
    }
    public function checkDatabaseIs($name, $product_id)
    {
        return DB::table($this->table)
            ->where('product_name', $name)
            ->where('product_id', '<>', $product_id)
            ->exists();
    }
    public function checkDatabaseQuantity($size,$color, $product_id)
    {
        return DB::table($this->tableQuantity)
            ->where('productQuantity_color', $color)
            ->where('productQuantity_size', $size)
            ->where('product_id', $product_id)
            ->exists();
    }
    public function checkDatabaseIsQuantity($size,$color, $product_id,$productQuantity_id)
    {
        return DB::table($this->tableQuantity)
            ->where('productQuantity_color', $color)
            ->where('productQuantity_size', $size)
            ->where('product_id', $product_id)
            ->where('productQuantity_id', "<>",$productQuantity_id)
            ->exists();
    }
    public function status_toggle($status, $product_id)
    {
        $data['product_status'] = $status;
        try {
            $result =   DB::table($this->table)->where('product_id', $product_id)->update($data);
            return $result; // Trả về true nếu thành công, false nếu thất bại
        } catch (\Exception $e) {
            return false;
        }
    }

    public function status_toggleImg($status, $productImg_id)
    {
        $data['productImg_status'] = $status;
        try {
            $result =   DB::table($this->tableImg)->where($this->primaryKeyImg, $productImg_id)->update($data);
            return $result; // Trả về true nếu thành công, false nếu thất bại
        } catch (\Exception $e) {
            return false;
        }
    }

    public function deleteImg($productImg_id)
    {
  
        try {
            $result =DB::table($this->tableImg)->where($this->primaryKeyImg, $productImg_id)->delete();
            return $result; // Trả về true nếu thành công, false nếu thất bại
        } catch (\Exception $e) {
            return false;
        }
    }

    public function status_toggleQuantity($status, $productQuantity_id)
    {
        $data['productQuantity_status'] = $status;
        try {
            $result =   DB::table($this->tableQuantity)->where($this->primaryKeyQuantity, $productQuantity_id)->update($data);
            return $result; // Trả về true nếu thành công, false nếu thất bại
        } catch (\Exception $e) {
            return false;
        }
    }
    public function getList(){
        $result = DB::table('tbl_product')
        ->join('tbl_theloai', 'tbl_product.theloai_id', '=', 'tbl_theloai.theloai_id')
        ->join('tbl_category', 'tbl_theloai.category_id', '=', 'tbl_category.category_id')
        ->join('tbl_phanloai', 'tbl_theloai.phanloai_id', '=', 'tbl_phanloai.phanloai_id')
        ->select('tbl_product.*',
        'tbl_theloai.theloai_name', 
        'tbl_category.category_name',
         'tbl_phanloai.phanloai_name',)
         ->addSelect($this->getProductImageUrl());
        return $result;
    }
    private function getProductImageUrl() {
        return DB::raw('(SELECT productImg_name FROM tbl_product_img WHERE product_id = tbl_product.product_id ORDER BY productImg_id ASC LIMIT 1) as productImg_name');
    }
    public function showHome($status){
        $result=   DB::table('tbl_producthot')
        ->join('tbl_product', 'tbl_producthot.product_id', '=', 'tbl_product.product_id')
        ->join('tbl_theloai', 'tbl_product.theloai_id', '=', 'tbl_theloai.theloai_id')
        ->join('tbl_category', 'tbl_theloai.category_id', '=', 'tbl_category.category_id')
        ->join('tbl_phanloai', 'tbl_theloai.phanloai_id', '=', 'tbl_phanloai.phanloai_id')
        ->where('tbl_producthot.productHot_status',$status)
        ->select('tbl_product.*','tbl_theloai.theloai_name', 'tbl_category.category_name', 'tbl_phanloai.phanloai_name')->addSelect($this->getProductImageUrl())    
        ->get();
        return $result;
    }
    public function updateShowHome($listProduct)
    {
        try {
            // Lấy danh sách theloai_id từ bảng tbl_theloaishowhome
            $existingIds = DB::table('tbl_producthot')->pluck('product_id')->all();
    
            // Trường hợp 1: Thêm mới bản ghi cho theloai_id chưa tồn tại
            foreach ($listProduct as $product_id) {
                if (!in_array($product_id, $existingIds)) {
                    DB::table('tbl_producthot')->insert([
                        'product_id' => $product_id,
                        'productHot_status' => 1
                    ]);
                }
            }
    
            // Trường hợp 2: Cập nhật trạng thái từ 1 thành 0 nếu không nằm trong listTheLoai
            DB::table('tbl_producthot')
                ->whereNotIn('product_id', $listProduct)
                ->where('productHot_status', 1)
                ->update(['productHot_status' => 0]);
    
            // Trường hợp 3: Cập nhật trạng thái từ 0 thành 1 nếu nằm trong listTheLoai
            DB::table('tbl_producthot')
                ->whereIn('product_id', $listProduct)
                ->where('productHot_status', 0)
                ->update(['productHot_status' => 1]);
    
            // Trường hợp 4: Giữ nguyên trạng thái nếu đã tồn tại và trạng thái đã là 1
    
            return true;
        } catch (\Exception $e) {
            // Xử lý lỗi nếu cần
            return false;
        }
    }
}
