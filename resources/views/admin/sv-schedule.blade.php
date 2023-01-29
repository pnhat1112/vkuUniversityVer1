<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
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
      <div class="logo-header" data-background-color="blue">

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
      <nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">

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
              <a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-envelope"></i>
              </a>
              <ul class="dropdown-menu messages-notif-box animated fadeIn" aria-labelledby="messageDropdown">
                <li>
                  <div class="dropdown-title d-flex justify-content-between align-items-center">
                    Messages                  
                    <a href="#" class="small">Mark all as read</a>
                  </div>
                </li>
                <li>
                  <div class="message-notif-scroll scrollbar-outer">
                    <div class="notif-center">
                      <a href="#">
                        <div class="notif-img"> 
                          <img src="{{asset('public/back-end/admin/assets/img/jm_denis.jpg')}}" alt="Img Profile">
                        </div>
                        <div class="notif-content">
                          <span class="subject">Jimmy Denis</span>
                          <span class="block">
                            How are you ?
                          </span>
                          <span class="time">5 minutes ago</span> 
                        </div>
                      </a>
                      <a href="#">
                        <div class="notif-img"> 
                          <img src="{{asset('public/back-end/admin/assets/img/chadengle.jpg')}}" alt="Img Profile">
                        </div>
                        <div class="notif-content">
                          <span class="subject">Chad</span>
                          <span class="block">
                            Ok, Thanks !
                          </span>
                          <span class="time">12 minutes ago</span> 
                        </div>
                      </a>
                      <a href="#">
                        <div class="notif-img"> 
                          <img src="{{('public/back-end/admin/assets/img/mlane.jpg')}}" alt="Img Profile">
                        </div>
                        <div class="notif-content">
                          <span class="subject">Jhon Doe</span>
                          <span class="block">
                            Ready for the meeting today...
                          </span>
                          <span class="time">12 minutes ago</span> 
                        </div>
                      </a>
                      <a href="#">
                        <div class="notif-img"> 
                          <img src="{{asset('public/back-end/admin/assets/img/talha.jpg')}}" alt="Img Profile">
                        </div>
                        <div class="notif-content">
                          <span class="subject">Talha</span>
                          <span class="block">
                            Hi, Apa Kabar ?
                          </span>
                          <span class="time">17 minutes ago</span> 
                        </div>
                      </a>
                    </div>
                  </div>
                </li>
                <li>
                  <a class="see-all" href="javascript:void(0);">See all messages<i class="fa fa-angle-right"></i> </a>
                </li>
              </ul>
            </li>
            <li class="nav-item dropdown hidden-caret">
              <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-bell"></i>
                <span class="notification">4</span>
              </a>
              <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
                <li>
                  <div class="dropdown-title">You have 4 new notification</div>
                </li>
                <li>
                  <div class="notif-scroll scrollbar-outer">
                    <div class="notif-center">
                      <a href="#">
                        <div class="notif-icon notif-primary"> <i class="fa fa-user-plus"></i> </div>
                        <div class="notif-content">
                          <span class="block">
                            New user registered
                          </span>
                          <span class="time">5 minutes ago</span> 
                        </div>
                      </a>
                      <a href="#">
                        <div class="notif-icon notif-success"> <i class="fa fa-comment"></i> </div>
                        <div class="notif-content">
                          <span class="block">
                            Rahmad commented on Admin
                          </span>
                          <span class="time">12 minutes ago</span> 
                        </div>
                      </a>
                      <a href="#">
                        <div class="notif-img"> 
                          <img src="{{('public/back-end/admin/assets/img/profile2.jpg')}}" alt="Img Profile">
                        </div>
                        <div class="notif-content">
                          <span class="block">
                            Reza send messages to you
                          </span>
                          <span class="time">12 minutes ago</span> 
                        </div>
                      </a>
                      <a href="#">
                        <div class="notif-icon notif-danger"> <i class="fa fa-heart"></i> </div>
                        <div class="notif-content">
                          <span class="block">
                            farah liked Admin
                          </span>
                          <span class="time">17 minutes ago</span> 
                        </div>
                      </a>
                    </div>
                  </div>
                </li>
                <li>
                  <a class="see-all" href="javascript:void(0);">See all notifications<i class="fa fa-angle-right"></i> </a>
                </li>
              </ul>
            </li>
            <li class="nav-item dropdown hidden-caret">
              <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                <i class="fa fa-ellipsis-v"></i>
              </a>
              <div class="dropdown-menu quick-actions quick-actions-info animated fadeIn">
                <div class="quick-actions-header">
                  <span class="title mb-1">Quick Actions</span>
                  <span class="subtitle op-8">Shortcuts</span>
                </div>
                <div class="quick-actions-scroll scrollbar-outer">
                  <div class="quick-actions-items">
                    <div class="row m-0">
                      <a class="col-6 col-md-4 p-0" href="#">
                        <div class="quick-actions-item">
                          <i class="flaticon-file-1"></i>
                          <span class="text">Generated Report</span>
                        </div>
                      </a>
                      <a class="col-6 col-md-4 p-0" href="#">
                        <div class="quick-actions-item">
                          <i class="flaticon-database"></i>
                          <span class="text">Create New Database</span>
                        </div>
                      </a>
                      <a class="col-6 col-md-4 p-0" href="#">
                        <div class="quick-actions-item">
                          <i class="flaticon-pen"></i>
                          <span class="text">Create New Post</span>
                        </div>
                      </a>
                      <a class="col-6 col-md-4 p-0" href="#">
                        <div class="quick-actions-item">
                          <i class="flaticon-interface-1"></i>
                          <span class="text">Create New Task</span>
                        </div>
                      </a>
                      <a class="col-6 col-md-4 p-0" href="#">
                        <div class="quick-actions-item">
                          <i class="flaticon-list"></i>
                          <span class="text">Completed Tasks</span>
                        </div>
                      </a>
                      <a class="col-6 col-md-4 p-0" href="#">
                        <div class="quick-actions-item">
                          <i class="flaticon-file"></i>
                          <span class="text">Create New Invoice</span>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li class="nav-item dropdown hidden-caret">
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
            </li>
          </ul>
        </div>
      </nav>
      <!-- End Navbar -->
    </div>

    <!-- Sidebar -->
    <div class="sidebar sidebar-style-2" style="box-shadow: 5px 0px 15px rgb(40,40,40);">     
      <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
          <div class="user">
            <div class="avatar-sm float-left mr-2">
              <img src="{{ asset('./public/back-end/admin/assets/img/profile.jpg')}}" alt="..." class="avatar-img rounded-circle">
            </div>
            <div class="info">
              <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                <span>
                  {{Auth::user()->name}}
                  <span class="user-level">Administrator</span>
                  <span class="caret"></span>
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
            <li class="nav-item active">
              <a href="{{ asset('admin/index')}}">
                <i class="fa fa-home"></i>
                <p>Home</p>
              </a>
            </li>
            <li class="nav-section">
              <span class="sidebar-mini-icon">
                <i class="fa fa-ellipsis-h"></i>
              </span>
              <h4 class="text-section">Components</h4>
            </li>
            
            <li class="nav-item">
              <a data-toggle="collapse" href="#quanli">
                <i class="fa fa-mortar-board"></i>
                <p>Quản Lí</p>
                <span class="caret"></span>
              </a>
              <div class="collapse show" id="quanli">
                <ul class="nav nav-collapse">
                  <li>
                    <a href="{{URL::to('admin/add-subject')}}">
                      <span class="sub-item">Quản lí lịch học</span>
                    </a>
                  </li>
                  <li>
                    <a href="{{URL::to('admin/gv-schedule')}}">
                      <span class="sub-item">Xem lịch dạy giảng viên</span>
                    </a>
                  </li>
                  <li>
                    <a href="{{URL::to('admin/manager-gv')}}">
                      <span class="sub-item">Quản lí giảng viên</span>
                    </a>
                  </li>
                  <li class="active">
                    <a href="{{URL::to('admin/sv-schedule')}}">
                      <span class="sub-item">Xem lịch học sinh viên viên</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            
            <li class="nav-item">
              <a data-toggle="collapse" href="#forms">
                <i class="fa fa-pencil-square"></i>
                <p>Đăng Tin</p>
                <span class="caret"></span>
              </a>
              <div class="collapse" id="forms">
                <ul class="nav nav-collapse">
                  <li>
                    <a href="{{URL::to('admin/post-notifications')}}">
                      <span class="sub-item">Đăng thông báo</span>
                    </a>
                  </li>
                  <li>
                    <a href="{{URL::to('admin/post-notifications-khtc')}}">
                      <span class="sub-item">Đăng thông báo kế hoạch tài chính</span>
                    </a>
                  </li>
                  <li>
                    <a href="{{URL::to('admin/post-notifications-ttdn')}}">
                      <span class="sub-item">Đăng thông báo thực tập doanh nghiệp</span>
                    </a>
                  </li>
                  <li>
                    <a href="{{URL::to('admin/post-event')}}">
                      <span class="sub-item">Đăng sự kiện</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a data-toggle="collapse" href="#tables">
                <i class="fa fa-table"></i>
                <p>Xem tin</p>
                <span class="caret"></span>
              </a>
              <div class="collapse" id="tables">
                <ul class="nav nav-collapse">
                  <li>
                    <a href="{{URL::to('admin/view-notifications')}}">
                      <span class="sub-item">Xem thông báo</span>
                    </a>
                  </li>
                  <li>
                    <a href="{{URL::to('admin/view-notifications-khtc')}}">
                      <span class="sub-item">Xem thông báo kế hoạch tài chính</span>
                    </a>
                  </li>
                  <li>
                    <a href="{{URL::to('admin/view-notifications-ttdn')}}">
                      <span class="sub-item">Xem thông báo thực tập doanh nghiệp</span>
                    </a>
                  </li>
                  <li>
                    <a href="{{URL::to('admin/view-events')}}">
                      <span class="sub-item">Xem sự kiện</span>
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
                    <a href="{{URL::to('admin/maps')}}">
                      <span class="sub-item">VKUMap</span>
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
                  Xem lịch học sinh viên
                </h4>
              </div>
              <div class="card-body">
                <div class="col-md-10 ml-auto mr-auto">
                  <div class="container" style="overflow-x: scroll;">
                    <form>
                      <div class="form-group" method="get" action="{{route('get.data')}}">
                        <label for="exampleInputEmail1">Nhập tên sinh viên</label>
                        <input type="text" class="form-control" name="sinhvien">
                        <!-- <input type="text" hidden value=""> -->
                        <div class="text-right" style="margin-top: 20px;">
                          <button type="submit" class="btn btn-primary" hreft="/name">Xem</button>
                        </div>
                      </div>
                    </form>
                    <?php if(isset($svtkb)){ ?>
                    <table class="table table-striped table-dark">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Thứ hai</th>
                          <th scope="col">Thứ ba</th>
                          <th scope="col">Thứ tư</th>
                          <th scope="col">Thứ năm</th>
                          <th scope="col">Thứ sáu</th>
                          <th scope="col">Thứ bảy</th>
                          <th scope="col">Chủ nhật</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php       // table tbody td .overflowTest
                        for ($tiet = 1; $tiet <= 9; $tiet++) {
                        echo '<tr>
                          <th class="tiet" scope="row">Tiết ' . $tiet . '</th>';
                          for ($thu = 2; $thu <= 8; $thu++) {
                          echo '<td class="tdtkb"><div class ="overflowTest" >';
                            for ($x = 0; $x < sizeof($svtkb); $x++) {
                            if ($svtkb[$x]->Thu == $thu && $svtkb[$x]->Tiet == $tiet) {
                            echo $svtkb[$x]->MaMon . '<br>Phòng ' . $svtkb[$x]->Phong;
                            break;
                          }
                        }
                      echo '</div></td>';
                    }
                  echo '</tr>';
                }
                ?>
              </tbody>
            </table>
            
          </div>
          <div class="container">
            <?php } ?>
            <h4 class="text-center">Các lớp học phần </h4>
            <?php if(isset($svtkb)){ ?>
            <table class="table table-striped table-dark">
              <thead>
                <tr>
                  <th scope="col">Lớp học phần</th>
                  <th scope="col">Giảng viên</th>
                </tr>
              </thead>
              <tbody>
                <?php for($i=0;$i< sizeof($dsmon);$i++){
                echo"

                <tr>
                  <td>".$dsmon[$i]->TenMon."</td>
                  <td>".$dsmon[$i]->HoTenGV."</td>
                </tr>
                ";
              }
              ?>
            </tbody>
          </table>
          <?php } ?>
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
          <button type="button" class="changeBackgroundColor selected" data-color="bg1"></button>
          <button type="button" class="changeBackgroundColor" data-color="bg3"></button>
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

</body>

</html>
<?php
?>