<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AjaxModel;

class AjaxController extends Controller
{
    private $ajaxModel;

    public function __construct(AjaxModel $ajaxModel)
    {
        $this->ajaxModel = $ajaxModel;
    }

    private function phanloaiParams()
    {
        return [
            'table_name' => 'tbl_phanloai',
            'colum_name' => 'phanloai_name',
            'primary_id' => 'phanloai_id',
        ];
    }
    private function brandParams()
    {
        return [
            'table_name' => 'tbl_brand',
            'colum_name1' => 'brand_name',
            'colum_name2' => 'brand_code',
            'primary_id' => 'brand_id',
        ];
    }
    private function voucherParams()
    {
        return [
            'table_name' => 'tbl_voucher',
            'colum_name1' => 'voucher_name',
            'colum_name2' => 'voucher_code',
            'primary_id' => 'voucher_id',
        ];
    }
    private function userParams()
    {
        return [
            'table_name' => 'tbl_user',
            'colum_name1' => 'user_username',
            'colum_name2' => 'user_fullname',
            'primary_id' => 'user_id',
        ];
    }
    private function methodPaymentParams()
    {
        return [
            'table_name' => 'tbl_methodPayment',
            'colum_name1' => 'methodPayment_name',
            'colum_name2' => 'methodPayment_code',
            'primary_id' => 'methodPayment_id',
        ];
    }
    private function statusPaymentParams()
    {
        return [
            'table_name' => 'tbl_statusPayment',
            'colum_name1' => 'statusPayment_name',
            'colum_name2' => 'statusPayment_code',
            'primary_id' => 'statusPayment_id',
        ];
    }
    private function positionParams()
    {
        return [
            'table_name' => 'tbl_position',
            'colum_name1' => 'position_name',
            'colum_name2' => 'position_code',
            'primary_id' => 'position_id',
        ];
    }
    private function staffParams()
    {
        return [
            'table_name' => 'tbl_staff',
            'colum_name1' => 'staff_fullname',
            'colum_name2' => 'staff_username',
            'primary_id' => 'staff_id',
        ];
    }
    private function theloaiParams()
    {
        return [
            'table_name' => 'tbl_theloai',
            'colum_name1' => 'theloai_name',
            'colum_name2' => 'theloai_code',
            'primary_id' => 'theloai_id',
        ];
    }
    private function productParams()
    {
        return [
            'table_name' => 'tbl_product',
            'colum_name1' => 'product_name',
            'colum_name2' => 'product_code',
            'primary_id' => 'product_id',
        ];
    }
    private function categoryParams()
    {
        return [
            'table_name' => 'tbl_category',
            'colum_name' => 'category_name',
            'primary_id' => 'category_id',
        ];
    }

    private function sizeParams()
    {
        return [
            'table_name' => 'tbl_size',
            'colum_name' => 'size_name',
            'primary_id' => 'size_id',
        ];
    }
    private function colorParams()
    {
        return [
            'table_name' => 'tbl_color',
            'colum_name' => 'color_name',
            'primary_id' => 'color_id',
        ];
    }
    public function category_seach(Request $request)
    {
        $input = $request->input('content');
        $params = $this->categoryParams();
        $results = $this->ajaxModel->search_ajax($params['table_name'], $params['colum_name'], $input);
        $count = $this->ajaxModel->search_ajaxCount($params['table_name'], $params['colum_name'], $input);
        $i = 1;
        return response()->json([
            'view' => view('ohther.ajax.admin.category_list')->with('list_category', $results)->with('i', $i)->render(),
            'counMess' => "Có " . $count . " kết quả trả về",

        ]);
    }

