<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AjaxModel extends Model
{
    function search_ajax($table_name, $colum_name, $input)
    {
        $results = DB::table($table_name)
            ->where($colum_name, 'LIKE', '%' . $input . '%')
            ->get();
        return $results;
    }
    function search_ajax2Colum($table_name, $colum_name1, $colum_name2, $input)
    {
        $results = DB::table($table_name)
            ->where($colum_name1, 'LIKE', '%' . $input . '%')
            ->orwhere($colum_name2, 'LIKE', '%' . $input . '%')
            ->get()
           ;
        return $results;
    }
    function search_ajaxCount($table_name, $colum_name, $input)
    {
        $results = DB::table($table_name)
            ->where($colum_name, 'LIKE', '%' . $input . '%')
            ->count();
        return $results;
    }
    function search_ajaxCount2Colum($table_name, $colum_name1, $colum_name2, $input)
    {
        $results = DB::table($table_name)
            ->where($colum_name1, 'LIKE', '%' . $input . '%')
            ->orwhere($colum_name2, 'LIKE', '%' . $input . '%')
            ->count();
        return $results;
    }
    function search_ajaxTheloaisCount($table_name, $colum_name1, $colum_name2, $input)
    {
        $results = DB::table($table_name)
            ->where($colum_name1, 'LIKE', '%' . $input . '%')
            ->orWhere($colum_name2, 'LIKE', '%' . $input . '%')
            ->count();
        return $results;
    }
    function search_ajax_theloai($table_name, $input)
    {
        $results = DB::table($table_name)
            ->join('tbl_category', 'tbl_theloai.category_id', '=', 'tbl_category.category_id')
            ->join('tbl_phanloai', 'tbl_theloai.phanloai_id', '=', 'tbl_phanloai.phanloai_id')
            ->select('tbl_theloai.*', 'tbl_category.category_name', 'tbl_phanloai.phanloai_name')
            ->where('tbl_theloai.theloai_name', 'LIKE', '%' . $input . '%')
            ->orWhere('tbl_theloai.theloai_code', 'LIKE', '%' . $input . '%')
            ->get();
        return $results;
    }

    function search_ajax_product($table_name, $input)
{
    $results = DB::table($table_name)
        ->where('product_name', 'LIKE', '%' . $input . '%')
        ->orWhere('product_code', 'LIKE', '%' . $input . '%')
        ; // Hoặc sử dụng ->paginate() nếu muốn phân trang dữ liệu
    return $results;
}

    function loadmore_ajax($table_name, $primary_id, $last_id)
    {
        $results = DB::table($table_name)
            ->where($primary_id, '>', $last_id)
            ->orderBy($primary_id, 'asc');
        return $results;
    }

    function returnTable_ajax($table_name, $primary_id)
    {
        $results = DB::table($table_name)
            ->orderBy($primary_id, 'asc')
            ->paginate(5);
        return $results;
    }
    function returnTable_ajaxP($table_name, $primary_id)
    {
        $results = DB::table($table_name)
            ->orderBy($primary_id, 'asc');
        return $results;
    }
    function returnTableTheLoai_ajax($table_name, $primary_id)
    {
        $results =  DB::table($table_name)
            ->join('tbl_category', 'tbl_theloai.category_id', '=', 'tbl_category.category_id')
            ->join('tbl_phanloai', 'tbl_theloai.phanloai_id', '=', 'tbl_phanloai.phanloai_id')
            ->select('tbl_theloai.*', 'tbl_category.category_name', 'tbl_phanloai.phanloai_name')
            ->orderBy($primary_id, 'asc')
            ->paginate(15);
        return $results;
    }
    function select_theloai($category_id, $phanloai_id, $status)
    {

        $query = DB::table('tbl_theloai')
            ->join('tbl_category', 'tbl_theloai.category_id', '=', 'tbl_category.category_id')
            ->join('tbl_phanloai', 'tbl_theloai.phanloai_id', '=', 'tbl_phanloai.phanloai_id')
            ->select('tbl_theloai.*', 'tbl_category.category_name', 'tbl_phanloai.phanloai_name')
            ->where('tbl_theloai.category_id', $category_id)
            ->where('tbl_theloai.phanloai_id', $phanloai_id);

        if ($status !== "all") {
            $query->where('tbl_theloai.theloai_status', $status); // Sửa ở đây
        }

        $results = $query->get();
        return $results;
    }

    function select_theloaiProduct($category_id, $phanloai_id)
    {

        $results = DB::table('tbl_theloai')
            ->join('tbl_category', 'tbl_theloai.category_id', '=', 'tbl_category.category_id')
            ->join('tbl_phanloai', 'tbl_theloai.phanloai_id', '=', 'tbl_phanloai.phanloai_id')
            ->select('tbl_theloai.*', 'tbl_category.category_name', 'tbl_phanloai.phanloai_name')
            ->where('tbl_theloai.category_id', $category_id)
            ->where('tbl_theloai.phanloai_id', $phanloai_id)
            ->get();
        return $results;
    }
    function count_select_theloai($category_id, $phanloai_id, $status)
    {
        $query = DB::table('tbl_theloai')
            ->where('category_id', $category_id)
            ->where('phanloai_id', $phanloai_id);

        if ($status !== "all") {
            $query->where('theloai_status', $status);
        }

        $results = $query->count();
        return $results;
    }
    function filter_product($theloai_id, $status, $brand_id)
    {
        $query = DB::table('tbl_product');

        if ($theloai_id !== "all") {
            $query->where('tbl_product.theloai_id', $theloai_id);
        }

        if ($status !== "all") {
            $query->where('tbl_product.product_status', $status);
        }

        if ($brand_id !== "all") {
            $query->where('tbl_product.brand_id', $brand_id);
        }

        $results = $query->get();
        return $results;
    }
    function count_filter_product($theloai_id, $status, $brand_id)
    {
        $query = DB::table('tbl_product');

        if ($theloai_id !== "all") {
            $query->where('tbl_product.theloai_id', $theloai_id);
        }

        if ($status !== "all") {
            $query->where('tbl_product.product_status', $status);
        }

        if ($brand_id !== "all") {
            $query->where('tbl_product.brand_id', $brand_id);
        }

        $results = $query->count();
        return $results;
    }
    function filter_productPlus($theloaiId, $status, $brandId, $colorProduct, $sizeProduct, $startPrice, $endPrice, $startQuantity, $endQuantity) {
        $query = DB::table('tbl_product')
            ->select('tbl_product.*')
            ->join('tbl_product_quantity', 'tbl_product.product_id', '=', 'tbl_product_quantity.product_id')
            ->whereBetween('tbl_product_quantity.productQuantity_priceOut', [$startPrice, $endPrice])
            ->whereBetween('tbl_product_quantity.productQuantity', [$startQuantity, $endQuantity])
            ->where(function($q) use ($theloaiId) {
                if ($theloaiId !== "all") {
                    $q->where('tbl_product.theloai_id', $theloaiId);
                }
            })
            ->where(function($q) use ($status) {
                if ($status !== "all") {
                    $q->where('tbl_product.product_status', $status);
                }
            })
            ->where(function($q) use ($brandId) {
                if ($brandId !== "all") {
                    $q->where('tbl_product.brand_id', $brandId);
                }
            })
            ->where(function($q) use ($colorProduct) {
                if ($colorProduct !== "all") {
                    $q->where('tbl_product_quantity.productQuantity_color', $colorProduct);
                }
            })
            ->where(function($q) use ($sizeProduct) {
                if ($sizeProduct !== "all") {
                    $q->where('tbl_product_quantity.productQuantity_size', $sizeProduct);
                }
            })
            ->distinct(); // Ensure product_id is not null
        
        return $query;
    }
    
   
}
