<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Carbon\CarbonInterface;
use App\Models\userModel;

class statisticalModel extends Model
{
    public function selectUser($status = null)
    {
        $query = DB::table('tbl_user');
        if ($status !== null) {
            $query->where('user_status', $status);
        }
        $result = $query;
        return $result;
    }
    public function getListUserFormoney()
    {
        $result = DB::table('tbl_user')
            ->leftJoin('tbl_payment', 'tbl_user.user_id', '=', 'tbl_payment.user_id')
            ->leftJoin('tbl_comment', 'tbl_user.user_id', '=', 'tbl_comment.user_id')
            ->leftJoin('tbl_request_cancellation', 'tbl_user.user_id', '=', 'tbl_request_cancellation.user_id')
            ->select(
                'tbl_user.user_id',
                'tbl_user.user_fullname',
                'tbl_user.created_at',
                DB::raw('COALESCE(SUM(tbl_payment.payment_allPrice), 0) as total_amount'),
                DB::raw('COUNT(DISTINCT tbl_payment.payment_id) as order_count'),
                DB::raw('COALESCE(COUNT(DISTINCT tbl_comment.comment_id), 0) as comment_count'),
                DB::raw('COALESCE(COUNT(DISTINCT CASE WHEN tbl_payment.statusPayment_id = 5 THEN tbl_payment.user_id END), 0) as total_cancel'),
                DB::raw('COALESCE(COUNT(DISTINCT tbl_request_cancellation.request_cancellation_id), 0) as cancel_count')
            )
            ->groupBy(
                'tbl_user.user_id',
                'tbl_user.user_fullname',
                'tbl_user.created_at',
            )
            ->orderByDesc('total_amount')
            ->orderByDesc('order_count')
            ->orderByDesc('comment_count')
            ->orderByDesc('total_cancel')
            ->orderByDesc('cancel_count');
        return $result;
    }


    public function selectProduct($tableName, $colomSelect)
    {
        $result = DB::table($tableName)->select($colomSelect)->distinct()->pluck($colomSelect);
        return $result;
    }
    public function getNoProcess($tableName, $status)
    {
        $result = DB::table($tableName)->where($status, 1);
        return $result;
    }
    public function selectProductList()
    {
        $result = DB::table('tbl_product')
            ->select('product_name', 'product_id')->get();
        return $result;
    }
    public function productSoid() /// hàm lấy danh sách các sản phẩm đã bán
    {
        $result = DB::table('tbl_payment_deatil')
            ->join('tbl_product', 'tbl_payment_deatil.product_id', '=', 'tbl_product.product_id')
            ->join('tbl_payment', 'tbl_payment_deatil.payment_id', '=', 'tbl_payment.payment_id')
            ->select(
                'tbl_payment_deatil.product_id',
                DB::raw('MAX(tbl_product.product_name) as product_name'),
                DB::raw('COUNT(tbl_payment_deatil.product_id) as product_count'), /// lấy số lượt bán
                DB::raw('SUM(tbl_payment_deatil.product_quantity) as total_quantity') /// lấy tổng số lượng
            )
            ->where('tbl_payment.statusPayment_id', 6)
            ->groupBy('tbl_payment_deatil.product_id');

        return $result;
    }
    public function productSoidDeatil($product_id) /// hàm lấy chi tiết sản phẩm đã bán
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
            ->where('tbl_payment.statusPayment_id', 6)
            ->orderBy('tbl_payment_deatil.payment_deatil_id', 'desc');

