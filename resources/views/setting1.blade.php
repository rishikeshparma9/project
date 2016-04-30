<?php
use Carbon\Carbon ;
$fname='img-'.Auth::user()->id.'.jpg';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Settings</title>
    <link rel="icon" href="{{{ asset('img/favicon.ico') }}}" type="image/x-icon" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Profile | Creative - Bootstrap 3 Responsive Admin Template</title>

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->
  </head>

  <body>
  <!-- container section start -->
  <section id="container" class="">
      <!--header start-->
      <header class="header dark-bg">
              <div class="toggle-nav">
                  <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
              </div>

              <!--logo start-->
              <a href="/dashboard" class="logo">Private<span class="lite">Network</span></a>
              <!--logo end-->





              <div class="nav search-row" id="top_menu">
                  <!--  search form start -->
                  <ul class="nav top-menu">

                  </ul>
                  <!--  search form end -->
              </div>

              <div class="top-nav notification-row">
                  <!-- notificatoin dropdown start-->
                  <ul class="nav top-menu">
                    <li>
                      <span class="profile-ava">

                         <div class="container">
                           @if (Storage::disk('local')->has($fname))
                           <!--  <img src="img/profile-widget-avatar.jpg" alt=""> -->
                             <img src="{{route('userimage',['filename'=>$fname])}}" alt="" class="img-responsive"  width="40" height="40" style="border-radius:50%; height:40px;weight:40px;"/>
                             @else
                             <img src="{{{ asset('img/avatar1_small.jpg') }}}" alt="" class="img-responsive"  width="40" height="40" style="border-radius:50% ;height:40px;weight:40px;"/>
                             @endif
                        </div>

                      </span>
                    </li>

                      <li class="dropdown">
                          <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                              <span class="username">{{Auth::user()->username}}</span>
                              <b class="caret"></b>
                          </a>
                          <ul class="dropdown-menu extended logout" style="background-color:white;opacity:1;">
                              <div class="log-arrow-up"></div>
                              <li class="eborder-top">
                                  <a href="/profile/{{Auth::user()->username}}"><i class="icon_profile"></i> My Profile</a>
                              </li>
                              <li>
                                  <a href="/dashboard"><i class="icon_house_alt"></i> Dashboard</a>
                              </li>
                              <li>
                                  <a href="/setting1"><i class="fa fa-wrench"></i> Setting</a>
                              </li>

                              <li>
                                  <a href="/logout"><i class="icon_key_alt"></i> Sign Out</a>
                              </li>

                          </ul>
                      </li>
                      <!-- user login dropdown end -->
                  </ul>
                  <!-- notificatoin dropdown end-->
              </div>
        </header>
      <!--header end-->

      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">
                  <li class="sum-menu">
                    <a class="" href="profile/{{Auth::user()->username}}">
                        <i class="fa fa-user-md"></i>
                        <span>Profile</span>
                    </a>
                  </li>

                  <li class="sum-menu">
                      <a class="" href="/dashboard">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                  <li class="sum-menu active">
                    <a class="" href="/setting1">
                        <i class="fa fa-wrench"></i>
                        <span>Setting</span>
                    </a>
                  </li>

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->

      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-wrench"></i> Setting</h3>

				</div>
			</div>
              <div class="row">
                <!-- profile-widget -->
                <div class="col-lg-12">
                    <div class="profile-widget profile-widget-info">
                          <div class="panel-body">
                            <div class="col-lg-2 col-sm-2">
                              @if($user_profile)
                              <h4>{{$user_profile->first_name}} {{$user_profile->last_name}}</h4>
                               @else
                               <h4></h4>
                               @endif
                              <div class="follow-ava">
                                @if (Storage::disk('local')->has($fname))
                                <!--  <img src="img/profile-widget-avatar.jpg" alt=""> -->
                                  <img src="{{route('userimage',['filename'=>$fname])}}" alt="" class="img-responsive"  width="40" height="40"/>
                                  @else
                                  <img src="{{{ asset('img/avatar1_small.jpg') }}}" alt="" class="img-responsive"  width="40" height="40"/>
                                  @endif
                              </div>

                            </div>
                            <div class="col-lg-4 col-sm-4 follow-info">
                                @if($user_profile)
                                <p>{{$user_profile->bio}}</p>
                                @else
                                <p></p>
                                @endif
                                <p>{{Auth::user()->username}}</p>

                            </div>
                          </div>
                    </div>
                </div>
              </div>
              <!-- page start-->
              <div class="row">
                 <div class="col-lg-12">
                    <section class="panel">
                          <header class="panel-heading tab-bg-info">
                              <ul class="nav nav-tabs">
                                  <li class="active">
                                      <a data-toggle="tab" href="#edit-profile">
                                          <i class="icon-envelope"></i>
                                          Edit Profile
                                      </a>
                                  </li>
                                  <li class="">
                                      <a  href="/setting2">
                                          <i class="icon-envelope"></i>
                                          Edit Password
                                      </a>
                                  </li>
                              </ul>
                          </header>
                          <div class="panel-body">
                              <div class="tab-content">
                                  <!-- edit-profile -->
                                  <div id="edit-profile" class="tab-pane active">
                                    <section class="panel">
                                          <div class="panel-body bio-graph-info">
                                              <h1> Profile Info</h1>
                                              @if($user_profile!=null)
                                              <form class="form-profile form-horizontal" action=" {{ route('settings',['form'=>1]) }} " method="post" enctype="multipart/form-data" novalidate>
                                                  <div class="form-group {{ $errors->has('user_name') ? 'has-error' : '' }}">
                                                      <label class="col-lg-2 control-label" for="user_name">User Name</label>
                                                      <div class="col-lg-6">
                                                          <input type="text" id="user_name" name="user_name" class="form-control" placeholder="Username 4 to 10 characters" value="{{Auth::user()->username}}">
                                                             <p style="color:red;">{{ $errors->first('user_name') }}</p>
                                                      </div>
                                                  </div>
                                                  <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                                                      <label class="col-lg-2 control-label" for="first_name">First Name</label>
                                                      <div class="col-lg-6">
                                                             <input type="text" id="first_name" name="first_name" class="form-control" placeholder="firstname max length 10" value="{{$user_profile->first_name }}">
                                                                 <p style="color:red;">{{ $errors->first('first_name') }}</p>
                                                      </div>

                                                  </div>
                                                  <div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
                                                      <label class="col-lg-2 control-label" for="last_name">Last Name</label>
                                                      <div class="col-lg-6">
                                                           <input type="text" id="last_name" name="last_name" class="form-control" placeholder="lastname max length 10" value="{{$user_profile->last_name }}">
                                                             <p style="color:red;">{{ $errors->first('last_name') }}</p>
                                                      </div>
                                                  </div>
                                                  <div class="form-group {{ $errors->has('about') ? 'has-error' : '' }}">
                                                      <label class="col-lg-2 control-label" for="about">About Me</label>
                                                      <div class="col-lg-10">
                                                          <textarea name="about" id="about" class="form-control" cols="30" rows="5" value="" placeholder="Minimum 20 characters long">{{$user_profile->about }}</textarea>
                                                            <p style="color:red;">{{ $errors->first('about') }}</p>
                                                      </div>
                                                  </div>
                                                  <div class="form-group {{ $errors->has('bio') ? 'has-error' : '' }}">
                                                      <label class="col-lg-2 control-label" for="bio" placeholder="Minimum 10 characters long">Bi0</label>
                                                      <div class="col-lg-10">
                                                          <textarea name="bio" id="bio" class="form-control" cols="30" rows="5" value="" placeholder="Minimum 10 characters long">{{$user_profile->bio }}</textarea>
                                                            <p style="color:red;">{{ $errors->first('bio') }}</p>
                                                      </div>
                                                  </div>
                                                  <div class="form-group {{ $errors->has('year') ? 'has-error' : '' }}">
                                                      <label class="col-lg-2 control-label"  for="year">Year Of Graduation</label>
                                                      <div class="col-lg-6">
                                                        <select class="form-control" id="year" name="year">
                                                                   <option value="2016">2016</option>
                                                                    <option value="2017">2017</option>
                                                                   <option value="2018">2018</option>
                                                                     <option value="2019">2019</option>
                                                                      <option value="2020">2020</option>
                                                        </select>
                                                        <p style="color:red;">{{ $errors->first('year') }}</p>
                                                      </div>
                                                  </div>
                                                  <div class="form-group {{ $errors->has('degree') ? 'has-error' : '' }}">
                                                      <label class="col-lg-2 control-label" for="degree">Degree</label>
                                                      <div class="col-lg-6">
                                                        <select class="form-control" id="degree" name="degree">
                                                               <option value="B.Tech">B.Tech</option>
                                                                <option value="M.Tech">M.Tech</option>
                                                                <option value="B.Tech+M.Tech">B.Tech+M.Tech</option>
                                                                <option value="Integrated M.Tech">Integrated M.Tech</option>
                                                          </select>
                                                          <p style="color:red;">{{ $errors->first('degree') }}</p>
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                        <label class="col-lg-2 control-label" for="image">Profile Picture</label>
                                                        <div class="col-lg-6">
                                                        <input type="file" id="image" name="image" class="form-control" placeholder="Your Photo">
                                                        </div>
                                                  </div>
                                                  <input type="hidden" id="user" name="user" value={{ Auth::user()->id }}>
                                                  <input type="hidden" name="_token" value="{{ Session::token() }}">
                                                  <div class="form-group">
                                                      <div class="col-lg-offset-2 col-lg-10">
                                                          <button type="submit" class="btn btn-primary">Save</button>
                                                          <button type="button" class="btn btn-danger">Cancel</button>
                                                      </div>
                                                  </div>
                                              </form>
                                              @else
                                              <form class="form-profile form-horizontal" action=" {{ route('settings',['form'=>1]) }} " method="post" enctype="multipart/form-data" novalidate>
                                                  <div class="form-group {{ $errors->has('user_name') ? 'has-error' : '' }}">
                                                      <label class="col-lg-2 control-label" for="user_name">User Name</label>
                                                      <div class="col-lg-6">
                                                          <input type="text" id="user_name" name="user_name" class="form-control" placeholder="Username 4 to 10 characters" value="{{Auth::user()->username}}">
                                                             <p style="color:red;">{{ $errors->first('user_name') }}</p>
                                                      </div>
                                                  </div>
                                                  <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                                                      <label class="col-lg-2 control-label" for="first_name">First Name</label>
                                                      <div class="col-lg-6">
                                                             <input type="text" id="first_name" name="first_name" class="form-control" placeholder="firstname max length 10" value="{{ Request::old('first_name') }}">
                                                                 <p style="color:red;">{{ $errors->first('first_name') }}</p>
                                                      </div>

                                                  </div>
                                                  <div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
                                                      <label class="col-lg-2 control-label" for="last_name">Last Name</label>
                                                      <div class="col-lg-6">
                                                           <input type="text" id="last_name" name="last_name" class="form-control" placeholder="lastname max length 10" value="{{ Request::old('last_name') }}">
                                                             <p style="color:red;">{{ $errors->first('last_name') }}</p>
                                                      </div>
                                                  </div>
                                                  <div class="form-group {{ $errors->has('about') ? 'has-error' : '' }}">
                                                      <label class="col-lg-2 control-label" for="about">About Me</label>
                                                      <div class="col-lg-10">
                                                          <textarea name="about" id="about" class="form-control" cols="30" rows="5" value="{{ Request::old('about') }}" placeholder="Minimum 20 characters long"></textarea>
                                                            <p style="color:red;">{{ $errors->first('about') }}</p>
                                                      </div>
                                                  </div>
                                                  <div class="form-group {{ $errors->has('bio') ? 'has-error' : '' }}">
                                                      <label class="col-lg-2 control-label" for="bio" placeholder="Minimum 10 characters long">Bio</label>
                                                      <div class="col-lg-10">
                                                          <textarea name="bio" id="bio" class="form-control" cols="30" rows="5" value="{{ Request::old('bio') }}" placeholder="Minimum 10 characters long"></textarea>
                                                            <p style="color:red;">{{ $errors->first('bio') }}</p>
                                                      </div>
                                                  </div>
                                                  <div class="form-group {{ $errors->has('year') ? 'has-error' : '' }}">
                                                      <label class="col-lg-2 control-label"  for="year">Year Of Graduation</label>
                                                      <div class="col-lg-6">
                                                        <select class="form-control" id="year" name="year">
                                                                   <option value="2016">2016</option>
                                                                    <option value="2017">2017</option>
                                                                   <option value="2018">2018</option>
                                                                     <option value="2019">2019</option>
                                                                      <option value="2020">2020</option>
                                                        </select>
                                                        <p style="color:red;">{{ $errors->first('year') }}</p>
                                                      </div>
                                                  </div>
                                                  <div class="form-group {{ $errors->has('degree') ? 'has-error' : '' }}">
                                                      <label class="col-lg-2 control-label" for="degree">Degree</label>
                                                      <div class="col-lg-6">
                                                        <select class="form-control" id="degree" name="degree">
                                                               <option value="B.Tech">B.Tech</option>
                                                                <option value="M.Tech">M.Tech</option>
                                                                <option value="B.Tech+M.Tech">B.Tech+M.Tech</option>
                                                                <option value="Integrated M.Tech">Integrated M.Tech</option>
                                                          </select>
                                                          <p style="color:red;">{{ $errors->first('degree') }}</p>
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                        <label class="col-lg-2 control-label" for="image">Profile Picture</label>
                                                        <div class="col-lg-6">
                                                        <input type="file" id="image" name="image" class="form-control" placeholder="Your Photo">
                                                        </div>
                                                  </div>
                                                  <input type="hidden" id="user" name="user" value={{ Auth::user()->id }}>
                                                  <input type="hidden" name="_token" value="{{ Session::token() }}">
                                                  <div class="form-group">
                                                      <div class="col-lg-offset-2 col-lg-10">
                                                          <button type="submit" class="btn btn-primary">Save</button>
                                                          <button type="button" class="btn btn-danger">Cancel</button>
                                                      </div>
                                                  </div>
                                              </form>
                                              @endif
                                          </div>
                                      </section>
                                  </div>
                                  <!-- edit-password -->



                              </div>
                          </div>
                      </section>
                 </div>
              </div>

              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
  </section>
  <!-- container section end -->
    <!-- javascripts -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- jquery knob -->
    <script src="assets/jquery-knob/js/jquery.knob.js"></script>
    <!--custome script for all page-->
    <script src="js/scripts.js"></script>

  <script>

      //knob
      $(".knob").knob();

  </script>


  </body>
</html>
