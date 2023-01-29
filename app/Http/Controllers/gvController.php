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

class gvController extends Controller
{
    //
	public function index()
	{
		# code...
		$giangvien = Auth::user()->email;
		$results = DB::select(DB::raw("SELECT giangvien.HoTenGV, monhoc.TenMon, tkb.Phong, tkb.Thu, tkb.Tiet, monhoc.TenLop FROM giangvien,`tkb`,`monhoc`WHERE giangvien.Email = monhoc.GV AND monhoc.TenMon = tkb.MaMon AND giangvien.Email = '$giangvien'"));
        if (empty($results)) {
            $results = NULL;
            echo '<div class="alert alert-danger" role="alert">
                        Giảng viên không tồn tại!!
                    </div>';
            return view('gv.index');
        } else
            return view('gv.index', ['results' => $results]);
	}

    public function lichdaychitiet()
    {
        # code...
        $email = Auth::user()->email;
        $getinf = DB::select(DB::raw("SELECT HoTenGV FROM giangvien WHERE Email='$email'"));
        $getten = $getinf[0]->HoTenGV;
        $tkbchitiet = DB::select(DB::raw("SELECT tkb.MaMon,tkb.Phong,tkb.Thu,tkb.Tiet, monhoc.TenLop FROM tkb,monhoc,giangvien,lophocphan WHERE tkb.MaMon=monhoc.TenMon AND monhoc.GV=giangvien.Email AND giangvien.HoTenGV = '$getten' AND monhoc.TenLop=lophocphan.TenLop ORDER BY tkb.Thu"));
        return view('gv.ldchitiet', ['gvtkb' => $tkbchitiet]);
    }

    public function maps()
    {
        # code...
        return view('gv.maps');
    }
}
