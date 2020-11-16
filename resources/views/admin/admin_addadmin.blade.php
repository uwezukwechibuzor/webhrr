<?php
   if (Session::has('user')){
$role =  Session::get('user')['role'];
   }
?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>index WebHr</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="{{asset('css/backend_css/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{asset('css/backend_css/bootstrap-responsive.min.css') }}" />
<link rel="stylesheet" href="{{asset('css/backend_css/fullcalendar.css') }}" />
<link rel="stylesheet" href="{{asset('css/backend_css/matrix-style.css') }}" />
<link rel="stylesheet" href="{{asset('css/backend_css/matrix-media.css') }}" />
<link href="{{asset('fonts/backend_fonts/font-awesome/css/font-awesome.css') }} rel="stylesheet" />
<link rel="stylesheet" href="{{asset('css/backend_css/jquery.gritter.css') }}" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="dashboard.html">WebHr Admin</a></h1>
</div>
<!--close-Header-part--> 


<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text" style="color: white;">Profile</span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
        <li class="divider"></li>
        <li><a href="#"><i class="icon-check"></i> My Tasks</a></li>
        <li class="divider"></li>
        <li><a href="login.html"><i class="icon-key"></i> Log Out</a></li>
      </ul>
      
    </li>
    <li style="color: white;"> Hello {{Session::get('user')['name']}}, Welcome {{Session::get('user')['role']}} -  {{date('d M Y')}} - {{date('l')}}</li>
  </ul>
</div>
<!--close-top-Header-menu-->
<!--start-top-serch-->
<div id="search">
  <input type="text" placeholder="Search here..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div>
<!--close-top-serch-->
<!--sidebar-menu-->
<div id="sidebar"><a href="/" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li class="active"><a href="/"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    @if($role==='superadmin')
    <li> <a href="/add"><i class="icon icon-signal"></i> <span>Add Admin/Staff</span></a> </li>
   @elseif($role==='admin') 
   <li> <a href="/add"><i class="icon icon-signal"></i> <span>Add Staff</span></a> </li>
   @endif
  </ul>
</div>
<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="/add" title="Go to Home" class="tip-bottom"><i class="icon-home">
    @if($role==='superadmin')
    </i> Add Admin/Staff</a>
    @else
    </i> Add Staff</a>
    @endif
</div>
  </div>
<!--End-breadcrumbs-->

<!--Action boxes-->
  <div class="container-fluid">
<div  id="loginbox">            
            <form id="loginform" class="form-vertical" action="add" method="POST">
				@csrf
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="text"  name="name"  placeholder="name" />
                        </div>
                    </div>
                </div>
                @error('name')
                 <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="text" name="email"  placeholder="email" />
                        </div>
                    </div>
                </div>
                @error('email')
                 <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            @if($role==='superadmin')
                            <input type="radio"  value="admin" name="role"><label for="">Admin</label>
                            <input type="radio" value="staff"  name="role"><label for="">Staff</label>
                            @else
                            <input type="checkbox" value="staff"  name="role"><label for="">Staff</label>
                            @endif
                        </div>
                    </div>
                </div>
                @error('role')
                 <div class="alert alert-danger">{{ $message }}</div>
                 @enderror 
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" name="password" placeholder="Password" />
                        </div>
                    </div>
                </div>
                @error('password')
                 <div class="alert alert-danger">{{ $message }}</div>
                 @enderror

                <div class="form-actions">
                    <span class="pull-right"><button type="submit" class="btn btn-success"> Add Admin</button></span>
                </div>
            </form>
        </div>
    </div>
</div>
    
<!--End-Action boxes-->    


        <script src="{{asset('js/backend_js/jquery.min.js') }}"></script>  
        <script src="{{asset('js/backend_js/matrix.login.js') }}"></script>   
    
</body>
</html>














