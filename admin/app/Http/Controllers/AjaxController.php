<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
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
            'status' => 'phanloai_status',
        ];
    }
    private function blogParams()
    {
        return [
            'table_name' => 'tbl_blog',
            'colum_name1' => 'blog_code',
            'colum_name2' => 'blog_name',
            'primary_id' => 'blog_id',
            'status' => 'blog_status',
        ];
    }
    private function materialParams()
    {
        return [
            'table_name' => 'tbl_material',
            'colum_name' => 'material_name',
            'primary_id' => 'material_id',
            'status' => 'material_status',
        ];
    }
    private function todoListParams()
    {
        return [
            'table_name' => 'tbl_notication_admin',
            'colum_nameId' => 'staff_id',
            'primary_id' => 'notication_admin_id',
            'status' => 'notication_admin_status',
        ];
    }
    private function brandParams()
    {
        return [
            'table_name' => 'tbl_brand',
            'colum_name1' => 'brand_name',
            'colum_name2' => 'brand_code',
            'primary_id' => 'brand_id',
            'status' => 'brand_status',
        ];
    }
    private function PermissionParams()
    {
        return [
            'table_name' => 'tbl_permission',
            'colum_name1' => 'permission_name',
            'colum_name2' => 'permission_code',
            'primary_id' => 'permission_id',
            'status' => 'permission_status',
        ];
    }
    private function PermissionGroupParams()
    {
        return [
            'table_name' => 'tbl_permission__group',
            'colum_name1' => 'permission_group_name',
            'colum_name2' => 'permission_group_code',
            'primary_id' => 'permission_group_id',
            'status' => 'permission_group_status',
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
            'status' => 'user_status',
            'categoryAcount' => 'user_categoryAccount',
        ];
    }
    private function methodPaymentParams()
    {
        return [
            'table_name' => 'tbl_methodPayment',
            'colum_name1' => 'methodPayment_name',
            'colum_name2' => 'methodPayment_code',
            'primary_id' => 'methodPayment_id',
            'status' => 'methodPayment_status'
        ];
    }
    private function statusPaymentParams()
    {
        return [
            'table_name' => 'tbl_statusPayment',
            'colum_name1' => 'statusPayment_name',
            'colum_name2' => 'statusPayment_code',
            'primary_id' => 'statusPayment_id',
            'status' => 'statusPayment_status'
        ];
    }
    private function positionParams()
    {
        return [
            'table_name' => 'tbl_position',
            'colum_name1' => 'position_name',
            'colum_name2' => 'position_code',
            'primary_id' => 'position_id',
            'status' => 'position_status',
        ];
    }
    private function staffParams()
    {
        return [
            'table_name' => 'tbl_staff',
            'colum_name1' => 'staff_fullname',
            'colum_name2' => 'staff_username',
            'primary_id' => 'staff_id',
            'status' => 'staff_status',
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

    private function shipParams()
    {
        return [
            'table_name' => 'tbl_ship',
            'colum_name1' => 'ship_name',
            'colum_name2' => 'ship_code',
            'primary_id' => 'ship_id',
            'status' => 'ship_status',
        ];
    }

    private function categoryParams()
    {
        return [
            'table_name' => 'tbl_category',
            'colum_name' => 'category_name',
            'primary_id' => 'category_id',
            'status' => 'category_status',
        ];
    }

    private function sizeParams()
    {
        return [
            'table_name' => 'tbl_size',
            'colum_name' => 'size_name',
            'primary_id' => 'size_id',
            'status' => 'size_status',
        ];
    }
    private function colorParams()
    {
        return [
            'table_name' => 'tbl_color',
            'colum_name' => 'color_name',
            'primary_id' => 'color_id',
            'status' => 'color_statuss',
        ];
    }
    public function category_search(Request $request)
    {
        $input = $request->input('content');
        $params = $this->categoryParams();
        $data =
            [
                $params['colum_name']
            ];
        $results = $this->ajaxModel->search_ajax($params['table_name'], $data, $input)->get();
        $count = $this->ajaxModel->search_ajax($params['table_name'], $data, $input)->count();
        $i = 1;

        return response()->json([
            'view' => view('ohther.ajax.admin.category_list')->with('list_category', $results)->with('i', $i)->render(),
            'counMess' => "Có " . $count . " kết quả trả về",
        ]);
    }

    public function category_filter(Request $request)
    {
        $input = $request->input('content');
        $params = $this->categoryParams();
        $results = $this->ajaxModel->filter_ajax($params['table_name'], $params['status'], $input)->get();
        $count = $this->ajaxModel->filter_ajax($params['table_name'], $params['status'], $input)->count();
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

    public function blog_search(Request $request)
    {
        $input = $request->input('content');
        $params = $this->blogParams();
        $data =
            [
                $params['colum_name1'],
                $params['colum_name2'],
            ];
        $results = $this->ajaxModel->search_ajax($params['table_name'], $data, $input)->get();
        $count = $this->ajaxModel->search_ajax($params['table_name'], $data, $input)->count();
        $i = 1;

        return response()->json([
            'view' => view('ohther.ajax.admin.blog_list')->with('list_blog', $results)->with('i', $i)->render(),
            'counMess' => "Có " . $count . " kết quả trả về",
        ]);
    }

    public function blog_filter(Request $request)
    {
        $input = $request->input('content');
        $params = $this->blogParams();
        $results = $this->ajaxModel->filter_ajax($params['table_name'], $params['status'], $input)->get();
        $count = $this->ajaxModel->filter_ajax($params['table_name'], $params['status'], $input)->count();
        $i = 1;
        return response()->json([
            'view' => view('ohther.ajax.admin.blog_list')->with('list_blog', $results)->with('i', $i)->render(),
            'counMess' => "Có " . $count . " kết quả trả về",

        ]);
    }
    public function blog_loadmore(Request $request)
    {
        $last_stt = $request->input('stt');
        $last_id = $request->input('id');

        $params = $this->blogParams();
        $results = $this->ajaxModel->loadmore_ajax($params['table_name'], $params['primary_id'], $last_id);
        $list_blog = $results->paginate(5);
        $last_status_id = $list_blog->lastItem();
        $new_stt = $last_stt + $list_blog->total();
        $hasMoreData = $list_blog->hasMorePages();
        return response()->json([
            'view' => view('ohther.ajax.admin.blog_list')->with('list_blog', $list_blog)->with('i', $last_stt)
                ->render(),
            'last_id' => $last_id + $last_status_id,
            'hasMoreData' => $hasMoreData,
            'new_stt' => $new_stt,
        ]);
    }
    public function blog_return()
    {
        $params = $this->blogParams();
        $getPaginate=$this->ajaxModel->getPaginate($params['table_name'])->first()->pagination_limitAcction;
        $results = $this->ajaxModel->returnTable_ajax($params['table_name'], $params['primary_id'])->paginate($getPaginate);
        $i = 1;

        return view('ohther.ajax.admin.blog_list')
            ->with('list_blog', $results)
            ->with('i', $i);
    }

    public function phanloai_seach(Request $request)
    {
        $input = $request->input('content');
        $params = $this->phanloaiParams();
        $data = [
            $params['colum_name']
        ];
        $results = $this->ajaxModel->search_ajax($params['table_name'], $data, $input)->get();
        $i = 1;
        $count = $this->ajaxModel->search_ajax($params['table_name'], $data, $input)->count();
        return response()->json([
            'view' => view('ohther.ajax.admin.phanloai_list')->with('list_phanloai', $results)->with('i', $i)->render(),
            'counMess' => "Có " . $count . " kết quả trả về",

        ]);
    }
    public function phanloai_filter(Request $request)
    {
        $input = $request->input('content');
        $params = $this->phanloaiParams();
        $results = $this->ajaxModel->filter_ajax($params['table_name'], $params['status'], $input)->get();
        $count = $this->ajaxModel->filter_ajax($params['table_name'], $params['status'], $input)->count();
        $i = 1;
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
        $results = $this->ajaxModel->returnTable_ajax($params['table_name'], $params['primary_id'])->paginate(10);
        $i = 1;

        return view('ohther.ajax.admin.phanloai_list')
            ->with('list_phanloai', $results)
            ->with('i', $i);
    }

    public function material_seach(Request $request)
    {
        $input = $request->input('content');
        $params = $this->materialParams();
        $data = [
            $params['colum_name'],
        ];
        $results = $this->ajaxModel->search_ajax($params['table_name'], $data, $input)->get();
        $i = 1;
        $count = $this->ajaxModel->search_ajax($params['table_name'], $data, $input)->count();
        return response()->json([
            'view' => view('ohther.ajax.admin.material_list')->with('list_material', $results)->with('i', $i)->render(),
            'counMess' => "Có " . $count . " kết quả trả về",

        ]);
    }
    public function material_loadmore(Request $request)
    {
        $last_stt = $request->input('stt');
        $last_id = $request->input('id');

        $params = $this->materialParams();
        $results = $this->ajaxModel->loadmore_ajax($params['table_name'], $params['primary_id'], $last_id);
        $list_material = $results->paginate(5);
        $last_status_id = $list_material->lastItem();
        $new_stt = $last_stt + $list_material->total();
        $hasMoreData = $list_material->hasMorePages();

        return response()->json([
            'view' => view('ohther.ajax.admin.material_list')->with('list_material', $list_material)->with('i', $last_stt)
                // ->with('check', $check)
                ->render(),
            'last_id' => $last_id + $last_status_id,
            'hasMoreData' => $hasMoreData,
            'new_stt' => $new_stt,
        ]);
    }
    public function material_return()
    {
        $params = $this->materialParams();
        $results = $this->ajaxModel->returnTable_ajax($params['table_name'], $params['primary_id'])->paginate(10);
        $i = 1;

        return view('ohther.ajax.admin.material_list')
            ->with('list_material', $results)
            ->with('i', $i);
    }

    public function material_filter(Request $request)
    {
        $input = $request->input('content');
        $params = $this->materialParams();
        $results = $this->ajaxModel->filter_ajax($params['table_name'], $params['status'], $input)->get();
        $i = 1;
        $count = $this->ajaxModel->filter_ajax($params['table_name'], $params['status'], $input)->count();
        return response()->json([
            'view' => view('ohther.ajax.admin.material_list')->with('list_material', $results)->with('i', $i)->render(),
            'counMess' => "Có " . $count . " kết quả trả về",

        ]);
    }
 
    public function staff_return()
    {
        $params = $this->staffParams();
        $results = $this->ajaxModel->returnTable_ajax($params['table_name'], $params['primary_id'])->paginate(10);
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

    public function staff_filter(Request $request)
    {
        $input = $request->input('content');
        $params = $this->staffParams();
        $results = $this->ajaxModel->filter_ajax($params['table_name'], $params['status'], $input)->get();
        $i = 1;
        $count = $this->ajaxModel->filter_ajax($params['table_name'], $params['status'], $input)->count();
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
        $results = $query->get();
        $count = $query->count();
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
        $data = [
            $params['colum_name']
        ];
        $results = $this->ajaxModel->search_ajax($params['table_name'], $data, $input)->get();
        $i = 1;
        $count = $this->ajaxModel->search_ajax($params['table_name'], $data, $input)->count();
        return response()->json([
            'view' => view('ohther.ajax.admin.color_list')->with('list_color', $results)->with('i', $i)->render(),
            'counMess' => "Có " . $count . " kết quả trả về",

        ]);
    }
    public function color_filter(Request $request)
    {
        $input = $request->input('content');
        $params = $this->colorParams();
        $results = $this->ajaxModel->filter_ajax($params['table_name'], $params['status'], $input)->get();
        $count = $this->ajaxModel->filter_ajax($params['table_name'], $params['status'], $input)->count();
        $i = 1;
        return response()->json([
            'view' => view('ohther.ajax.admin.color_list')->with('list_color', $results)->with('i', $i)->render(),
            'counMess' => "Có " . $count . " kết quả trả về",

        ]);
    }
    public function color_return()
    {
        $params = $this->colorParams();
        $results = $this->ajaxModel->returnTable_ajax($params['table_name'], $params['primary_id'])->paginate(10);
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
        $data = [
            $params['colum_name1'],
            $params['colum_name2']
        ];
        $results = $this->ajaxModel->search_ajax($params['table_name'], $data, $input)->get();
        $i = 1;
        $count = $this->ajaxModel->search_ajax($params['table_name'], $data, $input)->count();
        return response()->json([
            'view' => view('ohther.ajax.admin.brand_list')->with('list_brand', $results)->with('i', $i)->render(),
            'counMess' => "Có " . $count . " kết quả trả về",

        ]);
    }
    public function brand_filter(Request $request)
    {
        $input = $request->input('content');
        $params = $this->brandParams();
        $results = $this->ajaxModel->filter_ajax($params['table_name'], $params['status'], $input)->get();
        $count = $this->ajaxModel->filter_ajax($params['table_name'], $params['status'], $input)->count();
        $i = 1;
        return response()->json([
            'view' => view('ohther.ajax.admin.brand_list')->with('list_brand', $results)->with('i', $i)->render(),
            'counMess' => "Có " . $count . " kết quả trả về",

        ]);
    }
    public function brand_return()
    {
        $params = $this->brandParams();
        $results = $this->ajaxModel->returnTable_ajax($params['table_name'], $params['primary_id'])->paginate(10);
        $i = 1;

        return view('ohther.ajax.admin.brand_list')
            ->with('list_brand', $results)
            ->with('i', $i);
    }


    public function permission_seach(Request $request)
    {
        $input = $request->input('content');
        $params = $this->PermissionParams();
        $results = $this->ajaxModel->search_ajax2Colum($params['table_name'], $params['colum_name1'], $params['colum_name2'], $input);
        $i = 1;
        $count = $this->ajaxModel->search_ajaxCount2Colum($params['table_name'], $params['colum_name1'], $params['colum_name2'], $input);
        return response()->json([
            'view' => view('ohther.ajax.admin.permission_list')->with('list_permission', $results)->with('i', $i)->render(),
            'counMess' => "Có " . $count . " kết quả trả về",
        ]);
    }
    public function permission_filter(Request $request)
    {
        $input = $request->input('content');
        $params = $this->PermissionParams();
        $results = $this->ajaxModel->filter_ajax($params['table_name'], $params['status'], $input)->get();
        $i = 1;
        $count = $this->ajaxModel->filter_ajax($params['table_name'], $params['status'], $input)->count();
        return response()->json([
            'view' => view('ohther.ajax.admin.permission_list')->with('list_permission', $results)->with('i', $i)->render(),
            'counMess' => "Có " . $count . " kết quả trả về",
        ]);
    }
    public function permission_return()
    {
        $params = $this->PermissionParams();
        $results = $this->ajaxModel->returnTable_ajaxP($params['table_name'], $params['primary_id'])->paginate(30);
        $i = 1;

        return view('ohther.ajax.admin.permission_list')
            ->with('list_permission', $results)
            ->with('i', $i);
    }


    public function permissionGroup_seach(Request $request)
    {
        $input = $request->input('content');
        $params = $this->PermissionGroupParams();
        $results = $this->ajaxModel->search_ajax2Colum($params['table_name'], $params['colum_name1'], $params['colum_name2'], $input);
        $i = 1;
        $count = $this->ajaxModel->search_ajaxCount2Colum($params['table_name'], $params['colum_name1'], $params['colum_name2'], $input);
        return response()->json([
            'view' => view('ohther.ajax.admin.permissionGroup_list')->with('list_permissionGroup', $results)->with('i', $i)->render(),
            'counMess' => "Có " . $count . " kết quả trả về",

        ]);
    }
    public function permissionGroup_filter(Request $request)
    {
        $input = $request->input('content');
        $params = $this->PermissionGroupParams();
        $results = $this->ajaxModel->filter_ajax($params['table_name'], $params['status'], $input)->get();
        $i = 1;
        $count = $this->ajaxModel->filter_ajax($params['table_name'], $params['status'], $input)->count();
        return response()->json([
            'view' => view('ohther.ajax.admin.permissionGroup_list')->with('list_permissionGroup', $results)->with('i', $i)->render(),
            'counMess' => "Có " . $count . " kết quả trả về",

        ]);
    }
    public function permissionGroup_return()
    {
        $params = $this->PermissionGroupParams();
        $results = $this->ajaxModel->returnTable_ajaxP($params['table_name'], $params['primary_id'])->paginate(15);
        $i = 1;

        return view('ohther.ajax.admin.permissionGroup_list')
            ->with('list_permissionGroup', $results)
            ->with('i', $i);
    }


    public function ship_loadmore(Request $request)
    {
        $last_stt = $request->input('stt');
        $last_id = $request->input('id');

        $params = $this->shipParams();
        $results = $this->ajaxModel->loadmore_ajax($params['table_name'], $params['primary_id'], $last_id);
        $list_ship = $results->paginate(5);
        $last_status_id = $list_ship->lastItem();
        $new_stt = $last_stt + $list_ship->total();
        $hasMoreData = $list_ship->hasMorePages();

        return response()->json([
            'view' => view('ohther.ajax.admin.ship_list')->with('list_ship', $list_ship)->with('i', $last_stt)
                // ->with('check', $check)
                ->render(),
            'last_id' => $last_id + $last_status_id,
            'hasMoreData' => $hasMoreData,
            'new_stt' => $new_stt,
        ]);
    }

    public function ship_seach(Request $request)
    {
        $input = $request->input('content');
        $params = $this->shipParams();
        $results = $this->ajaxModel->search_ajax2Colum($params['table_name'], $params['colum_name1'], $params['colum_name2'], $input);
        $i = 1;
        $count = $this->ajaxModel->search_ajaxCount2Colum($params['table_name'], $params['colum_name1'], $params['colum_name2'], $input);
        return response()->json([
            'view' => view('ohther.ajax.admin.ship_list')->with('list_ship', $results)->with('i', $i)->render(),
            'counMess' => "Có " . $count . " kết quả trả về",

        ]);
    }
    public function ship_filter(Request $request)
    {
        $input = $request->input('content');
        $params = $this->shipParams();
        $results = $this->ajaxModel->filter_ajax($params['table_name'], $params['status'], $input)->get();
        $i = 1;
        $count = $this->ajaxModel->filter_ajax($params['table_name'], $params['status'], $input)->count();
        return response()->json([
            'view' => view('ohther.ajax.admin.ship_list')->with('list_ship', $results)->with('i', $i)->render(),
            'counMess' => "Có " . $count . " kết quả trả về",

        ]);
    }
    public function ship_return()
    {
        $params = $this->shipParams();
        $results = $this->ajaxModel->returnTable_ajax($params['table_name'], $params['primary_id'])->paginate(10);
        $i = 1;

        return view('ohther.ajax.admin.ship_list')
            ->with('list_ship', $results)
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
        $results = $this->ajaxModel->returnTable_ajax($params['table_name'], $params['primary_id'])->paginate(10);
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
    public function methodPayment_filter(Request $request)
    {
        $input = $request->input('content');
        $params = $this->methodPaymentParams();
        $results = $this->ajaxModel->filter_ajax($params['table_name'], $params['status'], $input)->get();
        $i = 1;
        $count = $this->ajaxModel->filter_ajax($params['table_name'], $params['status'], $input)->count();
        return response()->json([
            'view' => view('ohther.ajax.admin.methodPayment_list')->with('list_methodPayment', $results)->with('i', $i)->render(),
            'counMess' => "Có " . $count . " kết quả trả về",

        ]);
    }
    public function methodPayment_return()
    {
        $params = $this->methodPaymentParams();
        $results = $this->ajaxModel->returnTable_ajax($params['table_name'], $params['primary_id'])->paginate(10);
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
    public function statusPayment_filter(Request $request)
    {
        $input = $request->input('content');
        $params = $this->statusPaymentParams();
        $results = $this->ajaxModel->filter_ajax($params['table_name'], $params['status'], $input)->get();
        $i = 1;
        $count = $this->ajaxModel->filter_ajax($params['table_name'], $params['status'], $input)->count();
        return response()->json([
            'view' => view('ohther.ajax.admin.statusPayment_list')->with('list_statusPayment', $results)->with('i', $i)->render(),
            'counMess' => "Có " . $count . " kết quả trả về",

        ]);
    }
    public function statusPayment_return()
    {
        $params = $this->statusPaymentParams();
        $results = $this->ajaxModel->returnTable_ajax($params['table_name'], $params['primary_id'])->paginate(10);
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
    public function user_filter(Request $request)
    {
        $input = $request->input('content');
        $params = $this->userParams();
        $results = $this->ajaxModel->filter_ajax($params['table_name'], $params['status'], $input)->get();
        $i = 1;
        $count = $this->ajaxModel->filter_ajax($params['table_name'], $params['status'], $input)->count();
        return response()->json([
            'view' => view('ohther.ajax.admin.user_list')->with('list_user', $results)->with('i', $i)->render(),
            'counMess' => "Có " . $count . " kết quả trả về",

        ]);
    }

    public function user_Category_filter(Request $request)
    {
        $input = $request->input('content');
        $params = $this->userParams();
        $results = $this->ajaxModel->filter_ajax($params['table_name'], $params['categoryAcount'], $input)->get();
        $i = 1;
        $count = $this->ajaxModel->filter_ajax($params['table_name'], $params['categoryAcount'], $input)->count();
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
    public function position_filter(Request $request)
    {
        $input = $request->input('content');
        $params = $this->positionParams();
        $results = $this->ajaxModel->filter_ajax($params['table_name'], $params['status'], $input)->get();
        $i = 1;
        $count = $this->ajaxModel->filter_ajax($params['table_name'], $params['status'], $input)->count();
        return response()->json([
            'view' => view('ohther.ajax.admin.position_list')->with('list_position', $results)->with('i', $i)->render(),
            'counMess' => "Có " . $count . " kết quả trả về",

        ]);
    }
    public function position_return()
    {
        $params = $this->positionParams();
        $results = $this->ajaxModel->returnTable_ajax($params['table_name'], $params['primary_id'])->paginate(10);
        $i = 1;

        return view('ohther.ajax.admin.position_list')
            ->with('list_position', $results)
            ->with('i', $i);
    }


    public function product_return()
    {
        $params = $this->productParams();
        $results = $this->ajaxModel->returnTable_ajax($params['table_name'], $params['primary_id'])->paginate(10);
        $i = 1;

        return view('ohther.ajax.admin.product_list')
            ->with('list_product', $results)
            ->with('i', $i);
    }

    public function size_seach(Request $request)
    {
        $input = $request->input('content');
        $params = $this->sizeParams();
        $data = [$params['colum_name']];
        $results = $this->ajaxModel->search_ajax($params['table_name'], $data, $input)->get();
        $i = 1;
        $count = $this->ajaxModel->search_ajax($params['table_name'], $data, $input)->count();
        return response()->json([
            'view' => view('ohther.ajax.admin.size_list')->with('list_size', $results)->with('i', $i)->render(),
            'counMess' => "Có " . $count . " kết quả trả về",

        ]);
    }
    public function size_filter(Request $request)
    {
        $input = $request->input('content');
        $params = $this->sizeParams();
        $results = $this->ajaxModel->filter_ajax($params['table_name'], $params['status'], $input)->get();
        $i = 1;
        $count = $this->ajaxModel->filter_ajax($params['table_name'], $params['status'], $input)->count();
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
        $results = $this->ajaxModel->returnTable_ajax($params['table_name'], $params['primary_id'])->paginate(10);
        $i = 1;

        return view('ohther.ajax.admin.size_list')
            ->with('list_size', $results)
            ->with('i', $i);
    }

    public function todolist_seach(Request $request)
    {
        $input = $request->input('content');
        $params = $this->sizeParams();
        $data = [$params['colum_name']];
        $results = $this->ajaxModel->search_ajax($params['table_name'], $data, $input)->get();
        $i = 1;
        $count = $this->ajaxModel->search_ajax($params['table_name'], $data, $input)->count();
        return response()->json([
            'view' => view('ohther.ajax.admin.size_list')->with('list_size', $results)->with('i', $i)->render(),
            'counMess' => "Có " . $count . " kết quả trả về",

        ]);
    }
    public function todolist_filter(Request $request)
    {
        $input = $request->input('content');
        $params = $this->sizeParams();
        $results = $this->ajaxModel->filter_ajax($params['table_name'], $params['status'], $input)->get();
        $i = 1;
        $count = $this->ajaxModel->filter_ajax($params['table_name'], $params['status'], $input)->count();
        return response()->json([
            'view' => view('ohther.ajax.admin.size_list')->with('list_size', $results)->with('i', $i)->render(),
            'counMess' => "Có " . $count . " kết quả trả về",

        ]);
    }
    public function todolist_loadmore(Request $request)
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

    public function todolist_return()
    {
        $params = $this->sizeParams();
        $results = $this->ajaxModel->returnTable_ajax($params['table_name'], $params['primary_id'])->paginate(10);
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
    public function selete_bill(Request $request)
    {
        $status = $request->status;

        $listPayment = $this->ajaxModel->getDatapayment($status)->paginate(30);

        return response()->json([
            'view' => view('ohther.ajax.admin.payment_list')->with('list_payment', $listPayment)->with('i', 1)
                ->render(),
        ]);
    }
    public function postCmt(Request $request)
    {
        $context = $request->input('context');
        $resId = intval($request->input('resId')) ?: null;
        $product_id = intval($request->input('product_id'));
     
        $cmt_id = $this->ajaxModel->post_cmt($context, $resId, $product_id);
        $getCmt = $this->ajaxModel->getCmtDeatilAdmin($product_id, $cmt_id)->first();
        if ($resId !== null) {
            return response()->json([
                'view' => view('ohther.ajax.admin.cmt_deatilReqly')->with('cmt_deatil', $getCmt)->with('i', 1)
                    ->render(),
                'cmt_id' => $cmt_id,
            ]);
        }
        return response()->json([
            'view' => view('ohther.ajax.admin.cmt_deatil')->with('cmt_deatil', $getCmt)->with('i', 1)
                ->render(),
            'cmt_id' => $cmt_id
        ]);
    }
    public function getLoadmoreCmt(Request $request,$cmt_id)
    {
        $product_id = intval($request->input('product_id'));
        $cmt_list = $this->ajaxModel->getListCmt($product_id, $cmt_id)->get();
        return response()->json([
            'view' => view('ohther.ajax.admin.cmt_ListReqly')->with('cmt_list', $cmt_list)->with('i', 1)
                ->render(),
            'cmt_id' => $cmt_id
        ]);
    }
    public function getdataCategoryExcel()
    {
        $params = $this->categoryParams();
        $results = $this->ajaxModel->getDataExcel($params['table_name'], $params['primary_id']);
        return response()->json([
            'status' => 'success',
            'results' => $results,
            'title' => 'Danh mục'
        ]);
    }
    public function getdataPhanLoaiExcel()
    {
        $params = $this->phanloaiParams();
        $results = $this->ajaxModel->getDataExcel($params['table_name'], $params['primary_id']);
        return response()->json([
            'status' => 'success',
            'results' => $results,
            'title' => 'Phân loại'
        ]);
    }
    public function getdatacolorExcel()
    {
        $params = $this->colorParams();
        $results = $this->ajaxModel->getDataExcel($params['table_name'], $params['primary_id']);
        return response()->json([
            'status' => 'success',
            'results' => $results,
            'title' => 'Màu sắc'
        ]);
    }
    public function getdatasizeExcel()
    {
        $params = $this->sizeParams();
        $results = $this->ajaxModel->getDataExcel($params['table_name'], $params['primary_id']);
        return response()->json([
            'status' => 'success',
            'results' => $results,
            'title' => 'kích cỡ'
        ]);
    }
    public function getdatabrandeExcel()
    {
        $params = $this->brandParams();
        $results = $this->ajaxModel->getDataExcel($params['table_name'], $params['primary_id']);
        return response()->json([
            'status' => 'success',
            'results' => $results,
            'title' => 'thương hiệu'
        ]);
    }
    public function getdatabmaterialeExcel()
    {
        $params = $this->materialParams();
        $results = $this->ajaxModel->getDataExcel($params['table_name'], $params['primary_id']);
        return response()->json([
            'status' => 'success',
            'results' => $results,
            'title' => 'chất liệu'
        ]);
    }
    public function getdatabPermissionGroupExcel()
    {
        $params = $this->PermissionGroupParams();
        $results = $this->ajaxModel->getDataExcel($params['table_name'], $params['primary_id']);
        return response()->json([
            'status' => 'success',
            'results' => $results,
            'title' => 'nhóm quyền'
        ]);
    }
    public function getdatabPositionExcel()
    {
        $params = $this->positionParams();
        $results = $this->ajaxModel->getDataExcel($params['table_name'], $params['primary_id']);
        return response()->json([
            'status' => 'success',
            'results' => $results,
            'title' => 'chức vụ'
        ]);
    }
    public function getdatabMethodPaymentExcel()
    {
        $params = $this->methodPaymentParams();
        $results = $this->ajaxModel->getDataExcel($params['table_name'], $params['primary_id']);
        return response()->json([
            'status' => 'success',
            'results' => $results,
            'title' => 'Phương thức thanh toán'
        ]);
    }
    public function getdatastatusPaymentExcel()
    {
        $params = $this->statusPaymentParams();
        $results = $this->ajaxModel->getDataExcel($params['table_name'], $params['primary_id']);
        return response()->json([
            'status' => 'success',
            'results' => $results,
            'title' => 'Trạng thái đơn hàng'
        ]);
    }
    public function getdataShipExcel()
    {
        $params = $this->shipParams();
        $results = $this->ajaxModel->getDataExcel($params['table_name'], $params['primary_id']);
        return response()->json([
            'status' => 'success',
            'results' => $results,
            'title' => 'Phương thức ship'
        ]);
    }
    public function getdataBlogExcel()
    {
        $params = $this->BlogParams();
        $results = $this->ajaxModel->getDataExcel($params['table_name'], $params['primary_id']);
        return response()->json([
            'status' => 'success',
            'results' => $results,
            'title' => 'Bài viết'
        ]);
    }
}
