<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Carbon\CarbonInterface;
class statisticalModel extends Model
{
    public function selectProduct($tableName,$colomSelect){
        $result =DB::table($tableName)->select($colomSelect)->distinct()->pluck($colomSelect);
        return $result;
    }
    public function productSoid(){
        $result = DB::table('tbl_payment_deatil')
            ->join('tbl_product', 'tbl_payment_deatil.product_id', '=', 'tbl_product.product_id')
            ->select('tbl_payment_deatil.product_id', 
                DB::raw('MAX(tbl_product.product_name) as product_name'), 
                DB::raw('COUNT(tbl_payment_deatil.product_id) as product_count'),
                DB::raw('SUM(tbl_payment_deatil.product_quantity) as total_quantity'))
            ->groupBy('tbl_payment_deatil.product_id');
        
        return $result;
    }
    public function productSoidDeatil($product_id){
        $result = DB::table('tbl_payment_deatil')
            ->join('tbl_product', 'tbl_payment_deatil.product_id', '=', 'tbl_product.product_id')
            ->join('tbl_payment', 'tbl_payment_deatil.payment_id', '=', 'tbl_payment.payment_id')
            ->select('tbl_payment_deatil.product_quantity',
                     'tbl_payment.updated_at',
                     'tbl_payment.created_at',
                     'tbl_payment.payment_id',
                     'tbl_payment.payment_code',
                     'tbl_payment_deatil.product_id',
                     'tbl_payment_deatil.product_size',
                     'tbl_payment_deatil.product_color',)
            ->whereNotNull('tbl_payment.updated_at')
            ->where('tbl_payment_deatil.product_id',$product_id)
            ;
        
        return $result;
    }
    public function productSoidDeatilTotal($product_id) {
        $result = DB::table('tbl_payment_deatil')
            ->join('tbl_payment', 'tbl_payment_deatil.payment_id', '=', 'tbl_payment.payment_id')
            ->select(DB::raw('SUM(tbl_payment_deatil.product_quantity) as total_quantity'))
            ->where('tbl_payment_deatil.product_id', $product_id)
            ->whereNotNull('tbl_payment.updated_at')
            ->groupBy('tbl_payment_deatil.product_id')
            ->first();
    
        return $result->total_quantity ?? 0;
    }
    public function sixMonth(){
        $sixMonthsAgo = Carbon::now()->subMonths(6);

        $monthArray = [];
    
        for ($i = 0; $i < 6; $i++) {
            $monthArray[] = $sixMonthsAgo->translatedFormat('F', CarbonInterface::DIFF_RELATIVE_TO_NOW); 
            $sixMonthsAgo->addMonth(); 
        }
    
        return $monthArray;
    }
}
