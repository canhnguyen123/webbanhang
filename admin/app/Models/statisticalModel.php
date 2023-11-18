<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Carbon\CarbonInterface;
use App\Invoice;

class statisticalModel extends Model
{
    public function selectProduct($tableName, $colomSelect)
    {
        $result = DB::table($tableName)->select($colomSelect)->distinct()->pluck($colomSelect);
        return $result;
    }
    public function productSoid()
    {
        $result = DB::table('tbl_payment_deatil')
            ->join('tbl_product', 'tbl_payment_deatil.product_id', '=', 'tbl_product.product_id')
            ->select(
                'tbl_payment_deatil.product_id',
                DB::raw('MAX(tbl_product.product_name) as product_name'),
                DB::raw('COUNT(tbl_payment_deatil.product_id) as product_count'),
                DB::raw('SUM(tbl_payment_deatil.product_quantity) as total_quantity')
            )
            ->groupBy('tbl_payment_deatil.product_id');

        return $result;
    }
    public function productSoidDeatil($product_id)
    {
        $result = DB::table('tbl_payment_deatil')
            ->join('tbl_product', 'tbl_payment_deatil.product_id', '=', 'tbl_product.product_id')
            ->join('tbl_payment', 'tbl_payment_deatil.payment_id', '=', 'tbl_payment.payment_id')
            ->select(
                'tbl_payment_deatil.product_quantity',
                'tbl_payment.updated_at',
                'tbl_payment.created_at',
                'tbl_payment.payment_id',
                'tbl_payment.payment_code',
                'tbl_payment_deatil.product_id',
                'tbl_payment_deatil.product_size',
                'tbl_payment_deatil.product_color',
            )
            ->whereNotNull('tbl_payment.updated_at')
            ->where('tbl_payment_deatil.product_id', $product_id)
            ->orderBy('tbl_payment_deatil.payment_deatil_id', 'desc');

        return $result;
    }
    public function productSoidDeatilTotal($product_id)
    {
        $result = DB::table('tbl_payment_deatil')
            ->join('tbl_payment', 'tbl_payment_deatil.payment_id', '=', 'tbl_payment.payment_id')
            ->select(DB::raw('SUM(tbl_payment_deatil.product_quantity) as total_quantity'))
            ->where('tbl_payment_deatil.product_id', $product_id)
            ->whereNotNull('tbl_payment.updated_at')
            ->groupBy('tbl_payment_deatil.product_id')
            ->first();

        return $result->total_quantity ?? 0;
    }
    public function sixMonth()
    {
        $sixMonthsAgo = Carbon::now()->subMonths(6);

        $monthArray = [];

        for ($i = 0; $i < 6; $i++) {
            $monthArray[] = $sixMonthsAgo->translatedFormat('F', CarbonInterface::DIFF_RELATIVE_TO_NOW);
            $sixMonthsAgo->addMonth();
        }

        return $monthArray;
    }
    public function yearNow()
    {
        $currentMonth = Carbon::now();
        $monthYearNow = $currentMonth->month;
        $monthArray = [];

        // Tạo một bản sao của tháng hiện tại để không ảnh hưởng đến tháng hiện tại
        $monthToLoop = $currentMonth->copy();

        for ($i = 0; $i < $monthYearNow; $i++) {
            $monthArray[] = $monthToLoop->translatedFormat('F', CarbonInterface::DIFF_RELATIVE_TO_NOW);

            // Giảm giá trị của tháng hiện tại sau mỗi vòng lặp
            $monthToLoop->subMonth();
        }

        $monthArray = array_reverse($monthArray);
        return $monthArray;
    }
    public function lastYear()
    {
        $currentYear = Carbon::now()->subYear()->startOfYear(); // Bắt đầu từ đầu năm ngoái

        $monthArray = [];

        for ($i = 0; $i < 12; $i++) {
            $monthArray[] = $currentYear->copy()->addMonths($i)->translatedFormat('F', CarbonInterface::DIFF_RELATIVE_TO_NOW);
        }

        return $monthArray;
    }


    public function sixMonthQuantity($product_id)

    {
        $result = [];
        $currentMonth = Carbon::now()->subMonth()->startOfMonth(); // Bắt đầu từ tháng trước

        for ($i = 0; $i < 6; $i++) {
            $startOfMonth = $currentMonth->copy()->subMonths($i)->startOfMonth();
            $endOfMonth = $currentMonth->copy()->subMonths($i)->endOfMonth();

            // Tính tổng số lượng bán được trong tháng
            $totalQuantity = DB::table('tbl_payment_deatil')
                ->join('tbl_payment', 'tbl_payment_deatil.payment_id', '=', 'tbl_payment.payment_id')
                ->where('tbl_payment_deatil.product_id', $product_id)
                ->whereBetween('tbl_payment.updated_at', [$startOfMonth, $endOfMonth])
                ->sum('tbl_payment_deatil.product_quantity');

            array_push($result, $totalQuantity);
        }
        $result = array_reverse($result);
        return $result;
    }

    public function yearNowQuantity($product_id)
    {
        $currentMonth = Carbon::now();
        $monthYearNoew = $currentMonth->month;
        $result = [];
        for ($i = 0; $i < $monthYearNoew; $i++) {
            $startOfMonth = $currentMonth->copy()->subMonths($i)->startOfMonth();
            $endOfMonth = $currentMonth->copy()->subMonths($i)->endOfMonth();

            // Tính tổng số lượng bán được trong tháng
            $totalQuantity = DB::table('tbl_payment_deatil')
                ->join('tbl_payment', 'tbl_payment_deatil.payment_id', '=', 'tbl_payment.payment_id')
                ->where('tbl_payment_deatil.product_id', $product_id)
                ->whereBetween('tbl_payment.updated_at', [$startOfMonth, $endOfMonth])
                ->sum('tbl_payment_deatil.product_quantity');

            array_push($result, $totalQuantity);
        }
        $result = array_reverse($result);
        return $result;
    }

    public function lastYearQuantity($product_id)
    {
        $currentMonth = Carbon::now()->startOfYear()->subMonth(); // Bắt đầu từ tháng 1 năm ngoái
        $result = [];
    
        for ($i = 0; $i < 12; $i++) {
            $startOfMonth = $currentMonth->copy()->startOfMonth();
            $endOfMonth = $currentMonth->copy()->endOfMonth();
    
            // Tính tổng doanh thu trong tháng
            $totalQuantity = DB::table('tbl_payment_deatil')
                ->join('tbl_payment', 'tbl_payment_deatil.payment_id', '=', 'tbl_payment.payment_id')
                ->whereBetween('tbl_payment.updated_at', [$startOfMonth, $endOfMonth])
                ->where('tbl_payment_deatil.product_id', $product_id)
                ->sum('tbl_payment_deatil.product_quantity');
    
            // Tạo cặp key-value và thêm vào mảng
            array_push($result, $totalQuantity);
    
            // Giảm giá trị của tháng hiện tại sau mỗi vòng lặp
            $currentMonth->subMonth();
        }
    
        return array_reverse($result);
    }
    
}
