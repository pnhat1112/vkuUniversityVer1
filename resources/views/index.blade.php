<!DOCTYPE html>
<html>
<head>
	<title>VKU UNIVERSITY</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="icon" href="{{ asset('./public/back-end/admin/assets/img/logo.jpg')}}" type="image/x-icon"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('public/front-end/css/content.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('public/front-end/css/header.css')}}">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto Condensed">

	<style type="text/css">
		#scrollUp {
			display: none;
			position: fixed;
			bottom: 20px;
			right: 20px;
			z-index: 99;
			font-size: 18px;
			border: none;
			outline: none;
			background-color: red;
			color: white;
			cursor: pointer;
			padding: 15px;
			border-radius: 4px;
		}

		#scrollUp:hover {
			background-color: #1578b3;
		}
	</style>
</head>
<body>
	
	@yield('header')

	<hr width="100%" style="padding: 0px 0px 0px 0px; background-color: #ff9933; height: 3px;">
	@yield('nav')

	@yield('carousel')

	<div class="container content-main">
		<div class="row">	

			<div class="content-left col-7 col-sm-12 col-md-12 col-lg-7">
				@yield('content-left')
			</div>
			<div class="content-right col-5 col-sm-12 col-md-12 col-lg-5">
				@yield('content-right')
			</div>
		</div>
		<div class="row">
			<div class="content-left col-7 col-sm-12 col-md-12 col-lg-7">
				@yield('content-khtc')
			</div>
			<div class="content-left col-5 col-sm-12 col-md-12 col-lg-5">
				@yield('content-ttdn')
			</div>
		</div>
	</div>

	<a onclick="topFunction()" id="scrollUp" class="scrollUp" title="Go to top"><i class="fa fa-chevron-up"></i></a>
	<footer style="background-color: #1578b3; width:100%; margin-top: 30px; height: auto; color: #fff">
		<div class="container1">
			<div class="row" style="padding: 3rem 0rem 1rem 0rem;">
				<div class="col-11">
					<div class="row ">
						<div class="col-12">
							<img src="{{ asset('./public/back-end/admin/assets/img/logo.jpg')}}" style="width: 200px; float: left;height: auto;">
							<h6 style="font-weight: 600;">Copyright © 2017-2020 - Trường Đại học Công nghệ Thông tin & Truyền Thông Việt - Hàn, Đại học Đà Nẵng</h6>
							<span><i class="fa fa-home"></i>  Địa chỉ: Khu Đô thị Đại học Đà Nẵng, Đường Nam Kỳ Khởi Nghĩa, quận Ngũ Hành Sơn, TP. Đà Nẵng</span></br>
							<span><i class="fa fa-phone"></i>  Điện thoại: 0236.6.552.688</span>
							<span style="padding-left: 20px;"><i class="fa fa-envelope"></i> daotao@vku.udn.vn</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer><!-- Load Facebook SDK for JavaScript -->
      <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v9.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your Chat Plugin code -->
      <div class="fb-customerchat"
        attribution=setup_tool
        page_id="104755881520181"
  theme_color="#ffb914"
  logged_in_greeting="Chào em! Em cần tư vấn gì?"
  logged_out_greeting="Chào em! Em cần tư vấn gì?">
      </div>

</body>
<script>
	var mybutton = document.getElementById("scrollUp");

	window.onscroll = function() {scrollFunction()};

	function scrollFunction() {
		if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
			mybutton.style.display = "block";
		} else {
			mybutton.style.display = "none";
		}
	}

	function topFunction() {
		document.body.scrollTop = 0;
		document.documentElement.scrollTop = 0;
	}
</script>



<script type="text/javascript" src="{{asset('./public/front-end/js/voice.js')}}"></script>
<!-- <script type="text/javascript" src="{{asset('./public/front-end/js/snow.js')}}"></script> -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>