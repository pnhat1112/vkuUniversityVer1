<!DOCTYPE html>
<html>
<head>
	<title>Thông báo</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>


</html>