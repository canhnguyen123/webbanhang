<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class theloaiModel extends Model
{
    protected $table = 'tbl_theloai'; // Tên bảng mà model này liên kết với
    protected $primaryKey = 'theloai_id'; // Tên cột khóa chính của bảng
    protected $pagination = 'tbl_pagination';  
    public function getPagination(){
        $result=DB::table($this->pagination)->where('pagination_tbl',$this->table);
       return $result;
   }
    public function getListTable($setTable,$setcolumstatus){
        $result=DB::table($setTable)->where($setcolumstatus,1)->get();
        return $result;
    }
    public function showHome($status){
        $result=   DB::table('tbl_theloaishowhome')
        ->join('tbl_theloai', 'tbl_theloaishowhome.theloai_id', '=', 'tbl_theloai.theloai_id')
        ->join('tbl_category', 'tbl_theloai.category_id', '=', 'tbl_category.category_id')
        ->join('tbl_phanloai', 'tbl_theloai.phanloai_id', '=', 'tbl_phanloai.phanloai_id')
        ->where('tbl_theloaishowhome.theloaiShowHome_status',$status)
        ->select('tbl_theloai.*', 'tbl_phanloai.phanloai_name', 'tbl_category.category_name')
        ->get();
        return $result;
    }
    public function checkedHome($status){
        $result=   DB::table('tbl_theloaichecked')
        ->join('tbl_theloai', 'tbl_theloaichecked.theloai_id', '=', 'tbl_theloai.theloai_id')
        ->join('tbl_category', 'tbl_theloai.category_id', '=', 'tbl_category.category_id')
        ->join('tbl_phanloai', 'tbl_theloai.phanloai_id', '=', 'tbl_phanloai.phanloai_id')
        ->where('tbl_theloaichecked.theloaichecked_status',$status)
        ->select('tbl_theloai.*', 'tbl_phanloai.phanloai_name', 'tbl_category.category_name')
        ->get();
        return $result;
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function phanloai()
    {
        return $this->belongsTo(Phanloai::class, 'phanloai_id');
    }
    public function getList(){
        $result = DB::table('tbl_theloai')
        ->join('tbl_category', 'tbl_theloai.category_id', '=', 'tbl_category.category_id')
        ->join('tbl_phanloai', 'tbl_theloai.phanloai_id', '=', 'tbl_phanloai.phanloai_id')
        ->select('tbl_theloai.*', 'tbl_category.category_name', 'tbl_phanloai.phanloai_name')
        ;
        return $result;
    }
    public function addtheloai($nametheloai, $theloaiCode ,$category_id ,$phanloai_id ,$linkImg)
{
    $data = [
        'theloai_name' => $nametheloai,
        'theloai_code' => $theloaiCode,
        'category_id' => $category_id,
        'phanloai_id' => $phanloai_id,
        'theloai_img' => $linkImg,
        'theloai_status' => 1,
    ];

    try {
        $result = DB::table($this->table)->insert($data);
        return $result; // Trả về true nếu thành công, false nếu thất bại
    } catch (\Exception $e) {
        return false;
    }
}
   
    public function updatetheloai($nametheloai, $theloaiCode ,$category_id ,$phanloai_id ,$linkImg,$theloai_id)
    {
        $data = [
            'theloai_name' => $nametheloai,
            'theloai_code' => $theloaiCode,
            'category_id' => $category_id,
            'phanloai_id' => $phanloai_id,
            'theloai_img' => $linkImg,
        ];
    
        try {
            $result = DB::table($this->table)->where('theloai_id',$theloai_id)->update($data);
            return $result; 
        } catch (\Exception $e) {
            return false;
        }
    }
    public function checkDatabase( $theloaiCode) {
        return DB::table($this->table)
            ->Where('theloai_code', $theloaiCode)
            ->exists();
    }
    public function checkDatabaseIs($code, $theloai_id) {
        return DB::table($this->table)
            ->where('theloai_code', $code)
            ->where('theloai_id', '<>', $theloai_id)
            ->exists();
    }
    public function status_toggle($status,$theloai_id){
        $data['theloai_status']=$status;
        try {
            $result =   DB::table($this->table)->where('theloai_id',$theloai_id)->update($data); 
            return $result; // Trả về true nếu thành công, false nếu thất bại
        } catch (\Exception $e) {
            return false;
        }
    }
    public function updateShowHome($listTheLoai)
    {
        try {
            // Lấy danh sách theloai_id từ bảng tbl_theloaishowhome
            $existingIds = DB::table('tbl_theloaishowhome')->pluck('theloai_id')->all();
    
            // Trường hợp 1: Thêm mới bản ghi cho theloai_id chưa tồn tại
            foreach ($listTheLoai as $theloaiId) {
                if (!in_array($theloaiId, $existingIds)) {
                    DB::table('tbl_theloaishowhome')->insert([
                        'theloai_id' => $theloaiId,
                        'theloaiShowHome_status' => 1
                    ]);
                }
            }
    
            // Trường hợp 2: Cập nhật trạng thái từ 1 thành 0 nếu không nằm trong listTheLoai
            DB::table('tbl_theloaishowhome')
                ->whereNotIn('theloai_id', $listTheLoai)
                ->where('theloaiShowHome_status', 1)
                ->update(['theloaiShowHome_status' => 0]);
    
            // Trường hợp 3: Cập nhật trạng thái từ 0 thành 1 nếu nằm trong listTheLoai
            DB::table('tbl_theloaishowhome')
                ->whereIn('theloai_id', $listTheLoai)
                ->where('theloaiShowHome_status', 0)
                ->update(['theloaiShowHome_status' => 1]);
    
            // Trường hợp 4: Giữ nguyên trạng thái nếu đã tồn tại và trạng thái đã là 1
    
            return true;
        } catch (\Exception $e) {
            // Xử lý lỗi nếu cần
            return false;
        }
    }
    public function updateCheckHome($listTheLoai)
    {
        try {
            // Lấy danh sách theloai_id từ bảng tbl_theloaishowhome
            $existingIds = DB::table('tbl_theloaichecked')->pluck('theloai_id')->all();
    
            // Trường hợp 1: Thêm mới bản ghi cho theloai_id chưa tồn tại
            foreach ($listTheLoai as $theloaiId) {
                if (!in_array($theloaiId, $existingIds)) {
                    DB::table('tbl_theloaichecked')->insert([
                        'theloai_id' => $theloaiId,
                        'theloaichecked_status' => 1
                    ]);
                }
            }
    
            // Trường hợp 2: Cập nhật trạng thái từ 1 thành 0 nếu không nằm trong listTheLoai
            DB::table('tbl_theloaichecked')
                ->whereNotIn('theloai_id', $listTheLoai)
                ->where('theloaichecked_status', 1)
                ->update(['theloaichecked_status' => 0]);
    
            // Trường hợp 3: Cập nhật trạng thái từ 0 thành 1 nếu nằm trong listTheLoai
            DB::table('tbl_theloaichecked')
                ->whereIn('theloai_id', $listTheLoai)
                ->where('theloaichecked_status', 0)
                ->update(['theloaichecked_status' => 1]);
    
            // Trường hợp 4: Giữ nguyên trạng thái nếu đã tồn tại và trạng thái đã là 1
    
            return true;
        } catch (\Exception $e) {
            // Xử lý lỗi nếu cần
            return false;
        }
    }
}
