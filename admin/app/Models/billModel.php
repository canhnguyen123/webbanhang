<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
class billModel extends Model
{
    protected $table = 'tbl_payment'; 
    protected $primaryKey = 'payment_id'; 
    protected $tableCanneBil = 'tbl_request_cancellation'; 
    protected $primaryKeyCanneBil = 'request_cancellation_id'; 
    protected $statusCanneBill = 5; 
    public function get1($bill_id){
       $result= DB::table($this->table)->where($this->primaryKey, $bill_id);
       return $result;
    } 
    public function getDeatil($payment_id){
        $result= DB::table($this->table)
        ->join('tbl_user','tbl_payment.user_id','=','tbl_user.user_id')
        ->join('tbl_methodpayment','tbl_payment.methodPayment_id','=','tbl_methodpayment.methodPayment_id')
        ->join('tbl_statuspayment','tbl_payment.statusPayment_id','=','tbl_statuspayment.statusPayment_id')
        ->select('tbl_payment.*','tbl_user.*','tbl_methodpayment.methodPayment_name','tbl_statuspayment.statusPayment_name')
        ->where('tbl_payment.payment_id', $payment_id);
       return $result;
    }
    public function getCanneBill(){
        $result= DB::table("tbl_request_cancellation")
        ->join('tbl_user','tbl_request_cancellation.user_id','=','tbl_user.user_id')
        ->join('tbl_payment','tbl_request_cancellation.payment_id','=','tbl_payment.payment_id')
        ->select('tbl_user.user_username','tbl_user.user_fullname','tbl_user.user_id',
                'tbl_payment.payment_code','tbl_payment.payment_id',
                'tbl_request_cancellation.request_cancellation_id',
                'tbl_request_cancellation.request_cancellation_status',
                'tbl_request_cancellation.request_cancellation_mess',
                'tbl_request_cancellation.create_at')
        ->orderBy('tbl_request_cancellation.create_at', 'desc')
        ->orderBy('tbl_request_cancellation.request_cancellation_status', 'desc') ;
       return $result;
    }
    public function getPaymentDeatil($payment_id){
        $result = DB::table('tbl_payment_deatil')
            ->join('tbl_payment', 'tbl_payment_deatil.payment_id', '=', 'tbl_payment.payment_id')
            ->join('tbl_product', 'tbl_payment_deatil.product_id', '=', 'tbl_product.product_id')
            ->leftJoin('tbl_product_quantity', function ($join) {
                $join->on('tbl_product_quantity.product_id', '=', 'tbl_payment_deatil.product_id')
                     ->on('tbl_product_quantity.productQuantity_size', '=', 'tbl_payment_deatil.product_size')
                     ->on('tbl_product_quantity.productQuantity_color', '=', 'tbl_payment_deatil.product_color');
            })
            ->select('tbl_payment_deatil.*', 'tbl_product.product_name', 'tbl_product.product_code', 'tbl_product_quantity.productQuantity_priceOut')
            ->where('tbl_payment_deatil.payment_id', $payment_id);
        return $result;
    }
    
    public function getDataTabel($table,$status){
        $result =DB::table($table)->where($status,1);
        return $result;
    }
    public function updatebrand($name, $code,$brand_id)
    {
        $data = [
            'brand_name' => $name,
            'brand_code' => $code,
        ];
        try {
            $result = DB::table($this->table)->where('brand_id',$brand_id)->update($data);
            return $result; // Trả về true nếu thành công, false nếu thất bại
        } catch (\Exception $e) {
            return false;
        }
    }
    public function updateStatusCanneBill($id)
    {
        $data = [
            'request_cancellation_status' => 0,
        ];
        try {
            $result = DB::table($this->tableCanneBil)->where($this->primaryKeyCanneBil,$id)->update($data);
            return $result; // Trả về true nếu thành công, false nếu thất bại
        } catch (\Exception $e) {
            return false;
        }
    }
    public function updatePaymentStatus($id)
    {
        $data = [
            'statusPayment_id' => $this->statusCanneBill,
        ];
        try {
            $result = DB::table($this->table)->where($this->primaryKey,$id)->update($data);
            return $result; // Trả về true nếu thành công, false nếu thất bại
        } catch (\Exception $e) {
            return false;
        }
    }
    public function updateAction($status, $bill_id,$note = null, $code = null,  $localtion = null)
{
    $data = [
        'statusPayment_id' => $status
    ];

    if ($code !== null) {
        $data['payment_code'] = $code;
    }

    if ($note !== null) {
        $data['payment_note'] = $note;
    }

    if ($localtion !== null) {
        $data['payment_localtion'] = $localtion;
    }
    if ($status === 4) {
        $data['isPayment'] = 1;
    }
    if ($status === 6) {
        $data['updated_at'] = Carbon::now();
    }
    try {
        $result = DB::table($this->table)->where($this->primaryKey, $bill_id)->update($data);
        return $result; // Trả về true nếu thành công, false nếu thất bại
    } catch (\Exception $e) {
        return false;
    }
}

    public function updateQuantity($bill_id){
        $getQuantity=DB::table('tbl_payment_deatil')->select('product_id','product_quantity','product_size','product_color')->where('payment_id',$bill_id);
        $select=$getQuantity->get();
        $count=$getQuantity->count();
        foreach($select as $item){
            $getQuantityOld=DB::table('tbl_product_quantity')
            ->select('productQuantity')
            ->where('product_id',$item->product_id)
            ->where('productQuantity_size',$item->product_size)
            ->where('productQuantity_color',$item->product_color)->first();
            $data=[
                'productQuantity'=>$getQuantityOld->productQuantity -$item->product_quantity
            ];
            DB::table('tbl_product_quantity')
            ->where('productQuantity_size',$item->product_size)
            ->where('productQuantity_color',$item->product_color)
            ->where('product_id',$item->product_id)
            ->update($data);
            $count--;
        }
        if($count===0){
            return true;
        }
        else{
            return false;
        }
       
    }
public function createNotification($user_id,$mess)
{
    $data = [
        'user_id' => $user_id,
        'notification_mess' => $mess,
        'notification_category' => "Thông báo đơn hàng",
        'notification_status' => 1,
        'created_at' => Carbon::now(),
    ];  

   

    try {
        $result = DB::table('tbl_notification')->insert($data);
        return $result; // Trả về true nếu thành công, false nếu thất bại
    } catch (\Exception $e) {
        return false;
    }
}
    public function checkDatabaseIs($code, $brand_id) {
        return DB::table($this->table)
            ->where('brand_code', $code)
            ->where('brand_id', '<>', $brand_id)
            ->exists();
    }
    public function status_toggle($status,$brand_id){
        $data['brand_status']=$status;
        try {
            $result =   DB::table($this->table)->where('brand_id',$brand_id)->update($data); 
            return $result; // Trả về true nếu thành công, false nếu thất bại
        } catch (\Exception $e) {
            return false;
        }
    }
}
