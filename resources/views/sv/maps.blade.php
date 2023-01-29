<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Sinh Viên VKU</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="{{ asset('./public/back-end/admin/assets/img/logo.jpg')}}" type="image/x-icon"/>
	<!-- Fonts and icons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="{{ asset('./public/back-end/admin/assets/js/plugin/webfont/webfont.min.js')}}"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['./public/back-end/admin/assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>



	<!-- CSS Files -->
	<link rel="stylesheet" href="{{ asset('./public/back-end/admin/assets/css/bootstrap.min.cs')}}s">
	<link rel="stylesheet" href="{{ asset('./public/back-end/admin/assets/css/atlantis.min.css')}}">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="{{ asset('./public/back-end/admin/assets/css/demo.css')}}">

	<style>
		<?php $wid = '100%' ?>.col-sm {
			margin: 20px;
			width: fit-content;
		}

		table {
			border-radius: 10px;
			border: none;
			margin-top: 30px;
		}

		td {
			height: auto;
			width: 200px;
			/* display:contents; */
			font-size: large;
			overflow: auto;
		}

		.overflowTest::-webkit-scrollbar {
			display: none;
		}

		.overflowTest {
			background: inherit;
			color: white;
			padding: 12px;
			height: auto;
			overflow: scroll;
			margin: 0px;
			text-align: center;
		}

		table,
		td,
		th {
			border: 1px solid black;
			padding: 0px;

		}

		.tiet {
			width: 50px;
			text-align: center;
		}

		.margin {
			margin: 10px auto 20px 45%;
		}

		th {
			text-align: center;
		}

		table tbody td .overflowTest:hover {
			background-color: #999800;
		}

		td.tdtkb {
			padding: 0;
			font-size: 15px;
		}
	</style>
</head>
<body>
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="{{$theme[0]->nav}}">
				
				<a href="{{URL::to('index')}}" class="logo">
					<img src="{{ asset('./public/back-end/admin/assets/img/logo.jpg')}}" alt="navbar brand">
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="fa fa-reorder"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="{{$theme[0]->nav}}">
				
				<div class="container-fluid">
					<div class="collapse" id="search-nav">
						<form class="navbar-left navbar-form nav-search mr-md-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<button type="submit" class="btn btn-search pr-1">
										<i class="fa fa-search search-icon"></i>
									</button>
								</div>
								<input type="text" placeholder="Search ..." class="form-control">
							</div>
						</form>
					</div>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item dropdown hidden-caret">
							<div class="user" style="display: inline-flex;">

								<div style="margin: 0.6em 1em 0 1em; font-size: 1.2em">
									<span class="name" style="color: #fff;">{{Auth::user()->name}} - {{$lop}}</span>
								</div>
								<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
									<div class="avatar-sm">
										<img src="{{ asset('./public/front-end/image/imgprofile.jpg')}}" alt="..." class="avatar-img rounded-circle">
									</div>
								</a>
								<ul class="dropdown-menu dropdown-user animated fadeIn">
									<div class="dropdown-user-scroll scrollbar-outer">
										<li>
											<div class="user-box">
												<div class="avatar-lg"><img src="{{ asset('./public/front-end/image/imgprofile.jpg')}}" alt="image profile" class="avatar-img rounded"></div>
												<div class="u-text">
													<h4>{{Auth::user()->name}}</h4>
													<p class="text-muted">{{Auth::user()->email}}</p><a href="profile.html" class="btn btn-xs btn-secondary btn-sm">View Profile</a>
												</div>
											</div>
										</li>
										<li>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="#">My Profile</a>
											<a class="dropdown-item" href="#">My Balance</a>
											<a class="dropdown-item" href="#">Inbox</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="#">Account Setting</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="{{URL::to('admin/logout')}}">Logout</a>
										</li>
									</div>
								</ul>

							</div>
						</li>

						<label id="switch" class="switch">
							<input type="checkbox" onchange="toggleTheme('{{ route('theme') }}')" id="slider">
							<span class="slider round"></span>
						</label>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>
		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2" data-background-color="{{$theme[0]->side}}" style="box-shadow: 5px 0px 15px rgb(40,40,40);">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2" style="margin-top: 10px">
							<img src="{{ asset('./public/front-end/image/imgprofile.jpg')}}" alt="..." class="avatar-img rounded-circle" style="width: 100%; height: 100%;">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									<span>Xin chào,</span>
									<span style="font-size: 1.1em; font-weight: 600">{{Auth::user()->name}}</span>
									<span class="user-level">Sinh Viên</span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li>
										<a href="#profile">
											<span class="link-collapse">My Profile</span>
										</a>
									</li>
									<li>
										<a href="#edit">
											<span class="link-collapse">Edit Profile</span>
										</a>
									</li>
									<li>
										<a href="#settings">
											<span class="link-collapse">Settings</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<ul class="nav nav-primary">
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Components</h4>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#tables">
								<i class="fa fa-table"></i>
								<p>Lịch học</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="tables">
								<ul class="nav nav-collapse">
									<li>
										<a href="{{URL::to('sv/lich-hoc-theo-tuan')}}">
											<span class="sub-item">Lịch học theo tuần</span>
										</a>
									</li>
									<li>
										<a href="{{URL::to('sv/lich-hoc-chi-tiet')}}">
											<span class="sub-item">Lịch học chi tiết</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#maps">
								<i class="fa fa-map-marker"></i>
								<p>Bản Đồ</p>
								<span class="caret"></span>
							</a>
							<div class="collapse show" id="maps">
								<ul class="nav nav-collapse">
									<li class="active">
										<a href="{{URL::to('admin/maps')}}">
											<span class="sub-item">VKUMap</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#lienhe">
								<i class="fa fa-id-card"></i>
								<p>Liên hệ</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="lienhe">
								<ul class="nav nav-collapse">
									<li>
										<a href="{{URL::to('sv/lien-he-giang-vien')}}">
											<span class="sub-item">Thông tin giảng viên</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->

		<div class="main-panel" style="padding: 0px 30px 0px 30px;">
			<div class="content">
				<div class="row">
					<div class="col-md-12 col-12">
						<div class="card card-transparent">
							<div class="card-header">
								<h4 class="card-title text-center">
									VKU Maps
								</h4>
								<p class="card-category text-center">
									470 Đường Trần Đại Nghĩa, Phường Hoà Hải, Quận Ngũ Hành Sơn, Thành Phố Đà Nẵng, Việt Nam.
								</p>
							</div>
							<div class="card-body">
								<div class="col-md-10 ml-auto mr-auto">
									<div class="mapcontainer">
										<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7846403.478541151!2d104.03722397411414!3d16.2074949128827!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31421972d8f017d3%3A0xc76fba8f369ddbb2!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBDw7RuZyBuZ2jhu4cgVGjDtG5nIHRpbiB2w6AgVHJ1eeG7gW4gdGjDtG5nIFZp4buHdCAtIEjDoG4sIMSQ4bqhaSBo4buNYyDEkMOgIE7hurVuZw!5e0!3m2!1svi!2s!4v1607616418950!5m2!1svi!2s" width="100%" height="600" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>		

	</div>
	<!-- Custom template | don't include it in your project! -->
	<div class="custom-template">
		<div class="title">Settings</div>
		<div class="custom-content">
			<div class="switcher">
				<div class="switch-block">
					<h4>Logo Header</h4>
					<div class="btnSwitch">
						<button type="button" class="changeLogoHeaderColor" data-color="dark"></button>
						<button type="button" class="selected changeLogoHeaderColor" data-color="blue"></button>
						<button type="button" class="changeLogoHeaderColor" data-color="purple"></button>
						<button type="button" class="changeLogoHeaderColor" data-color="light-blue"></button>
						<button type="button" class="changeLogoHeaderColor" data-color="green"></button>
						<button type="button" class="changeLogoHeaderColor" data-color="orange"></button>
						<button type="button" class="changeLogoHeaderColor" data-color="red"></button>
						<button type="button" class="changeLogoHeaderColor" data-color="white"></button>
						<br/>
						<button type="button" class="changeLogoHeaderColor" data-color="dark2"></button>
						<button type="button" class="changeLogoHeaderColor" data-color="blue2"></button>
						<button type="button" class="changeLogoHeaderColor" data-color="purple2"></button>
						<button type="button" class="changeLogoHeaderColor" data-color="light-blue2"></button>
						<button type="button" class="changeLogoHeaderColor" data-color="green2"></button>
						<button type="button" class="changeLogoHeaderColor" data-color="orange2"></button>
						<button type="button" class="changeLogoHeaderColor" data-color="red2"></button>
					</div>
				</div>
				<div class="switch-block">
					<h4>Navbar Header</h4>
					<div class="btnSwitch">
						<button type="button" class="changeTopBarColor" data-color="dark"></button>
						<button type="button" class="changeTopBarColor" data-color="blue"></button>
						<button type="button" class="changeTopBarColor" data-color="purple"></button>
						<button type="button" class="changeTopBarColor" data-color="light-blue"></button>
						<button type="button" class="changeTopBarColor" data-color="green"></button>
						<button type="button" class="changeTopBarColor" data-color="orange"></button>
						<button type="button" class="changeTopBarColor" data-color="red"></button>
						<button type="button" class="changeTopBarColor" data-color="white"></button>
						<br/>
						<button type="button" class="changeTopBarColor" data-color="dark2"></button>
						<button type="button" class="selected changeTopBarColor" data-color="blue2"></button>
						<button type="button" class="changeTopBarColor" data-color="purple2"></button>
						<button type="button" class="changeTopBarColor" data-color="light-blue2"></button>
						<button type="button" class="changeTopBarColor" data-color="green2"></button>
						<button type="button" class="changeTopBarColor" data-color="orange2"></button>
						<button type="button" class="changeTopBarColor" data-color="red2"></button>
					</div>
				</div>
				<div class="switch-block">
					<h4>Sidebar</h4>
					<div class="btnSwitch">
						<button type="button" class="selected changeSideBarColor" data-color="white"></button>
						<button type="button" class="changeSideBarColor" data-color="dark"></button>
						<button type="button" class="changeSideBarColor" data-color="dark2"></button>
					</div>
				</div>
				<div class="switch-block">
					<h4>Background</h4>
					<div class="btnSwitch">
						<button type="button" class="changeBackgroundColor" data-color="bg2"></button>
						<button type="button" class="changeBackgroundColor" data-color="bg1"></button>
						<button type="button" class="changeBackgroundColor selected" data-color="bg3"></button>
						<button type="button" class="changeBackgroundColor" data-color="dark"></button>
					</div>
				</div>
				<div class="switch-block">
					<h4>Theme</h4>
					<div class="btnSwitch">
						<button type="button" class="changeSideBarColor changeTopBarColor changeLogoHeaderColor" data-color="bg1"></button>
						<button type="button" class="changeSideBarColor changeTopBarColor changeLogoHeaderColor" data-color="dark"></button>
						<button type="button" class="changeSideBarColor changeTopBarColor changeLogoHeaderColor" data-color="purple2"></button>
						<button type="button" class="changeSideBarColor changeTopBarColor changeLogoHeaderColor" data-color="blue2"></button>
					</div>
				</div>
			</div>
		</div>
		<div class="custom-toggle">
			<i class="fa fa-cog"></i>
		</div>
	</div>
	<!-- End Custom template -->
</div>

<!--   Core JS Files   -->
<script src="{{ asset('./public/back-end/admin/assets/js/core/jquery.3.2.1.min.js')}}"></script>
<script src="{{ asset('./public/back-end/admin/assets/js/core/popper.min.js')}}"></script>
<script src="{{ asset('./public/back-end/admin/assets/js/core/bootstrap.min.js')}}"></script>

<!-- jQuery UI -->
<script src="{{ asset('./public/back-end/admin/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
<script src="{{ asset('./public/back-end/admin/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')}}"></script>

<!-- jQuery Scrollbar -->
<script src="{{ asset('./public/back-end/admin/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>

<!-- Atlantis JS -->
<script src="{{ asset('./public/back-end/admin/assets/js/atlantis.min.js')}}"></script>

<!-- Atlantis DEMO methods, don't include it in your project! -->
<script src="{{ asset('./public/back-end/admin/assets/js/setting-demo.js')}}"></script>
<script src="{{ asset('./public/back-end/admin/assets/js/demo.js')}}"></script>

<script src="{{ asset('./public/front-end/js/theme.js')}}"></script>
</body>
</html>