    public function category_loadmore(Request $request)
    {
        $last_stt = $request->input('stt');
        $last_id = $request->input('id');

        $params = $this->categoryParams();
        $results = $this->ajaxModel->loadmore_ajax($params['table_name'], $params['primary_id'], $last_id);
        $list_category = $results->paginate(5);
        $last_status_id = $list_category->lastItem();
        $new_stt = $last_stt + $list_category->total();
        $hasMoreData = $list_category->hasMorePages();
        return response()->json([
            'view' => view('ohther.ajax.admin.category_list')->with('list_category', $list_category)->with('i', $last_stt)
                ->render(),
            'last_id' => $last_id + $last_status_id,
            'hasMoreData' => $hasMoreData,
            'new_stt' => $new_stt,
        ]);
    }
    public function category_return(Request $request)
    {
        $params = $this->categoryParams();
        $results = $this->ajaxModel->returnTable_ajax($params['table_name'], $params['primary_id']);
        $i = 1;

        return view('ohther.ajax.admin.category_list')
            ->with('list_category', $results)
            ->with('i', $i);
    }
    public function phanloai_seach(Request $request)
    {
        $input = $request->input('content');
        $params = $this->phanloaiParams();
        $results = $this->ajaxModel->search_ajax($params['table_name'], $params['colum_name'], $input);
        $i = 1;
        $count = $this->ajaxModel->search_ajaxCount($params['table_name'], $params['colum_name'], $input);
        return response()->json([
            'view' => view('ohther.ajax.admin.phanloai_list')->with('list_phanloai', $results)->with('i', $i)->render(),
            'counMess' => "Có " . $count . " kết quả trả về",

        ]);
    }

    public function phanloai_loadmore(Request $request)
    {
        $last_stt = $request->input('stt');
        $last_id = $request->input('id');

        $params = $this->phanloaiParams();
        $results = $this->ajaxModel->loadmore_ajax($params['table_name'], $params['primary_id'], $last_id);
        $list_phanloai = $results->paginate(5);
        $last_status_id = $list_phanloai->lastItem();
        $new_stt = $last_stt + $list_phanloai->total();
        $hasMoreData = $list_phanloai->hasMorePages();

        return response()->json([
            'view' => view('ohther.ajax.admin.phanloai_list')->with('list_phanloai', $list_phanloai)->with('i', $last_stt)
                // ->with('check', $check)
                ->render(),
            'last_id' => $last_id + $last_status_id,
            'hasMoreData' => $hasMoreData,
            'new_stt' => $new_stt,
        ]);
    }
    public function phanloai_return()
        {
            $params = $this->phanloaiParams();
            $results = $this->ajaxModel->returnTable_ajax($params['table_name'], $params['primary_id']);
            $i = 1;

            return view('ohther.ajax.admin.phanloai_list')
                ->with('list_phanloai', $results)
                ->with('i', $i);
        }
    public function staff_return()
    {
        $params = $this->staffParams();
        $results = $this->ajaxModel->returnTable_ajax($params['table_name'], $params['primary_id']);
        $i = 1;

        return view('ohther.ajax.admin.staff_list')
            ->with('list_staff', $results)
            ->with('i', $i);
    }

    public function staff_seach(Request $request)
    {
        $input = $request->input('content');
        $params = $this->staffParams();
        $results = $this->ajaxModel->search_ajax2Colum($params['table_name'], $params['colum_name1'], $params['colum_name2'], $input);
        $i = 1;
        $count = $this->ajaxModel->search_ajaxCount2Colum($params['table_name'], $params['colum_name1'], $params['colum_name2'], $input);
        return response()->json([
            'view' => view('ohther.ajax.admin.staff_list')->with('list_staff', $results)->with('i', $i)->render(),
            'counMess' => "Có " . $count . " kết quả trả về",

        ]);
    }

    

