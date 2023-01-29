<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="{{ asset('./public/back-end/admin/assets/img/logo.jpg')}}" type="image/x-icon"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('public/back-end/form-login/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('./public/back-end/form-login/css/main.css')}}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('public/front-end/css/content.css')}}">
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="" method="POST">
					{{csrf_field()}}
					<span class="login100-form-title p-b-43">
						<a href="{{URL::to('index')}}"><img src="{{asset('./public/back-end/form-login/image/logovku.jpg')}}" style="width: 70%;">
						<img src="{{asset('./public/back-end/form-login/image/vku.jpg')}}" style="width: 70%;"></a>

						@if (isset($errors))
						<p style="color: red">
							@foreach($errors->all() as $error)
						{!! $error !!}</br>
						@endforeach
					</p>
					@endif
					@if (isset($message))
					<p style="color: red">
					{!! $message !!}</br>
				</p>
				@endif
			</span>
			<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
				<input class="input100" type="text" name="email">
				<span class="focus-input100"></span>
				<span class="label-input100">Email</span>
			</div>
			<div class="wrap-input100 validate-input" data-validate="Password is required">
				<input class="input100" type="password" name="password">
				<span class="focus-input100"></span>
				<span class="label-input100">Password</span>
			</div>
			<div class="flex-sb-m w-full p-t-3 p-b-32">
				<div class="contact100-form-checkbox">
					<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
					<label class="label-checkbox100" for="ckb1">
						Remember me
					</label>
				</div>
				<div>
					<a href="#" class="txt1">
						Forgot Password?
					</a>
				</div>
			</div>
			<div class="container-login100-form-btn">
				<button class="login100-form-btn" type="submit">
					Login
				</button>
			</div>
			<div class="text-center p-t-46 p-b-20">
				<span class="txt2">
					or sign up using
				</span>
			</div>
			<div class="login100-form-social flex-c-m">
				<a href="#" class="login100-form-social-item flex-c-m bg1 m-r-5">
					<i class="fa fa-facebook-f" aria-hidden="true"></i>
				</a>

				<a href="{{ url('/redirect/google') }}" class="login100-form-social-item flex-c-m bg3 m-r-5">
					<i class="fa fa-google" aria-hidden="true"></i>
				</a>
			</div>
		</form>
		<div class="login100-more">
			<div class="header-content2"  style="background: url();">
				<h3>Thông báo chung</h3>
			</div>
			<div class="content-notifications" style="padding-left: 20px">
				<ul>
					@foreach ($post as $value)
					<li><a href="notifications/{{$value->slug}}"><i class="fa fa-angle-right"></i>{{$value->title}} <span> - {{ date('d/m/y', strtotime($value->created_at)) }} </span></a></li>
					@endforeach
				</ul> 
			</div> 
		</div>
	</div>
</div>
</div>
<script src="{{ asset('./public/back-end/form-login/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{ asset('./public/back-end/form-login/js/main.js')}}"></script>
<script type="text/javascript" src="{{asset('./public/front-end/js/snow.js')}}"></script>
</body>
</html>