        return $result;
    }
    public function productSoidDeatilTotal($product_id) /// hàm lấy tính tổng của trang chi tiết sản phẩm đã bán
    {
        $result = DB::table('tbl_payment_deatil')
            ->join('tbl_payment', 'tbl_payment_deatil.payment_id', '=', 'tbl_payment.payment_id')
            ->select(DB::raw('SUM(tbl_payment_deatil.product_quantity) as total_quantity'))
            ->where('tbl_payment_deatil.product_id', $product_id)
            ->whereNotNull('tbl_payment.updated_at')
            ->where('tbl_payment.statusPayment_id', 6)
            ->groupBy('tbl_payment_deatil.product_id')
            ->first();

        return $result->total_quantity ?? 0;
    }
    public function getList()
    {
    }
    public function getTime($value) /// lấy label biểu đồ
    {
        $result = [];

        switch ($value) {
            case "6Mouth":
                $sixMonthsAgo = Carbon::now()->subMonths(6);
                for ($i = 0; $i < 6; $i++) {
                    $result[] = $sixMonthsAgo->translatedFormat('F', CarbonInterface::DIFF_RELATIVE_TO_NOW);
                    $sixMonthsAgo->addMonth();
                }
                break;

            case "yearNow":
                $currentMonth = Carbon::now();
                $monthYearNow = $currentMonth->month;
                $monthToLoop = $currentMonth->copy();

                for ($i = 0; $i < $monthYearNow; $i++) {
                    $result[] = $monthToLoop->translatedFormat('F', CarbonInterface::DIFF_RELATIVE_TO_NOW);
                    $monthToLoop->subMonth();
                }

                $result = array_reverse($result);
                break;

            case "yearAgo":
                $currentYear = Carbon::now()->subYear()->startOfYear();
                for ($i = 0; $i < 12; $i++) {
                    $result[] = $currentYear->copy()->addMonths($i)->translatedFormat('F', CarbonInterface::DIFF_RELATIVE_TO_NOW);
                }
                break;

            case "annualRevenue":
                $currentYear = now()->year;
                for ($i = 0; $i < 5; $i++) {
                    $result[] = $currentYear - $i;
                }
                $result = array_reverse($result);
                break;
        }

        return $result;
    }

    public function getData($value, $product_id) /// lấy số lượng
    {
        $result = [];
        $currentMonth = Carbon::now();

        switch ($value) {
            case "6Mouth":
                $currentMonth->subMonth(); // Bắt đầu từ tháng trước
                for ($i = 0; $i < 6; $i++) {
                    $result[] = $this->getTotalQuantityForMonth($currentMonth, $product_id);
                    $currentMonth->subMonth();
                }
                break;

            case "yearNow":
                $monthYearNow = $currentMonth->month;
                for ($i = 0; $i < $monthYearNow; $i++) {
                    $result[] = $this->getTotalQuantityForMonth($currentMonth, $product_id);
                    $currentMonth->subMonth();
                }
                break;

            case "yearAgo":
                $currentMonth->startOfYear()->subMonth(); // Bắt đầu từ tháng 1 năm ngoái
                for ($i = 0; $i < 12; $i++) {
                    $result[] = $this->getTotalQuantityForMonth($currentMonth, $product_id);
                    $currentMonth->subMonth();
                }
                break;

            case "annualRevenue":
                $currentYear = now()->year;
                for ($i = 0; $i < 5; $i++) {
                    $startOfYear = Carbon::create($currentYear - $i, 1, 1, 0, 0, 0)->startOfYear();
                    $endOfYear = Carbon::create($currentYear - $i, 12, 31, 23, 59, 59)->endOfYear();
                    $result[] = $this->getTotalQuantityForYear($startOfYear, $endOfYear, $product_id);
                }
                break;
        }

        return array_reverse($result);
    }
    public function getDataAll($value) /// lấy số lượng tất cả sản phẩm
    {
        $result = [];
        $currentMonth = Carbon::now();

        switch ($value) {
            case "6Mouth":
                $currentMonth->subMonth(); // Bắt đầu từ tháng trước
                for ($i = 0; $i < 6; $i++) {
                    $result[] = $this->getALLTotalQuantityForMonth($currentMonth);
                    $currentMonth->subMonth();
                }
                break;

            case "yearNow":
                $monthYearNow = $currentMonth->month;
                for ($i = 0; $i < $monthYearNow; $i++) {
                    $result[] = $this->getALLTotalQuantityForMonth($currentMonth);
                    $currentMonth->subMonth();
                }
                break;

            case "yearAgo":
                $currentMonth->startOfYear()->subMonth(); // Bắt đầu từ tháng 1 năm ngoái
                for ($i = 0; $i < 12; $i++) {
                    $result[] = $this->getALLTotalQuantityForMonth($currentMonth);
                    $currentMonth->subMonth();
                }
                break;

            case "annualRevenue":
                $currentYear = now()->year;
                for ($i = 0; $i < 5; $i++) {
                    $startOfYear = Carbon::create($currentYear - $i, 1, 1, 0, 0, 0)->startOfYear();
                    $endOfYear = Carbon::create($currentYear - $i, 12, 31, 23, 59, 59)->endOfYear();
                    $result[] = $this->getTotalAllQuantityForYear($startOfYear, $endOfYear);
                }
                break;
        }

        return array_reverse($result);
    }

    public function getDataPayment($value, $status) /// lấy số lượng
    {
        $result = [];
        $currentMonth = Carbon::now();

        switch ($value) {
            case "6Mouth":
                $currentMonth->subMonth(); // Bắt đầu từ tháng trước
                for ($i = 0; $i < 6; $i++) {
                    $result[] = $this->getPaymentRatio($status, $currentMonth);
                    $currentMonth->subMonth();
                }
                break;

            case "yearNow":
                $monthYearNow = $currentMonth->month;
                for ($i = 0; $i < $monthYearNow; $i++) {
                    $result[] = $this->getPaymentRatio($status, $currentMonth);
                    $currentMonth->subMonth();
                }
                break;

            case "yearAgo":
                $currentMonth->startOfYear()->subMonth(); // Bắt đầu từ tháng 1 năm ngoái
                for ($i = 0; $i < 12; $i++) {
                    $result[] = $this->getPaymentRatio($status, $currentMonth);
                    $currentMonth->subMonth();
                }
                break;

                // case "annualRevenue":
                //     $currentYear = now()->year;
                //     for ($i = 0; $i < 5; $i++) {
                //         $startOfYear = Carbon::create($currentYear - $i, 1, 1, 0, 0, 0)->startOfYear();
                //         $endOfYear = Carbon::create($currentYear - $i, 12, 31, 23, 59, 59)->endOfYear();
                //         $result[] = $this->getTotalQuantityForYear($startOfYear, $endOfYear, $product_id);
                //     }
                //     break;
        }

        return array_reverse($result);
    }
    public function getDataUser($value) /// lọc người dùng các thông tin liên quan đến hóa đơns
    {
        switch ($value) {
            case "moneyMax":
                $result = $this->getUserPayment('desc', 'money');
                break;
            case "moneyMin":
                $result = $this->getUserPayment('asc', 'money');
                break;
            case "billBuyMax":
                $result = $this->getUserPayment('desc', 'bill');
                break;
            case "billBuyMin":
                $result = $this->getUserPayment('asc', 'bill');
                break;
            case "cmtMax":
                $result = $this->getUserPayment('desc', 'comment');
                break;
            case "cmtMin":
                $result = $this->getUserPayment('asc', 'comment');
                break;
            case "billError":
                $result = $this->getUserPayment('desc', 'total_cancel');
                break;
            case "billSuccess":
                $result = $this->getUserPayment('asc', 'total_cancel');
                break;
            case "billCannelMax":
                $result = $this->getUserPayment('desc', 'requestBill');
                break;
            case "billCannelMin":
                $result = $this->getUserPayment('asc', 'requestBill');
                break;
            default:
                // Sắp xếp theo một trường mặc định nếu không khớp với bất kỳ trường nào
                $result = $this->getListUserFormoney();
                break;
        }
        return $result;
    }
    public function getDataUserTime($value)
    {
        switch ($value) {
            case "today":
                $start = now()->startOfDay();
                $end = now()->endOfDay();
                break;
            case "thisweek":
                $start = now()->startOfWeek();
                $end = now()->endOfWeek();
                break;
            case "lastWeek":
                $start = now()->startOfWeek()->subWeek();
                $end = now()->endOfWeek()->subWeek();
                break;
            case "thismonth":
                $start = now()->startOfMonth();
                $end = now()->endOfMonth();
                break;
            case "lastmonth":
                $start = now()->startOfMonth()->subMonth();
                $end = now()->endOfMonth()->subMonth();
                break;
            case "thisyear":
                $start = now()->startOfYear();
                $end = now()->endOfYear();
                break;
            case "lastyear":
                $start = now()->startOfYear()->subYear();
                $end = now()->endOfYear()->subYear();
                break;
            default:
                $result = $this->getListUserFormoney();
                return $result;
        }
    
        $result = $this->getfitterUserTime($start, $end);
        return $result;
    }
    
    public function getUserPayment($order = 'asc', $orderType = 'money')
    {
        $query = DB::table('tbl_user')
            ->leftJoin('tbl_payment', 'tbl_user.user_id', '=', 'tbl_payment.user_id')
            ->leftJoin('tbl_comment', 'tbl_user.user_id', '=', 'tbl_comment.user_id')
            ->leftJoin('tbl_request_cancellation', 'tbl_user.user_id', '=', 'tbl_request_cancellation.user_id')
            ->select(
                'tbl_user.user_id',
                'tbl_user.user_fullname',
                'tbl_user.created_at',
                DB::raw('COALESCE(SUM(tbl_payment.payment_allPrice), 0) as total_amount'),
                DB::raw('COUNT(DISTINCT tbl_payment.payment_id) as order_count'),
                DB::raw('COALESCE(COUNT(DISTINCT tbl_comment.comment_id), 0) as comment_count'),
                DB::raw('COALESCE(COUNT(DISTINCT CASE WHEN tbl_payment.statusPayment_id = 5 THEN tbl_payment.user_id END), 0) as total_cancel'),
                DB::raw('COALESCE(COUNT(DISTINCT tbl_request_cancellation.request_cancellation_id), 0) as cancel_count')
            )
            ->groupBy('tbl_user.user_id', 'tbl_user.user_fullname', 'tbl_user.created_at');
        switch ($orderType) {
            case 'money':
                $query->orderBy('total_amount', $order);
                break;
            case 'bill':
                $query->orderBy('order_count', $order);
                break;
            case 'comment':
                $query->orderBy('comment_count', $order);
                break;
            case 'purchase':
                $query->orderBy('order_count', $order);
                break;
            case 'billCancel':
                $query->orderBy('total_cancel', $order);
                break;
            case 'requestBill':
                $query->orderBy('cancel_count', $order);
                break;
            default:
                $query->orderBy('total_amount', $order);
                break;
        }
        return $query; // Sử dụng get() để lấy kết quả cuối cùng
    }

    public function getfitterUserTime($startOfMonth, $endOfMonth)
    {
        $query = DB::table('tbl_user')
            ->leftJoin('tbl_payment', 'tbl_user.user_id', '=', 'tbl_payment.user_id')
            ->leftJoin('tbl_comment', 'tbl_user.user_id', '=', 'tbl_comment.user_id')
            ->leftJoin('tbl_request_cancellation', 'tbl_user.user_id', '=', 'tbl_request_cancellation.user_id')
            ->select(
                'tbl_user.user_id',
                'tbl_user.user_fullname',
                'tbl_user.created_at',
                DB::raw('COALESCE(SUM(tbl_payment.payment_allPrice), 0) as total_amount'),
                DB::raw('COUNT(DISTINCT tbl_payment.payment_id) as order_count'),
                DB::raw('COALESCE(COUNT(DISTINCT tbl_comment.comment_id), 0) as comment_count'),
                DB::raw('COALESCE(COUNT(DISTINCT CASE WHEN tbl_payment.statusPayment_id = 5 THEN tbl_payment.user_id END), 0) as total_cancel'),
                DB::raw('COALESCE(COUNT(DISTINCT tbl_request_cancellation.request_cancellation_id), 0) as cancel_count')
            )
            ->groupBy('tbl_user.user_id', 'tbl_user.user_fullname', 'tbl_user.created_at')
            ->whereBetween('tbl_user.created_at', [$startOfMonth, $endOfMonth]);
        return $query;
    }

    public function getDataRevenue($value) //// biểu đồ lấy doanh thu
    {
        $result = [];
        $currentMonth = Carbon::now();

        switch ($value) {
            case "6Mouth":
                $currentMonth->subMonth(); // Bắt đầu từ tháng trước
                for ($i = 0; $i < 6; $i++) {
                    $result[] = $this->getTotalMoneyForMonth($currentMonth);
                    $currentMonth->subMonth();
                }
                break;

            case "yearNow":
                $monthYearNow = $currentMonth->month;
                for ($i = 0; $i < $monthYearNow; $i++) {
                    $result[] = $this->getTotalMoneyForMonth($currentMonth);
                    $currentMonth->subMonth();
                }
                break;

            case "yearAgo":
                $currentMonth->startOfYear()->subMonth(); // Bắt đầu từ tháng 1 năm ngoái
                for ($i = 0; $i < 12; $i++) {
                    $result[] = $this->getTotalMoneyForMonth($currentMonth);
                    $currentMonth->subMonth();
                }
                break;

            case "annualRevenue":
                $currentYear = now()->year;
                for ($i = 0; $i < 5; $i++) {
                    $startOfYear = Carbon::create($currentYear - $i, 1, 1, 0, 0, 0)->startOfYear();
                    $endOfYear = Carbon::create($currentYear - $i, 12, 31, 23, 59, 59)->endOfYear();
                    $result[] = $this->getALlMoneyForYear($startOfYear, $endOfYear);
                }
                break;
        }

        return array_reverse($result);
    }
    public function getDataUserStaticalChart($value,$categoryUser) //// biểu đồ lấy doanh thu
    {
        $current = Carbon::now();

        switch ($value) {
            case "6Mouth":
                $current= $current->subMonth(); // Bắt đầu từ tháng trước
                $timeStart = $current->copy()->startOfMonth();
                $timeEnd = $current->copy()->endOfMonth();
                $result = $this->getItemUserChart($categoryUser,$timeStart,$timeEnd);
                break;

            case "yearNow":
                $timeStart=$current->copy()->startOfYear();
                $timeEnd=$current;
                $result = $this->getItemUserChart($categoryUser,$timeStart,$timeEnd);
                break;

                case "yearAgo":
                    $timeStart = $current->copy()->subYear()->startOfYear(); // Bắt đầu từ tháng 1 năm ngoái
                    $timeEnd = $current->copy()->subYear()->endOfYear(); // Kết thúc vào cuối tháng của năm ngoái
                    $result = $this->getItemUserChart($categoryUser, $timeStart, $timeEnd);
                    break;
            
        }

        return $result;
    }
    public function getItemUserChart($categoryUser,$timeStart,$timeEnd){
      
        $result=userModel::where('user_categoryAccount',$categoryUser)->whereBetween('created_at', [$timeStart, $timeEnd]);
        return $result;
    }
    public function getTotalQuantityForMonth($currentMonth, $product_id) //// lấy tổng số lương 1 sản phẩm
    {
        $startOfMonth = $currentMonth->copy()->startOfMonth();
        $endOfMonth = $currentMonth->copy()->endOfMonth();

        // Tính tổng số lượng bán được trong tháng
        return DB::table('tbl_payment_deatil')
            ->join('tbl_payment', 'tbl_payment_deatil.payment_id', '=', 'tbl_payment.payment_id')
            ->where('tbl_payment_deatil.product_id', $product_id)
            ->whereBetween('tbl_payment.updated_at', [$startOfMonth, $endOfMonth])
            ->where('tbl_payment.statusPayment_id', 6)
            ->sum('tbl_payment_deatil.product_quantity');
    }
    public function getALLTotalQuantityForMonth($currentMonth) //// lấy tổng số lương 1 sản phẩm
    {
        $startOfMonth = $currentMonth->copy()->startOfMonth();
        $endOfMonth = $currentMonth->copy()->endOfMonth();

        // Tính tổng số lượng bán được trong tháng
        return DB::table('tbl_payment_deatil')
            ->join('tbl_payment', 'tbl_payment_deatil.payment_id', '=', 'tbl_payment.payment_id')
            ->whereBetween('tbl_payment.updated_at', [$startOfMonth, $endOfMonth])
            ->where('tbl_payment.statusPayment_id', 6)
            ->sum('tbl_payment_deatil.product_quantity');
    }



    public function getTotalAllQuantityForMonth($currentMonth) //// lấy tổng số lương tất cả sản phẩm theo tháng
    {
        $startOfMonth = $currentMonth->copy()->startOfMonth();
        $endOfMonth = $currentMonth->copy()->endOfMonth();

        // Tính tổng số lượng bán được trong tháng
        return DB::table('tbl_payment_deatil')
            ->join('tbl_payment', 'tbl_payment_deatil.payment_id', '=', 'tbl_payment.payment_id')
            ->whereBetween('tbl_payment.updated_at', [$startOfMonth, $endOfMonth])
            ->where('tbl_payment.statusPayment_id', 6)
            ->sum('tbl_payment_deatil.product_quantity');
    }
    public function getTotalMoneyForMonth($currentMonth) /// lất tổng tiền tất cả theo tháng
    {
        $startOfMonth = $currentMonth->copy()->startOfMonth();
        $endOfMonth = $currentMonth->copy()->endOfMonth();

        $totalMoney = DB::table('tbl_payment_deatil')
            ->join('tbl_payment', 'tbl_payment_deatil.payment_id', '=', 'tbl_payment.payment_id')
            ->whereBetween('tbl_payment.updated_at', [$startOfMonth, $endOfMonth])
            ->where('tbl_payment.statusPayment_id', 6)
            ->selectRaw('COALESCE(SUM(tbl_payment_deatil.product_quantity * tbl_payment_deatil.product_price), 0) as total_money')
            ->value('total_money');

        return $totalMoney;
    }

    public function allMoney() //// lấy tổng doanh thu
    {
        return DB::table('tbl_payment_deatil')
            ->join('tbl_payment', 'tbl_payment_deatil.payment_id', '=', 'tbl_payment.payment_id')
            ->selectRaw('SUM(tbl_payment_deatil.product_quantity * tbl_payment_deatil.product_price) as total_money')
            ->where('tbl_payment.statusPayment_id', 6)
            ->value('total_money');
    }
    public function getTotalQuantityForYear($startOfYear, $endOfYear, $product_id) /// tổng số lượng theo năm
    {
        // Tính tổng số lượng bán được trong năm
        return DB::table('tbl_payment_deatil')
            ->join('tbl_payment', 'tbl_payment_deatil.payment_id', '=', 'tbl_payment.payment_id')
            ->where('tbl_payment_deatil.product_id', $product_id)
            ->whereBetween('tbl_payment.updated_at', [$startOfYear, $endOfYear])
            ->where('tbl_payment.statusPayment_id', 6)
            ->sum('tbl_payment_deatil.product_quantity');
    }
    public function getTotalAllQuantityForYear($startOfYear, $endOfYear) /// tổng số lượng theo năm
    {
        // Tính tổng số lượng bán được trong năm
        return DB::table('tbl_payment_deatil')
            ->join('tbl_payment', 'tbl_payment_deatil.payment_id', '=', 'tbl_payment.payment_id')
            ->whereBetween('tbl_payment.updated_at', [$startOfYear, $endOfYear])
            ->where('tbl_payment.statusPayment_id', 6)
            ->sum('tbl_payment_deatil.product_quantity');
    }
    public function getALlTotalQuantityForYear($startOfYear, $endOfYear)
    {
        // Tính tổng số lượng bán được trong năm
        return DB::table('tbl_payment_deatil')
            ->join('tbl_payment', 'tbl_payment_deatil.payment_id', '=', 'tbl_payment.payment_id')
            ->whereBetween('tbl_payment.updated_at', [$startOfYear, $endOfYear])
            ->where('tbl_payment.statusPayment_id', 6)
            ->sum('tbl_payment_deatil.product_quantity');
    }
    public function getALlMoneyForYear($startOfYear, $endOfYear)
    {
        // Tính tổng số lượng bán được trong năm
        return DB::table('tbl_payment_deatil')
            ->join('tbl_payment', 'tbl_payment_deatil.payment_id', '=', 'tbl_payment.payment_id')
            ->whereBetween('tbl_payment.updated_at', [$startOfYear, $endOfYear])
            ->where('tbl_payment.statusPayment_id', 6)
            ->selectRaw('COALESCE(SUM(tbl_payment_deatil.product_quantity * tbl_payment_deatil.product_price), 0) as total_money')
            ->value('total_money');
    }
    ///////////////////////
    public function compareProduct($product_id, $comparison_Id, $category_val)
    {
        $result = [];
        $currentMonth = Carbon::now()->subMonth()->startOfMonth(); // Bắt đầu từ tháng trước

        for ($i = 0; $i < 6; $i++) {
            $startOfMonth = $currentMonth->copy()->subMonths($i)->startOfMonth();
            $endOfMonth = $currentMonth->copy()->subMonths($i)->endOfMonth();

            // Tính tổng số lượng bán được trong tháng cho product_id
            $totalQuantityProduct = DB::table('tbl_payment_deatil')
                ->join('tbl_payment', 'tbl_payment_deatil.payment_id', '=', 'tbl_payment.payment_id')
                ->where('tbl_payment_deatil.product_id', $product_id)
                ->whereBetween('tbl_payment.updated_at', [$startOfMonth, $endOfMonth])
                ->where('tbl_payment.statusPayment_id', 6)
                ->sum('tbl_payment_deatil.product_quantity');

            // Tính tổng số lượng bán được trong tháng cho comparison_Id
            $totalQuantityComparison = DB::table('tbl_payment_deatil')
                ->join('tbl_payment', 'tbl_payment_deatil.payment_id', '=', 'tbl_payment.payment_id')
                ->where('tbl_payment_deatil.product_id', $comparison_Id)
                ->whereBetween('tbl_payment.updated_at', [$startOfMonth, $endOfMonth])
                ->where('tbl_payment.statusPayment_id', 6)
                ->sum('tbl_payment_deatil.product_quantity');

            // Thêm các giá trị vào mảng kết quả
            $result[0][] = $totalQuantityProduct;
            $result[1][] = $totalQuantityComparison;
        }

        $result = array_reverse($result);
        return $result;
    }
    public function getRecentMonths($value = null)
    {
        $result = [];
        $value = $value ?? "6Mouth";
        $currentMonth = Carbon::now();

        switch ($value) {
            case "6Mouth":
                $result = $this->getRecentMonthsForLastSixMonths($currentMonth->subMonth());
                break;

            case "yearNow":
                $result = $this->getRecentMonthsForCurrentYear($currentMonth);
                break;

            case "yearAgo":
                $result = $this->getRecentMonthsForLastYear($currentMonth);
                break;

            case "annualRevenue":
                $result = $this->getAnnualRevenueData($currentMonth);

                break;
        }
        $result = array_reverse($result);
        return $result;
    }

    protected function getRecentMonthsForLastSixMonths($currentMonth)
    {
        $result = [];
        $sixMonthsAgo = Carbon::now()->subMonths(6);

        for ($i = 1; $i <= 6; $i++) {
            $result[] = $this->createMonthlyDataObject($currentMonth);
            $currentMonth->subMonth();
            $sixMonthsAgo->addMonth();
        }

        return array_reverse($result);
    }


    protected function getRecentMonthsForCurrentYear($currentMonth)
    {
        $result = [];
        $monthYearNow = $currentMonth->month;

        for ($i = 0; $i < $monthYearNow; $i++) {
            $result[] = $this->createMonthlyDataObject($currentMonth);
            $currentMonth->subMonth();
        }

        return array_reverse($result);
    }

    protected function getRecentMonthsForLastYear($currentMonth)
    {
        $result = [];
        $currentYear = Carbon::now()->subYear()->startOfYear();

        for ($i = 0; $i < 12; $i++) {
            $result[] = $this->createMonthlyDataObject($currentYear->copy()->addMonths($i));
        }

        return array_reverse($result);
    }

    protected function getAnnualRevenueData($currentMonth)
    {
        $result = [];
        $currentYear = now()->year;

        for ($i = 0; $i < 5; $i++) {
            $year = $currentYear - $i;
            $endMonth = ($year == now()->year) ? now()->month : 12;

            for ($month = $endMonth; $month >= 1; $month--) {
                $currentMonth = Carbon::createFromDate($year, $month, 1);
                $result[] = $this->createMonthlyDataObject($currentMonth);
            }
        }

        return array_reverse($result);
    }

    protected function createMonthlyDataObject($currentMonth, $sixMonthsAgo = null)
    {
        return (object)[
            'month_name' => $sixMonthsAgo ? $sixMonthsAgo->translatedFormat('F, Y') : $currentMonth->translatedFormat('F, Y'),
            'total' => $this->getTotalAllQuantityForMonth($currentMonth),
            'money' => $this->getTotalMoneyForMonth($currentMonth)
        ];
    }
    public function getProduct1st($limit = null, $isGetArray = null)
    {
        $currentMonth = Carbon::now();
        $startOfMonth = $currentMonth->copy()->startOfMonth();
        $endOfMonth = $currentMonth->copy()->endOfMonth();
        $limit = $limit ?? 10;
        $result = [];

        $query = DB::table('tbl_payment_deatil')
            ->select(
                'tbl_product.product_name',
                'tbl_product.product_id',
                'tbl_product.product_code',
                DB::raw('SUM(tbl_payment_deatil.product_quantity) as total_quantity')
            )
            ->join('tbl_product', 'tbl_payment_deatil.product_id', '=', 'tbl_product.product_id')
            ->join('tbl_payment', 'tbl_payment_deatil.payment_id', '=', 'tbl_payment.payment_id')
            ->whereBetween('tbl_payment.updated_at', [$startOfMonth, $endOfMonth])
            ->groupBy('tbl_product.product_id', 'tbl_product.product_name', 'tbl_product.product_code')
            ->orderByDesc('total_quantity')
            ->limit($limit);

        if ($isGetArray && $isGetArray !== null && $isGetArray === true) {
            $query->addSelect(
                DB::raw(
                    'GROUP_CONCAT(DISTINCT CONCAT(product_quantity, " - ", product_size, " - ", product_color)) as variants'
                )
            );
        }

        $maxTotalRevenueItems = $query->get();

        foreach ($maxTotalRevenueItems as $item) {
            array_push($result, $item);
        }

        return $result;
    }



    public function getPaymentRatio($status, $current)
    {

        $startOfMonth = $current->copy()->startOfMonth();
        $endOfMonth = $current->copy()->endOfMonth();
        $result = DB::table('tbl_payment')
            ->where('statusPayment_id', $status)
            ->whereBetween('updated_at', [$startOfMonth, $endOfMonth])
            ->count();
        return $result;
    }
}