    public function theloai_seach(Request $request)
    {
        $input = $request->input('content');
        $params = $this->theloaiParams();
        $results = $this->ajaxModel->search_ajax_theloai($params['table_name'], $input);
        $i = 1;
        $count = $this->ajaxModel->search_ajaxTheloaisCount($params['table_name'], $params['colum_name1'], $params['colum_name2'], $input);
        return response()->json([
            'view' => view('ohther.ajax.admin.theloai_list')->with('list_theloai', $results)->with('i', $i)->render(),
            'counMess' => "Có " . $count . " kết quả trả về",

        ]);
    }
        public function product_seach(Request $request)
        {
            $input = $request->input('content');
            $params = $this->productParams();
            $query = $this->ajaxModel->search_ajax_product($params['table_name'], $input);
            $results =$query->get();
            $count =$query->count();
            $i = 1;
            return response()->json([
                'view' => view('ohther.ajax.admin.product_list')->with('list_product',  $results)->with('i', $i)->render(),
                'counMess' => "Có " . $count . " kết quả trả về",

            ]);
        }
    public function color_loadmore(Request $request)
    {
        $last_stt = $request->input('stt');
        $last_id = $request->input('id');

        $params = $this->colorParams();
        $results = $this->ajaxModel->loadmore_ajax($params['table_name'], $params['primary_id'], $last_id);
        $list_color = $results->paginate(5);
        $last_status_id = $list_color->lastItem();
        $new_stt = $last_stt + $list_color->total();
        $hasMoreData = $list_color->hasMorePages();

        return response()->json([
            'view' => view('ohther.ajax.admin.color_list')->with('list_color', $list_color)->with('i', $last_stt)
                // ->with('check', $check)
                ->render(),
            'last_id' => $last_id + $last_status_id,
            'hasMoreData' => $hasMoreData,
            'new_stt' => $new_stt,
        ]);
    }



    public function color_seach(Request $request)
    {
        $input = $request->input('content');
        $params = $this->colorParams();
        $results = $this->ajaxModel->search_ajax($params['table_name'], $params['colum_name'], $input);
        $i = 1;
        $count = $this->ajaxModel->search_ajaxCount($params['table_name'], $params['colum_name'], $input);
        return response()->json([
            'view' => view('ohther.ajax.admin.color_list')->with('list_color', $results)->with('i', $i)->render(),
            'counMess' => "Có " . $count . " kết quả trả về",

        ]);
    }
    public function color_return()
    {
        $params = $this->colorParams();
        $results = $this->ajaxModel->returnTable_ajax($params['table_name'], $params['primary_id']);
        $i = 1;

        return view('ohther.ajax.admin.color_list')
            ->with('list_color', $results)
            ->with('i', $i);
    }

    public function brand_loadmore(Request $request)
    {
        $last_stt = $request->input('stt');
        $last_id = $request->input('id');

        $params = $this->brandParams();
        $results = $this->ajaxModel->loadmore_ajax($params['table_name'], $params['primary_id'], $last_id);
        $list_brand = $results->paginate(5);
        $last_status_id = $list_brand->lastItem();
        $new_stt = $last_stt + $list_brand->total();
        $hasMoreData = $list_brand->hasMorePages();

        return response()->json([
            'view' => view('ohther.ajax.admin.brand_list')->with('list_brand', $list_brand)->with('i', $last_stt)
                // ->with('check', $check)
                ->render(),
            'last_id' => $last_id + $last_status_id,
            'hasMoreData' => $hasMoreData,
            'new_stt' => $new_stt,
        ]);
    }

    public function brand_seach(Request $request)
    {
        $input = $request->input('content');
        $params = $this->brandParams();
        $results = $this->ajaxModel->search_ajax2Colum($params['table_name'], $params['colum_name1'], $params['colum_name2'], $input);
        $i = 1;
        $count = $this->ajaxModel->search_ajaxCount2Colum($params['table_name'], $params['colum_name1'], $params['colum_name2'], $input);
        return response()->json([
            'view' => view('ohther.ajax.admin.brand_list')->with('list_brand', $results)->with('i', $i)->render(),
            'counMess' => "Có " . $count . " kết quả trả về",

        ]);
    }
    public function brand_return()
    {
        $params = $this->brandParams();
        $results = $this->ajaxModel->returnTable_ajax($params['table_name'], $params['primary_id']);
        $i = 1;

        return view('ohther.ajax.admin.brand_list')
            ->with('list_brand', $results)
            ->with('i', $i);
    }

