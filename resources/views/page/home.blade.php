@extends('index')

@section('header')
<div class="header">
	<div class="header-content">
		<div class="container1">
			<div class="row align-items-center">
				<div class="col-8 col-lg-8 col-md-8">
					<div class="logo-content">
						<a href="{{ URL::to('index')}}"><img src="{{asset('public/front-end/image/logo.jpg')}}"></a>
					</div>
				</div>
				<div class="col-4 col-lg-4 col-md-4 mr-auto" style="float: right;">
					<div class="search-content">
						<form class="form-inline d-flex justify-content-center md-form form-sm" style="width: 100%" action="search" method="POST" id="searchForm">
							{{csrf_field()}}
							<input class="form-control form-control-sm mr-3 w-75" type="text" placeholder="Tìm kiếm..."
							aria-label="Search" name="txtSearch" id="speechToText">
							<button class="btnInput" id="btnVoice" onclick="record()" name="btnVoice" type="button"><i class="fa fa-microphone" aria-hidden="true"></i></button>
							<button class="btnInput" id="btnSearch" name="btnSearch" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
						</form>
						
						<div id="voicebox" class="voicebox">
							<div class="modal-content">
								<span class="close"><i class="fa fa-window-close"></i></span>
								<div style="text-align: center;">
									<h3>Say something...</h3>
									<img src="{{asset('./public/front-end/image/voice.gif')}}">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> <!-- end header -->
		@endsection

		@section('nav')
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-dark">
				<a class="logoVKU navbar-toggler" href="#"><img src="{{ asset('./public/front-end/image/VietHan.jpg')}}" alt="navbar brand"></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav">
					<i class="fa fa-navicon" style="color:#000; font-size:28px;"></i>
				</button>
				<div class="collapse navbar-collapse" id="main_nav">
					<ul class="navbar-nav">
						<li class="nav-item dropdown">
							<a class="nav-link  dropdown-toggle" href="#" data-toggle="dropdown">Giới Thiệu</a>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" href="{{URL::to('index')}}"> Cổng Thông tin đào tạo</a></li>
								<li><a class="dropdown-item" href="#"> Các ngành đào tạo</a></li>
								<li><a class="dropdown-item" href="#"> Chức năng nhiệm vụ</a></li>
								<li><a class="dropdown-item" href="#"> Quy Chế - Quy Định</a></li>
							</ul>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link  dropdown-toggle" href="#" data-toggle="dropdown">Thông báo</a>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" href="{{URL::to('notifications')}}"> Thông báo chung </a></li>
								<li><a class="dropdown-item" href="#"> Thông báo từ công tác sinh viên, đoàn, GVCN</a></li>
							</ul>
						</li>
						<li class="nav-item"><a class="nav-link" href="#">Thời khóa biểu</a></li>
						<li class="nav-item dropdown">
							<a class="nav-link  dropdown-toggle" href="#" data-toggle="dropdown">Quy Trình</a>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" href="#"> Biểu mẫu sinh viên</a></li>
								<li><a class="dropdown-item" href="#"> Quy trình giảng viên </a></li>
								<li><a class="dropdown-item" href="#"> Quy trình sinh viên </a></li>
							</ul>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link  dropdown-toggle" href="#" data-toggle="dropdown">Chương trình đào tạo</a>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" href="#"> Chương trình</a></li>
								<li><a class="dropdown-item" href="#"> Danh mục môn học </a></li>
								<li><a class="dropdown-item" href="#"> Tóm tắt môn học </a></li>
							</ul>
						</li>
						<li class="nav-item"><a class="nav-link" href="#">Kế hoạch năm</a></li>
						<li class="nav-item dropdown">
							<a class="nav-link  dropdown-toggle" href="#" data-toggle="dropdown">Lịch</a>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" href="#">Lịch Thời Khóa Biểu</a></li>
								<li><a class="dropdown-item" href="#"> Lịch Phòng Học </a></li>
							</ul>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link  dropdown-toggle" href="#" data-toggle="dropdown">Đăng Nhập</a>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" href="{{URL::to('login')}}"> Sinh Viên</a></li>
								<li><a class="dropdown-item" href="{{URL::to('login')}}"> Giảng Viên </a></li>
								<li><a class="dropdown-item" href="{{URL::to('login')}}"> Bộ phận khác </a></li>
							</ul>
						</li>
					</ul>
				</div> <!-- navbar-collapse.// -->
			</nav>
		</div>
		@endsection

		@section('carousel')
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
			</ol>
			<div class="carousel-inner">
				<div class="carousel-item ">
					<img class="d-block w-100" src="{{asset('public/front-end/image/carousel1.jpg')}}" alt="First slide">
				</div>
				<div class="carousel-item">
					<img class="d-block w-100" src="{{asset('public/front-end/image/carousel2.jpg')}}" alt="Second slide">
				</div>
				<div class="carousel-item">
					<img class="d-block w-100" src="{{asset('public/front-end/image/carousel3.jpg')}}" alt="Third slide">
				</div>
				<div class="carousel-item active">
					<img class="d-block w-100" src="{{asset('public/front-end/image/carousel4.jpg')}}" alt="Second slide">
				</div>
				<div class="carousel-item">
					<img class="d-block w-100" src="{{asset('public/front-end/image/carousel5.jpg')}}" alt="Third slide">
				</div>

			</div>
			<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div> <!-- end carousel -->
		@endsection


		@section('content-left')
		<div class="header-content1 ">
			<h3><a href="{{URL::to('notifications')}}" class="header-link">Thông báo</a></h3>
		</div>
		<div class="content-left row col-12">
			<ul>
				@foreach ($post as $value)
				<li><a href="notifications/{{$value->slug}}">{{$value->title}} </a><span> - {{ date('d/m/y', strtotime($value->created_at)) }} </span></li>
				@endforeach
			</ul>  
		</div>
		<a href="{{URL::to('notifications')}}" class="see-more" style="float: right;">Xem thêm >></a>

		@endsection

		@section('content-right')
		<div class="header-content2 ">
			<h3>Sự kiện</h3>
		</div>
		<div class="content-right1">
			<div class="event">
				<ul>
					@foreach($events as $value)
					<li class="col-12 col-md-12 row">
						<div class="date col-3">
							<div class="month">
								{{ date('d/m', strtotime($value->time)) }}
							</div>
							<div class="year">
								{{ date('y', strtotime($value->time)) }}
							</div>
						</div>
						<div class="event-content col-9">
							{{ $value->nameEvent}}
						</div>
					</li>
					@endforeach
				</ul>
			</div>
		</div>

		@endsection

		@section('content-khtc')
		<div class="header-content2 ">
			<h3>Thông báo kế hoạch tài chính</h3>
		</div>
		<div class="content-right1 row col-12">
			<ul>
				@foreach ($notifications_khtc as $value)
				<li><a href="notifications-khtc/{{$value->slug}}">{{$value->title}} </a><span> - {{ date('d/m/y', strtotime($value->created_at)) }} </span></li>
				@endforeach
			</ul>  
		</div>
		@endsection

		@section('content-ttdn')
		<div class="header-content1 ">
			<h3>Thông báo thực tập doanh nghiệp</h3>
		</div>
		<div class="content-left row col-12">
			<ul>
				@foreach ($notifications_ttdn as $value)
				<li><a href="notifications-ttdn/{{$value->slug}}">{{$value->title}} </a><span> - {{ date('d/m/y', strtotime($value->created_at)) }} </span></li>
				@endforeach
			</ul>  
		</div>
		@endsection