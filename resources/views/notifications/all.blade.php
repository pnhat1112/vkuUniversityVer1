@extends('notifications.all-notifications')
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
		</div>
	</div>
</div> <!-- end header -->
@endsection

@section('navigation')
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
						<li><a class="dropdown-item" href="{{URL::to('admin/index')}}"> Bộ phận khác </a></li>
					</ul>
				</li>
			</ul>
		</div> <!-- navbar-collapse.// -->
	</nav>
</div>
@endsection
@section('title')
<h1>abccc</h1>
@endsection

@section('news') 
<div class="news">
	<a href="{{URL::to('notifications')}}"><img src="{{ asset('./public/front-end/image/VietHan.jpg')}}" style="width: 100%"></a>
	<div class="content-left width">
		<div class="content-left1">
			<ul>
				@foreach ($news as $value)
				<li><a href="notifications/{{$value->slug}}">{{$value->title}} </a><span> - {{ date('d/m/y H:i', strtotime($value->created_at)) }} </span></li>
				@endforeach
			</ul>
		</div>
	</div>
</div>
@endsection
@section('content')
<div class="heading-contifications">
	<h3 style="padding-left: 20px;">Thông báo chung</h3>
</div>

<div class="content-notifications">
	<div class="news">
		<div class="content-left" style="height: auto;">
			<div class="content-left1" >
				<ul>
					@foreach ($notifications as $value)
					<li><a href="notifications/{{$value->slug}}">{{$value->title}} </a><span> - {{ date('d/m/y H:i', strtotime($value->created_at)) }} </span></li>

					@endforeach
				</ul>
			</div>
			
			<nav aria-label="Page navigation example" id="horizontal" style="">
			  <ul class="pagination">
				  {{$notifications->links()}}
			  </ul>
			</nav>
			<!-- <div class="pagination text-center">
				@if(isset($count))<a href="?page=1" style="margin-top: 50px;"><<</a>
				@for ($i = 1; $i <= $count; $i++)<a href="?page={{$i}}">{{$i}}</a>
				@endfor<a href="?page={{$count}}">>></a>
				@endif
			</div> -->
		</div>
	</div>
</div>
@endsection