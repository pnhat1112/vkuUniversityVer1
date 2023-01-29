<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\tkb;
use Illuminate\Support\Facades\Redirect;


class Controller extends BaseController
{
    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests;
        
    public function getData()
    {
        $tkball = DB::table('tkb')->get();
        $monall = DB::table('monhoc')->get();
        // SELECT tkb.MaMon,tkb.Phong,tkb.Thu,tkb.Tiet FROM tkb,monhoc WHERE tkb.MaMon=monhoc.TenMon AND monhoc.TenLop='18IT3'
        return view('admin.add-subject', [
            'tkball' => $tkball, 'monall' => $monall
            // , 'tests' => $tests
        ]);
        // return view('welcome')->with($tkball,$monall);
    }
    public function svtkb(Request $request)
    {
        if (empty($request->sinhvien)) {
            $results = NULL;
            return view('admin.sv-schedule');
        } else {
            $getlop = DB::select(DB::raw("SELECT LopSH FROM sinhvien WHERE HoTen='$request->sinhvien'"));
            if (empty($getlop)) {
                echo '<div class="alert alert-danger" role="alert">
                        Sinh viên không tồn tại!!
                    </div>';
                return view('admin.sv-schedule');
            } else {
                $getlop = $getlop[0]->LopSH;
                $results = DB::select(DB::raw("SELECT tkb.Ngay,tkb.MaTKB,tkb.MaMon,tkb.Phong,tkb.Thu,tkb.Tiet FROM tkb,monhoc WHERE tkb.MaMon=monhoc.TenMon AND monhoc.TenLop='$getlop'"));
                // SELECT monhoc.TenMon, giangvien.HoTenGV FROM giangvien, monhoc,sinhvien WHERE monhoc.TenLop=sinhvien.LopSH AND monhoc.TenLop='19IT3' AND giangvien.Email = monhoc.GV
                $query = DB::select(DB::raw("SELECT monhoc.TenMon, giangvien.HoTenGV FROM giangvien, monhoc,sinhvien WHERE monhoc.TenLop=sinhvien.LopSH AND monhoc.TenLop='$getlop' AND giangvien.Email = monhoc.GV"));
                return view('admin.sv-schedule', ['svtkb' => $results,'dsmon'=>$query]);
            }
        }
    }
    public function addTo(Request $request)
    {
        $check = DB::select(DB::raw("SELECT * FROM `tkb`WHERE Phong='$request->phong' AND Thu='$request->thu' AND Tiet='$request->tiet'"));
        $check1 = DB::select(DB::raw("SELECT * FROM `tkb`WHERE MaMon='$request->mon' AND Thu='$request->thu' AND Tiet='$request->tiet'"));
        // var_dump($check1);
        if (empty($check) && empty($check1)) {
            DB::insert(DB::raw("INSERT INTO tkb(MaMon,Phong, Thu, Tiet) VALUES('$request->mon','$request->phong','$request->thu','$request->tiet')"));
            return $this->getData();
        } else {
            if (!empty($check)) {
                echo '<div class="alert alert-danger" role="alert">
            Phòng ' . $check[0]->Phong . ' vào ngày thứ ' . $check[0]->Thu . ', tiết ' . $check[0]->Tiet . ', đã được học phần ' . $check[0]->MaMon . ' sử dụng
          </div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">
          Môn ' . $check1[0]->MaMon . ' vào ngày thứ ' . $check1[0]->Thu . ', tiết ' . $check1[0]->Tiet . ', sẽ được học tại phòng ' . $check1[0]->Phong . '</div>';
            }
            return $this->getData();
        }
    }
    public function fileUpload(Request $request)
    {
        $fileName = time().'_'.$request->file->getClientOriginalName();
        $filePath = $request->file('file')->storeAs('gv', $fileName, 'public');
        $newPath = 'storage/app/public/' . $filePath;
        DB::table('giangvien')->insert(
            array('HoTenGV' => $request->name, 'Email' => $request->mail, 'avatar' => $newPath)
        );
        return  back()->with('success','Giảng viên đã được thêm thành công.');
    }
    public function upload()
    {
        $tests = DB::table('giangvien')->get();
        return view('admin.manager-gv', ['tests' => $tests]);
    }

    // SELECT giangvien.HoTenGV, monhoc.TenMon, tkb.Phong, tkb.Thu, tkb.Tiet, monhoc.TenLop FROM giangvien,`tkb`,`monhoc`WHERE giangvien.Email = monhoc.GV AND monhoc.TenMon = tkb.MaMon AND giangvien.Email = 'dtmnga@vku.udn.vn'
    public function lichDay(Request $request)
    {
        $results = DB::select(DB::raw("SELECT giangvien.HoTenGV, monhoc.TenMon, tkb.Phong, tkb.Thu, tkb.Tiet, monhoc.TenLop FROM giangvien,`tkb`,`monhoc`WHERE giangvien.Email = monhoc.GV AND monhoc.TenMon = tkb.MaMon AND giangvien.Email = '$request->giangvien'"));
        if (empty($results)) {
            $results = NULL;
            echo '<div class="alert alert-danger" role="alert">
                        Giảng viên không tồn tại!!
                    </div>';
            return view('admin.gv-schedule');
        } else
            return view('admin.gv-schedule', ['results' => $results]);
    }
    public function editGV(Request $request, $id)
    {
        $path = "";
        if (!empty($request->file)) {
           $fileName = time().'_'.$request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('gv', $fileName, 'public');
            $path = 'storage/app/public/' . $filePath;
        } else {
            $path = DB::select(DB::raw("SELECT avatar FROM giangvien WHERE MaGV='$id'"));
            // var_dump($path[0]->avatar);
            // die();
            $path = $path[0]->avatar;
        }
        // var_dump($path);
        $statement = DB::update(DB::raw("UPDATE giangvien SET HoTenGV = '$request->name',Email='$request->mail',avatar='$path' WHERE MaGV='$id'"));
        return redirect::to('admin/manager-gv');
    }
    public function xoaGV($id)
    {

        $statement = DB::delete(DB::raw("DELETE FROM giangvien WHERE MaGV='$id'"));
        return redirect::to('admin/manager-gv');
    }

    function detailgv(Request $request)
    {
        if ($request->get('query')) {
            $query = $request->get('query');
            $data = DB::select(DB::raw("SELECT TenMon FROM monhoc WHERE GV='$query'"));
            if (!empty($data)) {
                // var_dump($data);
                // die();
                $output = '';
                foreach ($data as $row) {
                    $output .= $row->TenMon . ' <br>';
                }
                //    $output .= '</ul>';
                echo $output;
            } else echo 'chưa cập nhật';
        }
    }
    function dsmonsv($lop)
    {
        // SELECT monhoc.TenMon, giangvien.HoTenGV FROM giangvien, monhoc,sinhvien WHERE monhoc.TenLop=sinhvien.LopSH AND monhoc.TenLop='19IT3' AND giangvien.Email = monhoc.GV
        $query = DB::select(DB::raw("SELECT monhoc.TenMon, giangvien.HoTenGV FROM giangvien, monhoc,sinhvien WHERE monhoc.TenLop=sinhvien.LopSH AND monhoc.TenLop='$lop' AND giangvien.Email = monhoc.GV
        "));
        return view('sinhvien', ['dsmon' => $query]);
    }
}
