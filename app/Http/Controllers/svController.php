<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\notifications;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use App\Models\UserAdmin;
use App\Models\User;
use DB;

class svController extends Controller
{
    //
	public function index()
	{
		# code...
		$theme = DB::select(DB::raw("SELECT * FROM theme WHERE idmau='1'"));
		$email = Auth::user()->email;
		$getinf = DB::select(DB::raw("SELECT HoTen, LopSH FROM sinhvien WHERE Email='$email'"));
		$getlop = $getinf[0]->LopSH;
		$getten = $getinf[0]->HoTen;
		// echo($getlop);
		$tkb = DB::select(DB::raw("SELECT tkb.Ngay,tkb.MaTKB,tkb.MaMon,tkb.Phong,tkb.Thu,tkb.Tiet FROM tkb,monhoc WHERE tkb.MaMon=monhoc.TenMon AND monhoc.TenLop='$getlop'"));

		$dsmon = DB::select(DB::raw("SELECT monhoc.TenMon, giangvien.HoTenGV FROM giangvien, monhoc, sinhvien WHERE monhoc.TenLop=sinhvien.LopSH AND monhoc.TenLop='$getlop' AND giangvien.Email = monhoc.GV AND sinhvien.HoTen = '$getten'"));
		// print_r($results);

		return view('sv.index', ['svtkb' => $tkb,'dsmon'=>$dsmon, 'lop'=>$getlop, 'theme'=>$theme]);
	}

	public function lichhocchitiet()
	{
		# code...
		$email = Auth::user()->email;
		$theme = DB::select(DB::raw("SELECT * FROM theme WHERE idmau='1'"));
		$getinf = DB::select(DB::raw("SELECT HoTen, LopSH FROM sinhvien WHERE Email='$email'"));
		$getlop = $getinf[0]->LopSH;
		$getten = $getinf[0]->HoTen;
		$tkbchitiet = DB::select(DB::raw("SELECT tkb.Ngay,tkb.MaTKB,tkb.MaMon,tkb.Phong,tkb.Thu,tkb.Tiet, giangvien.HoTenGV FROM tkb,monhoc,giangvien,sinhvien WHERE tkb.MaMon=monhoc.TenMon AND monhoc.TenLop='$getlop' AND monhoc.GV=giangvien.Email AND sinhvien.HoTen = '$getten' ORDER BY tkb.Thu ASC"));
		return view('sv.lhchitiet', ['svtkb' => $tkbchitiet, 'lop'=>$getlop, 'theme'=>$theme]);
	}

	public function maps()
	{
		# code...
		$email = Auth::user()->email;
		$theme = DB::select(DB::raw("SELECT * FROM theme WHERE idmau='1'"));
		$getinf = DB::select(DB::raw("SELECT HoTen, LopSH FROM sinhvien WHERE Email='$email'"));
		$getlop = $getinf[0]->LopSH;
		return view('sv.maps')->with('lop', $getlop)->with('theme', $theme);
	}
	public function lienhe()
    {
    	$theme = DB::select(DB::raw("SELECT * FROM theme WHERE idmau='1'"));
        $tests = DB::table('giangvien')->get();
        $email = Auth::user()->email;
		$getinf = DB::select(DB::raw("SELECT HoTen, LopSH FROM sinhvien WHERE Email='$email'"));
		$getlop = $getinf[0]->LopSH;
		// var_dump($theme[0]->nav);
		// die();
        return view('sv.gvinfor', ['tests' => $tests,'theme' => $theme])->with('lop', $getlop);
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
                    $output .= ' + '.$row->TenMon . ' <br>';
                }
                //    $output .= '</ul>';
                echo $output;
            } else echo 'chưa cập nhật';
        }
    }

    function theme(Request $request)
    {
        if ($request->get('nav')) {
            $nav = $request->get('nav');
            $side = $request->get('side');
            $bg = $request->get('bg');
            $span = $request->get('span');
            $data = DB::update(DB::raw("UPDATE theme SET nav = '".$nav."',side = '".$side."',bg = '".$bg."', span = '".$span."' WHERE theme.idmau = 1"));
            if (!empty($data)) {
                // var_dump($data);
                // die();
                $output = 'done';
                
                //    $output .= '</ul>';
                echo $output;
            } else echo 'chưa cập nhật';
        }
    }
}
