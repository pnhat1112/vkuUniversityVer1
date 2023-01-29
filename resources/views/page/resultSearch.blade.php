<!DOCTYPE html>
<html>
<head>
	<title>Kết quả tìm kiếm</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="icon" href="{{ asset('./public/back-end/admin/assets/img/logo.jpg')}}" type="image/x-icon"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('public/front-end/css/content.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('public/front-end/css/header.css')}}">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=bebasneue">
	<style type="text/css">
		body {
			width: 100%;
		}
	</style>
</head>
<body>
	@yield('header')
	<hr width="100%" style="padding: 0px 0px 0px 0px; background-color: #ff9933; height: 3px;">
	@yield('navigation')
	<div class="container" style="padding-top: 3rem;">
		<div class="row">
			<div class="col-4 col-sm-12 col-md-12 col-lg-3">
				@yield('news')
			</div>
			<div class="col-8 col-sm-12 col-md-12 col-lg-9">
				@yield('content')
			</div>
		</div>
	</div>
</body>

<!-- <script type="text/javascript" src="{{asset('./public/front-end/js/snow.js')}}"></script> -->
<script type="text/javascript" src="{{asset('./public/front-end/js/voice.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>