    public function voucher_seach(Request $request)
    {
        $input = $request->input('content');
        $params = $this->voucherParams();
        $results = $this->ajaxModel->search_ajax2Colum($params['table_name'], $params['colum_name1'], $params['colum_name2'], $input);
        $i = 1;
        $count = $this->ajaxModel->search_ajaxCount2Colum($params['table_name'], $params['colum_name1'], $params['colum_name2'], $input);
        return response()->json([
            'view' => view('ohther.ajax.admin.voucher_list')->with('list_voucher', $results)->with('i', $i)->render(),
            'counMess' => "Có " . $count . " kết quả trả về",

        ]);
    }
    public function voucher_return()
    {
        $params = $this->voucherParams();
        $results = $this->ajaxModel->returnTable_ajax($params['table_name'], $params['primary_id']);
        $i = 1;

        return view('ohther.ajax.admin.voucher_list')
            ->with('list_voucher', $results)
            ->with('i', $i);
    }

    public function methodPayment_seach(Request $request)
    {
        $input = $request->input('content');
        $params = $this->methodPaymentParams();
        $results = $this->ajaxModel->search_ajax2Colum($params['table_name'], $params['colum_name1'], $params['colum_name2'], $input);
        $i = 1;
        $count = $this->ajaxModel->search_ajaxCount2Colum($params['table_name'], $params['colum_name1'], $params['colum_name2'], $input);
        return response()->json([
            'view' => view('ohther.ajax.admin.methodPayment_list')->with('list_methodPayment', $results)->with('i', $i)->render(),
            'counMess' => "Có " . $count . " kết quả trả về",

        ]);
    }
    public function methodPayment_return()
    {
        $params = $this->methodPaymentParams();
        $results = $this->ajaxModel->returnTable_ajax($params['table_name'], $params['primary_id']);
        $i = 1;

        return view('ohther.ajax.admin.methodPayment_list')
            ->with('list_methodPayment', $results)
            ->with('i', $i);
    }

    public function methodPayment_loadmore(Request $request)
    {
        $last_stt = $request->input('stt');
        $last_id = $request->input('id');

        $params = $this->methodPaymentParams();
        $results = $this->ajaxModel->loadmore_ajax($params['table_name'], $params['primary_id'], $last_id);
        $list_methodPayment = $results->paginate(5);
        $last_status_id = $list_methodPayment->lastItem();
        $new_stt = $last_stt + $list_methodPayment->total();
        $hasMoreData = $list_methodPayment->hasMorePages();

        return response()->json([
            'view' => view('ohther.ajax.admin.methodPayment_list')->with('list_methodPayment', $list_methodPayment)->with('i', $last_stt)
                // ->with('check', $check)
                ->render(),
            'last_id' => $last_id + $last_status_id,
            'hasMoreData' => $hasMoreData,
            'new_stt' => $new_stt,
        ]);
    }


    public function  statusPayment_seach(Request $request)
    {
        $input = $request->input('content');
        $params = $this->statusPaymentParams();
        $results = $this->ajaxModel->search_ajax2Colum($params['table_name'], $params['colum_name1'], $params['colum_name2'], $input);
        $i = 1;
        $count = $this->ajaxModel->search_ajaxCount2Colum($params['table_name'], $params['colum_name1'], $params['colum_name2'], $input);
        return response()->json([
            'view' => view('ohther.ajax.admin.statusPayment_list')->with('list_statusPayment', $results)->with('i', $i)->render(),
            'counMess' => "Có " . $count . " kết quả trả về",

        ]);
    }
    public function statusPayment_return()
    {
        $params = $this->statusPaymentParams();
        $results = $this->ajaxModel->returnTable_ajax($params['table_name'], $params['primary_id']);
        $i = 1;

        return view('ohther.ajax.admin.statusPayment_list')
            ->with('list_statusPayment', $results)
            ->with('i', $i);
    }

