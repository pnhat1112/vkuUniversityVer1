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
use Socialite;

class loginController extends Controller
{
    //
	public function redirect($provider)
	{
		return Socialite::driver($provider)->redirect();
	}

	public function callback($provider)
	{

		try {
			$user = Socialite::driver($provider)->stateless()->user();
		} catch(\Exception $e) {
		}

		// $user = $this->createUser($getInfo,$provider);

		// if(explode("@", $user->email)[1] !== 'vku.udn.vn'){
  //           return redirect()->to('/login')->withErrors("Vui lòng sử dụng gmail @vku");
  //       }

		$existingUser = User::where('email', $user->email)->first();

		if($existingUser){
            // log them in
			Auth()->login($existingUser, true);
			if (Auth::user()->level == '1') {
				return redirect('admin/index');
			} else if (Auth::user()->level == '2') {
				return Redirect('/gv/lich-day-theo-tuan');
			} else if (Auth::user()->level == '3') {
				return Redirect('/sv/lich-hoc-theo-tuan');
			}
		} else {
            // create a new user
			// $newUser                    = new User;
			// $newUser->provider_name     = $driver;
			// $newUser->provider_id       = $user->getId();
			// $newUser->name              = $user->getName();
			// $newUser->email             = $user->getEmail();
			// $newUser->level = '1';
			// $newUser->email_verified_at = now();
			// $newUser->save();
			return Redirect::to('/login')->withInput()->withErrors("Bạn không phải là thành viên");
		}

		return redirect('login');

	}
	function createUser($getInfo,$provider){

		$user = User::where('provider_id', $getInfo->id)->first();

		if (empty($user)) {
			return Redirect::to('/login')->withInput()->withErrors("Bạn không phải là thành viên");
		} else {
			return $user;
		}
	}


	public function validator(array $data)
	{
		# code...
		return Validator::make($data, [
			'email' => 'required|email|max:255',
			'password' => 'required|min:6',
		]);
	}

	

	public function login(Request $req)
	{
    	# code...
		if ($req->isMethod('post')) {
    		# code...
			$email = $req->email;
			$password = $req->password;
			$leveladmin = '1';
			$levelgv = '2';
			$levelsv = '3';
			$validator = $this->validator($req->all());
			if ($validator->fails()) {
				# code...
				return Redirect::to('/login')->withInput()->withErrors($validator);
			}
			if ( Auth::attempt(['email' => $email, 'password' => $password, 'level' => $leveladmin]) ) {
				$req->session()->regenerate();
				return Redirect('/admin/index');
			} 
			if ( Auth::attempt(['email' => $email, 'password' => $password, 'level' => $levelgv]) ) {
	    		# code...
				$req->session()->regenerate();
				return Redirect('/gv/lich-day-theo-tuan');
			}
			if ( Auth::attempt(['email' => $email, 'password' => $password, 'level' => $levelsv]) ) {
	    		# code...
				$req->session()->regenerate();
				return Redirect('/sv/lich-hoc-theo-tuan');
			}
			else {
				return Redirect::to('/login')->withInput()->withErrors("Email hoặc mật khẩu không đúng");
			}
			return back()->withInput();
		}
		
		$post = notifications::orderBy('id', 'desc')->get();
		return view('login.login')->with('post', $post);
	}

	public function submitLogin(Request $req)
	{
    	# code...
		echo($req->_token);
		echo($req->email);
		echo($req->password);
	}

	public function register()
	{
		# code...
		return view('login.register');
	}

	public function store(Request $req)
	{
		# code...
		$this->validate(request(), [
			'name' => 'required',
			'email' => 'required|email',
			'password' => 'required',
			'level' => 'required',
		]);

		$user = User::create(request(['name', 'email', 'password', 'level', '_token']));

		return redirect('login');
	}

	public function logout()
	{
		# code...
		if (Auth::logout()) {
			# code...
			return redirect('login');
		}
		return redirect('admin/index');
	}

}
