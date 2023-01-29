<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sinh Viên VKU</title>
	<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<link rel="icon" href="{{ asset('./public/back-end/admin/assets/img/logo.jpg')}}" type="image/x-icon"/>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- Fonts and icons -->
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
		.card {
			margin: 3 px 3px 0 0;
		}
		.card:hover {
			border: 1px solid skyblue;
			box-sizing: border-box 1px;
		}

		.addgv {
			margin-top: 50px;
		}

		/*---------------------------------------*/


		/*---------------------------------------*/
	</style>
</head>

<body style="background-color: #{{$theme[0]->bg}}">
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			@php($a=$theme[0]->nav)
			<div class="logo-header" id="bglogo" data-background-color="{{$a}}">

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
						<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li>
						
						<li class="nav-item dropdown hidden-caret">
							<div class="user" style="display: flex;">
								<div style="margin: 0.6em 1em 0 1em; font-size: 1.2em">
									<span class="name" style="color: #fff;">{{Auth::user()->name}} - {{$lop}}</span>
								</div>
								<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
									<div class="avatar-sm">
										<img src="{{ asset('./public/back-end/admin/assets/img/profile.jpg')}}" alt="..." class="avatar-img rounded-circle">
									</div>
								</a>
								<ul class="dropdown-menu dropdown-user animated fadeIn">
									<div class="dropdown-user-scroll scrollbar-outer">
										<li>
											<div class="user-box">
												<div class="avatar-lg"><img src="{{ asset('./public/back-end/admin/assets/img/profile.jpg')}}" alt="image profile" class="avatar-img rounded"></div>
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
		<div class="sidebar sidebar-style-2" data-background-color="{{$theme[0]->side}}" style="box-shadow: 5px 0px 15px rgb(40,40,40); background-color: #{{$theme[0]->side}};">			
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
							<div class="collapse" id="maps">
								<ul class="nav nav-collapse">
									<li>
										<a href="{{URL::to('sv/maps')}}">
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
							<div class="collapse show" id="lienhe">
								<ul class="nav nav-collapse">
									<li class="active">
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

		<div class="main-panel">
			<div class="content">
				<div class="row">
					<div class="col-md-12">
						<div class="card card-transparent">
							<div class="card-header">
								<h4 class="card-title text-center">
									Liên hệ giảng viên
								</h4>
							</div>
							<div class="card-body">
								<div class="col-md-10 ml-auto mr-auto">

									@if ($message = Session::get('success'))
									<div class="alert alert-success">
										<strong>{{ $message }}</strong>
									</div>
									@endif

									@if (count($errors) > 0)
									<div class="alert alert-danger">
										<ul>
											@foreach ($errors->all() as $error)
											<li>{{ $error }}</li>
											@endforeach
										</ul>
									</div>
									@endif


									<div class="card-columns col-12 col-sm-12 col-lg-12" style="width: 100%; height: 100%">
										@csrf
										@foreach($tests as $test)
										<div class="card showdetail col-sm-12 col-lg-12" style="width: 70%; margin:100px 50px 0 50px; height: 450px;" data-toggle="modal" magv="{{$test->MaGV}}" id="{{$test->Email}}" data-target="#gv{{$test->MaGV}}">
											<img class="card-img-top" src="{{ asset($test->avatar)}}" alt="Card image cap" style="height: 300px">
											<div class="card-body">
												<h5 class="card-title">{{$test->HoTenGV}}</h5>
												<p class="card-text">Email: {{$test->Email}}</p>
											</div>
										</div>
										<!--Modal-->
										<!-- //filemodal, tenmodal, mailmodal, upmodal, editgv -->
										<div class="modal fade" id="gv{{$test->MaGV}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
											<div class="modal-dialog modal-dialog-centered" role="document">
												<div class="modal-content">
													<form action="sua/{{$test->MaGV}}" method="post" id="upload" enctype="multipart/form-data">
														@csrf
														<div class="modal-header">
															<h5 class="modal-title" id="exampleModalLongTitle" class="{{$test->Email}}">Thông tin chi tiết</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<div class="card mb-3" style="max-width: 540px;">
																<div class="row no-gutters">
																	<div class="col-md-4">
																		<img src="{{asset($test->avatar)}}" id="output{{$test->MaGV}}" class="card-img" alt="...">
																		<input id="file-selector" target="output{{$test->MaGV}}" type="file" name="file" avatar="{{$test->avatar}}" class="form-control file-selector filemodal" filemodal="{{$test->MaGV}}" value="" style="visibility: hidden;">
																	</div>
																	<div class="col-md-8">
																		<div class="card-body">
																			<h5 class="card-title"><input type="text" name="name" class="form-control-plaintext tenmodal" tenmodal="{{$test->MaGV}}" id="" disabled style="padding:0;left:0;border: none; font-weight:bold; background-color:white" value="{{$test->HoTenGV}}"></h5>

																			<div class="form-group row">
																				<label for="staticEmail" class="col-sm-4 col-form-label">Email</label>
																				<div class="col-sm-8" style="padding-left: 0;">
																					<input type="email" name="mail" class="form-control-plaintext mailmodal" mailmodal="{{$test->MaGV}}" id="" disabled style="left:0;border: none; background-color:white" value="{{$test->Email}}">
																				</div>
																			</div>
																			<div class="form-group row">
																				<label for="sdt" class="col-sm-4 col-form-label">Các môn đang dạy:</label>
																				<div class="col-sm-8 monh" style="padding-left: 50px;padding-top:11px" id="ma{{$test->MaGV}}">
																					<!-- <input type="text" name="sdt" readonly class="form-control-plaintext" id="ma{{$test->MaGV}}" disabled style="left:0;border: none; background-color:white" value="NULL"> -->
																				</div>
																			</div>
																			<!-- <div class="form-group"> -->
																				<p id="status"></p>
																				<!-- </div> -->

																			</div>
																		</div>
																	</div>
																</div>

															</div>
															<!-- //filemodal, tenmodal, mailmodal, upmodal, editgv -->
															<div class="modal-footer"> 	
																<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
															</div>
														</form>
													</div>
												</div>
											</div>
											@endforeach
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>	
			<!-- End content -->

			<footer class="footer">
				<div class="container-fluid">
					<nav class="pull-left">
						<ul class="nav">
							<li class="nav-item">
								<a class="nav-link" href="https://www.themekita.com">
									Trang chủ
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">
									Giúp đỡ
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">
									Liên hệ
								</a>
							</li>
						</ul>
					</nav>
					<div class="copyright ml-auto">
						2020, made with <i class="fa fa-heart heart text-danger"></i> by <a href="https://www.facebook.com/Pnhat1112/">NTT</a>
					</div>        
				</div>
			</footer>
		</div>

		<!-- Custom template | don't include it in your project! -->

		<!-- End Custom template -->
	</div>

	<script>


        //filemodal, tenmodal, mailmodal, upmodal, editgv
        $(document).ready(function() {
        	$('.editgv').on('click', function() {
        		var target = $(this).attr('filemodal');
                // alert(target);
                $("[filemodal|='" + target + "']").css("visibility", "visible");
                $("[tenmodal|='" + target + "']").css({
                	"border": "default",
                	'background-color': 'rgb(230,230,230)'
                }).prop("disabled", false);
                $("[mailmodal|='" + target + "']").css({
                	"border": "default",
                	'background-color': 'rgb(230,230,230)'
                }).prop("disabled", false);
                $("[upmodal|='" + target + "']").css("display", "inline");
                $(this).css("display", "none");
                // alert('jjji');
            });
        	$('.showdetail').on('click', function() {
                // alert($(this).attr('id'));
                var query = $(this).attr('id');
                var ma = $(this).attr('magv').toString();
                // alert(ma);
                // alert(query);
                if (query != '') {
                	var _token = $('input[value="_token"]').val();
                	$.ajax({
                		url: "{{ route('upload') }}",
                		method: "GET",
                		data: {
                			query: query,
                			_token: _token
                		},
                		success: function(data) {
                            // alert(data)
                            // alert('hello');
                            $("#ma" + ma).html(data)
                        }
                    });
                }
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="{{ asset('./public/front-end/js/theme.js')}}"></script>
</body>

</html>