    public function statusPayment_loadmore(Request $request)
    {
        $last_stt = $request->input('stt');
        $last_id = $request->input('id');
        
        $params = $this->statusPaymentParams();
        $results = $this->ajaxModel->loadmore_ajax($params['table_name'], $params['primary_id'], $last_id);
        $list_statusPayment = $results->paginate(5);
        $last_status_id = $list_statusPayment->lastItem();
        $new_stt = $last_stt + $list_statusPayment->total();
        $hasMoreData = $list_statusPayment->hasMorePages();

        return response()->json([
            'view' => view('ohther.ajax.admin.statusPayment_list')->with('list_statusPayment', $list_statusPayment)->with('i', $last_stt)
                // ->with('check', $check)
                ->render(),
            'last_id' => $last_id + $last_status_id,
            'hasMoreData' => $hasMoreData,
            'new_stt' => $new_stt,
        ]);
    }
    
    public function  user_seach(Request $request)
    {
        $input = $request->input('content');
        $params = $this->userParams();
        $results = $this->ajaxModel->search_ajax2Colum($params['table_name'], $params['colum_name1'], $params['colum_name2'], $input);
        $i = 1;
        $count = $this->ajaxModel->search_ajaxCount2Colum($params['table_name'], $params['colum_name1'], $params['colum_name2'], $input);
        return response()->json([
            'view' => view('ohther.ajax.admin.user_list')->with('list_user', $results)->with('i', $i)->render(),
            'counMess' => "Có " . $count . " kết quả trả về",

        ]);
    }
    public function user_return()
    {
        $params = $this->userParams();
        $results = $this->ajaxModel->returnTable_ajaxP($params['table_name'], $params['primary_id'])->paginate(20);
        $i = 1;

        return view('ohther.ajax.admin.user_list')
            ->with('list_user', $results)
            ->with('i', $i);
    }
    public function position_seach(Request $request)
    {
        $input = $request->input('content');
        $params = $this->positionParams();
        $results = $this->ajaxModel->search_ajax2Colum($params['table_name'], $params['colum_name1'], $params['colum_name2'], $input);
        $i = 1;
        $count = $this->ajaxModel->search_ajaxCount2Colum($params['table_name'], $params['colum_name1'], $params['colum_name2'], $input);
        return response()->json([
            'view' => view('ohther.ajax.admin.position_list')->with('list_position', $results)->with('i', $i)->render(),
            'counMess' => "Có " . $count . " kết quả trả về",

        ]);
    }
    public function position_return()
    {
        $params = $this->positionParams();
        $results = $this->ajaxModel->returnTable_ajax($params['table_name'], $params['primary_id']);
        $i = 1;

        return view('ohther.ajax.admin.position_list')
            ->with('list_position', $results)
            ->with('i', $i);
    }


    public function product_return()
    {
        $params = $this->productParams();
        $results = $this->ajaxModel->returnTable_ajax($params['table_name'], $params['primary_id']);
        $i = 1;

        return view('ohther.ajax.admin.product_list')
            ->with('list_product', $results)
            ->with('i', $i);
    }

    public function size_seach(Request $request)
    {
        $input = $request->input('content');
        $params = $this->sizeParams();
        $results = $this->ajaxModel->search_ajax($params['table_name'], $params['colum_name'], $input);
        $i = 1;
        $count = $this->ajaxModel->search_ajaxCount($params['table_name'], $params['colum_name'], $input);
        return response()->json([
            'view' => view('ohther.ajax.admin.size_list')->with('list_size', $results)->with('i', $i)->render(),
            'counMess' => "Có " . $count . " kết quả trả về",

        ]);
    }
    public function size_loadmore(Request $request)
    {
        $last_stt = $request->input('stt');
        $last_id = $request->input('id');

        $params = $this->sizeParams();
        $results = $this->ajaxModel->loadmore_ajax($params['table_name'], $params['primary_id'], $last_id);
        $list_size = $results->paginate(5);
        $last_status_id = $list_size->lastItem();
        $new_stt = $last_stt + $list_size->total();
        $hasMoreData = $list_size->hasMorePages();

        return response()->json([
            'view' => view('ohther.ajax.admin.size_list')->with('list_size', $list_size)->with('i', $last_stt)
                // ->with('check', $check)
                ->render(),
            'last_id' => $last_id + $last_status_id,
            'hasMoreData' => $hasMoreData,
            'new_stt' => $new_stt,
        ]);
    }

