<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Models\notifications;
use App\Models\events;
use App\Models\notifications_khtc;
use App\Models\notifications_ttdn;
use App\Models\tkb;
use Illuminate\Support\Facades\Redirect;
use DB;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
    //

	public function admin()
	{
    	# code...
    	if (Auth::user()->level == 1) {
    		# code...
	    	$monhoc = DB::select(DB::raw("SELECT * FROM monhoc"));
	    	$lophoc = DB::select(DB::raw("SELECT * FROM lophocphan"));
			return view('admin.index')->with('monhoc', $monhoc)->with('lophoc', $lophoc);
    	} else {
    		Auth::logout();
    		return redirect('index');
    	}
	}

	public function maps()
	{
        # code...
        if (Auth::user()->level == 1) {
    		# code...
			return view('admin.maps');
    	} else {
    		Auth::logout();
    		return redirect('index');
    	}
	}

	public function notice()
	{
        # code...
		return view('admin.post-notifications');
	}

	public function noticeEdit($id)
	{
        # code...
        $edit = notifications::find($id);
		return view('admin.post-notifications')->with('edit', $edit);
	}

	public function noticeUpdate(Request $req, $id)
	{
		# code...

		if($req->file) {

			$notice = notifications::find($id);
			$fileName = time().'_'.$req->file->getClientOriginalName();
			$filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');

			$notice->title = $req->title;
			$notice->slug = $req->slug;
			$notice->content = $req->txtEditContent;
			$notice->fileName = $req->file->getClientOriginalName();
			$notice->filePath = 'storage/app/public/' . $filePath;
			$notice->save();
			$data = notifications::orderBy('id', 'desc')->paginate(5);
			return redirect('admin/view-notifications')->with('data', $data);
		}
		else {

			$notice = notifications::find($id);
			$notice->title = $req->title;
			$notice->slug = $req->slug;
			$notice->content = $req->txtEditContent;

			$notice->save();
			$data = notifications::orderBy('id', 'desc')->paginate(5);
			return redirect('admin/view-notifications')->with('data', $data);
		}

	}

	public function noticeDelete($id)
	{
		# code...
		$notice = notifications::find($id);
		$notice->delete();

		return back();
	}

	public function uploadThongBao(Request $req)
	{
        # code...

		$req->validate([
			'file' => 'mimes:csv,txt,docx,doc,jpg,pptx,xlx,xls,xlsx,pdf|max:2048'
		]);

		$fileModel = new notifications;

		if($req->file()) {
			$fileName = time().'_'.$req->file->getClientOriginalName();
			$filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');

			$fileModel->title = $req->title;
			$fileModel->slug = $req->slug;
			$fileModel->content = $req->mytextarea;
			$fileModel->fileName = $req->file->getClientOriginalName();
			$fileModel->filePath = 'storage/app/public/' . $filePath;
			$fileModel->save();

			return back()
			->with('success','Thông báo đã được đăng thành công.')
			->with('file', $fileName);
		}
		$fileModel->title = $req->title;
		$fileModel->slug = $req->slug;
		$fileModel->content = $req->mytextarea;
		$fileModel->fileName = '';
		$fileModel->filePath = '';
		$fileModel->save();
		return back()
		->with('success','Thông báo đã được đăng thành công.');
	}

	public function viewNotifications(Request $req)
	{
    	# code...
		$data = notifications::orderBy('id', 'desc')->paginate(5);
		return view('admin.view-notifications')->with('data', $data);
	}

	public function event()
	{
		return view('admin.post-event');
	}

	public function uploadEvent(Request $req)
	{
        # code...
		$event = new events;

		$event->nameEvent = $req->nameEvent;
		$event->time = $req->time;
		$event->save();

		return back()
		->with('success','Sự kiện đã được đăng thành công.');
	}

	public function eventEdit($id)
	{
        # code...
        $edit = events::find($id);
		return view('admin.post-event')->with('edit', $edit);
	}

	public function eventUpdate(Request $req, $id)
	{
		# code...
		$events = events::find($id);
		$events->nameEvent = $req->nameEvent;
		$events->time = $req->time;
		$events->save();

		$data = events::orderBy('id', 'desc')->paginate(5);
		return redirect('admin/view-events')->with('data', $data);

	}

	public function eventDelete($id)
	{
		# code...
		$events = events::find($id);
		$events->delete();

		return back();
	}

	public function viewEvents(Request $req)
	{
    	# code...
		$data = events::orderBy('id', 'desc')->paginate(10);
		return view('admin.view-events',compact('data'));
	}


	public function khtc()
	{
        # code...
		return view('admin.post-notifications-khtc');
	}

	public function uploadkhtc(Request $req)
	{
        # code...

		$req->validate([
			'file' => 'mimes:csv,txt,docx,doc,jpg,pptx,xlx,xls,xlsx,pdf|max:2048'
		]);

		$fileModel = new notifications_khtc;

		if($req->file()) {
			$fileName = time().'_'.$req->file->getClientOriginalName();
			$filePath = $req->file('file')->storeAs('notifications-khtc', $fileName, 'public');

			$fileModel->title = $req->title;
			$fileModel->slug = $req->slug;
			$fileModel->content = $req->mytextarea;
			$fileModel->fileName = $req->file->getClientOriginalName();
			$fileModel->filePath = 'storage/app/public/' . $filePath;
			$fileModel->save();

			return back()
			->with('success','Thông báo đã được đăng thành công.')
			->with('file', $fileName);
		}
		$fileModel->title = $req->title;
		$fileModel->slug = $req->slug;
		$fileModel->content = $req->mytextarea;
		$fileModel->fileName = '';
		$fileModel->filePath = '';
		$fileModel->save();
		return back()
		->with('success','Thông báo đã được đăng thành công.');
	}

	public function noticekhtcEdit($id)
	{
        # code...
        $edit = notifications_khtc::find($id);
		return view('admin.post-notifications-khtc')->with('edit', $edit);
	}

	public function noticekhtcUpdate(Request $req, $id)
	{
		# code...
		if($req->file) {
			$notice = notifications_khtc::find($id);
			$fileName = time().'_'.$req->file->getClientOriginalName();
			$filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');

			$notice->title = $req->title;
			$notice->slug = $req->slug;
			$notice->content = $req->mytextarea;
			$notice->fileName = $req->file->getClientOriginalName();
			$notice->filePath = 'storage/app/public/' . $filePath;
			$notice->save();
			$data = notifications::orderBy('id', 'desc')->paginate(5);
			return redirect('admin/view-notifications-khtc')->with('data', $data);
		} else {
			$notice = notifications_khtc::find($id);
			$notice->title = $req->title;
			$notice->slug = $req->slug;
			$notice->content = $req->mytextarea;

			$notice->save();
			$data = notifications_khtc::orderBy('id', 'desc')->paginate(5);
			return redirect('admin/view-notifications-khtc')->with('data', $data);
		}

	}

	public function noticekhtcDelete($id)
	{
		# code...
		$notice = notifications_khtc::find($id);
		$notice->delete();

		return back();
	}

	public function viewkhtc(Request $req)
	{
    	# code...
		$data = notifications_khtc::orderBy('id', 'desc')->paginate(5);
		return view('admin.view-notifications-khtc',compact('data'));
	}

	public function ttdn()
	{
        # code...
		return view('admin.post-notifications-ttdn');
	}

	public function uploadttdn(Request $req)
	{
        # code...

		$req->validate([
			'file' => 'mimes:csv,txt,docx,doc,jpg,pptx,xlx,xls,xlsx,pdf|max:2048'
		]);

		$fileModel = new notifications_ttdn;

		if($req->file()) {
			$fileName = time().'_'.$req->file->getClientOriginalName();
			$filePath = $req->file('file')->storeAs('notifications-ttdn', $fileName, 'public');

			$fileModel->title = $req->title;
			$fileModel->slug = $req->slug;
			$fileModel->content = $req->mytextarea;
			$fileModel->fileName = $req->file->getClientOriginalName();
			$fileModel->filePath = 'storage/app/public/' . $filePath;
			$fileModel->save();

			return back()
			->with('success','Thông báo đã được đăng thành công.')
			->with('file', $fileName);
		}
		$fileModel->title = $req->title;
		$fileModel->slug = $req->slug;
		$fileModel->content = $req->mytextarea;
		$fileModel->fileName = '';
		$fileModel->filePath = '';
		$fileModel->save();
		return back()
		->with('success','Thông báo đã được đăng thành công.');
	}

	public function noticettdnEdit($id)
	{
        # code...
        $edit = notifications_ttdn::find($id);
		return view('admin.post-notifications-ttdn')->with('edit', $edit);
	}

	public function noticettdnUpdate(Request $req, $id)
	{
		# code...
		if($req->file) {
			$notice = notifications_ttdn::find($id);
			$fileName = time().'_'.$req->file->getClientOriginalName();
			$filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');

			$notice->title = $req->title;
			$notice->slug = $req->slug;
			$notice->content = $req->mytextarea;
			$notice->fileName = $req->file->getClientOriginalName();
			$notice->filePath = 'storage/app/public/' . $filePath;
			$notice->save();
			$data = notifications_ttdn::orderBy('id', 'desc')->paginate(5);
			return redirect('admin/view-notifications-khtc')->with('data', $data);
		} else {
			$notice = notifications_ttdn::find($id);
			$notice->title = $req->title;
			$notice->slug = $req->slug;
			$notice->content = $req->mytextarea;

			$notice->save();
			$data = notifications_ttdn::orderBy('id', 'desc')->paginate(5);
			return redirect('admin/view-notifications-ttdn')->with('data', $data);
		}

	}

	public function noticettdnDelete($id)
	{
		# code...
		$notice = notifications_ttdn::find($id);
		$notice->delete();

		return back();
	}

	public function viewttdn(Request $req)
	{
    	# code...
		$data = notifications_ttdn::orderBy('id', 'desc')->paginate(5);

		return view('admin.view-notifications-ttdn',compact('data'));
	}

	public function getData()
    {
        $tkball = DB::table('tkb')->get();
        $monall = DB::table('monhoc')->get();
        return view('admin.add-subject', [
            'tkball' => $tkball, 'monall' => $monall
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
				$getten = $request->sinhvien;
                $results = DB::select(DB::raw("SELECT tkb.Ngay,tkb.MaTKB,tkb.MaMon,tkb.Phong,tkb.Thu,tkb.Tiet FROM tkb,monhoc WHERE tkb.MaMon=monhoc.TenMon AND monhoc.TenLop='$getlop'"));
                // SELECT monhoc.TenMon, giangvien.HoTenGV FROM giangvien, monhoc,sinhvien WHERE monhoc.TenLop=sinhvien.LopSH AND monhoc.TenLop='19IT3' AND giangvien.Email = monhoc.GV
                $query = DB::select(DB::raw("SELECT monhoc.TenMon, giangvien.HoTenGV FROM giangvien, monhoc,sinhvien WHERE monhoc.TenLop=sinhvien.LopSH AND monhoc.TenLop='$getlop' AND giangvien.Email = monhoc.GV AND sinhvien.HoTen = '$getten'"));
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
        return redirect::to('/admin/manager-gv');
    }
    public function xoaGV($id)
    {

        $statement = DB::delete(DB::raw("DELETE FROM giangvien WHERE MaGV='$id'"));
        return redirect::to('/admin/manager-gv');
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
    function dsmonsv($lop)
    {
        // SELECT monhoc.TenMon, giangvien.HoTenGV FROM giangvien, monhoc,sinhvien WHERE monhoc.TenLop=sinhvien.LopSH AND monhoc.TenLop='19IT3' AND giangvien.Email = monhoc.GV
        $query = DB::select(DB::raw("SELECT monhoc.TenMon, giangvien.HoTenGV FROM giangvien, monhoc,sinhvien WHERE monhoc.TenLop=sinhvien.LopSH AND monhoc.TenLop='$lop' AND giangvien.Email = monhoc.GV
        "));
        return view('sinhvien', ['dsmon' => $query]);
    }
	
}