    public function size_return()
    {
        $params = $this->sizeParams();
        $results = $this->ajaxModel->returnTable_ajax($params['table_name'], $params['primary_id']);
        $i = 1;

        return view('ohther.ajax.admin.size_list')
            ->with('list_size', $results)
            ->with('i', $i);
    }

    public function theloai_return()
    {
        $params = $this->theloaiParams();
        $results = $this->ajaxModel->returnTableTheLoai_ajax($params['table_name'], $params['primary_id']);
        $i = 1;

        return view('ohther.ajax.admin.theloai_list')
            ->with('list_theloai', $results)
            ->with('i', $i);
    }




    public function select_data_theloai(Request $request)
    {
        $category_id = $request->category_id;
        $phanloai_id = $request->phanloai_id;
        $status = $request->status;
        $results = $this->ajaxModel->select_theloai($category_id, $phanloai_id, $status);
        $resultsCount = $this->ajaxModel->count_select_theloai($category_id, $phanloai_id, $status);
        return response()->json([
            'view' => view('ohther.ajax.admin.theloai_list')->with('list_theloai', $results)->with('i', 1)
                // ->with('check', $check)
                ->render(),
            'mess_req' => "Có " . $resultsCount . " kết quả",

        ]);
    }

    public function select_data_theloai_product(Request $request)
    {
        $category_id = $request->category_id;
        $phanloai_id = $request->phanloai_id;
        $results = $this->ajaxModel->select_theloaiProduct($category_id, $phanloai_id);

        // Tạo một mảng để lưu trữ dữ liệu
        $data = [];

        foreach ($results as $item) {
            $theloai_id = $item->theloai_id;
            $theloai_name = $item->theloai_name;

            // Thêm dữ liệu vào mảng
            $data[] = [
                'theloai_id' => $theloai_id,
                'theloai_name' => $theloai_name,
            ];
        }

        // Trả về JSON response với dữ liệu đã thu thập
        return response()->json(['data' => $data]);
    }
    public function filter_product(Request $request)
    {
        $theloai_id = $request->theloai_id;
        $status = $request->status;
        $brand_id = $request->brand_id;
        $i = 1;

        $results = $this->ajaxModel->filter_product($theloai_id, $status, $brand_id);
        $count = $this->ajaxModel->count_filter_product($theloai_id, $status, $brand_id);

        if ($results) {
            return response()->json([
                'view' => view('ohther.ajax.admin.product_list')->with('list_product', $results)->with('i', $i)->render(),
                'mess_req' => "Có " . $count . " kết quả trả về",

            ]);
        }
    }
 
    public function filter_productPlus(Request $request)
    {
        $theloai_id = $request->theloai_id;
        $status = $request->status;
        $brand_id = $request->brand_id;
        $color_product = $request->color_product;
        $size_product = $request->size_product;
        $startPrice = $request->startPrice;
        $endPrice = $request->endPrice;
        $startQuantity = $request->startQuantity;
        $endQuantity = $request->endQuantity;
        $i = 1;

        $filteredResults = $this->ajaxModel->filter_productPlus($theloai_id, $status, $brand_id, $color_product, $size_product, $startPrice, $endPrice, $startQuantity, $endQuantity);
        $results = $filteredResults->get();
        $count = $filteredResults->distinct()->count('tbl_product.product_id');
         if ($results) {
            return response()->json([
                'view' => view('ohther.ajax.admin.product_list')->with('list_product', $results)->with('i', $i)->render(),
                'mess_req' => "Có " . $count . " kết quả trả về",

            ]);
        }
    }
  
}
