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
                             <img src="{{{ asset('img/avatar1_small.jpg') }}}" alt="" class="img-responsive"  width="40" height="40" style="border-radius:50%; height:40px;weight:40px;"/>
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
                    <a class="" href="/profile/{{Auth::user()->username}}">
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
                  <li class="active">
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
                                  <img src="" alt="{{{ asset('img/avatar1_small.jpg') }}}" class="img-responsive"  width="40" height="40"/>
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
                                  <li >
                                      <a href="/setting1">
                                          <i class="icon-envelope"></i>
                                          Edit Profile
                                      </a>
                                  </li>
                                  <li class="active">
                                      <a data-toggle="tab" href="#edit-password">
                                          <i class="icon-envelope"></i>
                                          Edit Password
                                      </a>
                                  </li>
                              </ul>
                          </header>
                          <div class="panel-body">
                              <div class="tab-content">
                                  <!-- edit-profile -->

                                  <!-- edit-password -->
                                  <div id="edit-password" class="tab-pane active">
                                    <section class="panel">
                                          <div class="panel-body bio-graph-info">
                                              <h1> Password Info</h1>
                                              @if(Session::has('message'))
                                             <p class="text-center" style="color:red;">
                                                 {{ Session::get('message') }}
                                             </p>
                                             @endif
                                              <form class="form-horizontal" action=" {{ route('settings',['form'=>3]) }} " method="post" enctype="multipart/form-data" novalidate>
                                                  <div class="form-group {{ $errors->has('cpassword') ? 'has-error' : '' }}">
                                                      <label class="col-lg-2 control-label" for="cpassword">Old Password</label>
                                                      <div class="col-lg-6">
                                                          <input type="password" id="cpassword" name="cpassword" class="form-control" placeholder="Your password(length:4 to 10)" value="">
                                                            <p style="color:red;">{{ $errors->first('cpassword') }}</p>
                                                      </div>
                                                  </div>
                                                  <div class="form-group {{ $errors->has('npassword') ? 'has-error' : '' }}">
                                                      <label class="col-lg-2 control-label" for="npassword">New Password</label>
                                                      <div class="col-lg-6">
                                                          <input type="password" id="npassword" name="npassword" class="form-control" placeholder="Your password(length:4 to 10)" value=""></br>
                                                           <p style="color:red;">{{ $errors->first('npassword') }}</p>
                                                      </div>
                                                  </div>
                                                  <div class="form-group {{ $errors->has('npassword_confirm') ? 'has-error' : '' }}">
                                                      <label class="col-lg-2 control-label" for="npassword_confirm">Confirm Password</label>
                                                      <div class="col-lg-6">
                                                          <input type="password" id="npassword_confirm" name="npassword_confirm" class="form-control" placeholder="Your password(length:4 to 10)" value=""></br>
                                                         <p style="color:red;">{{ $errors->first('npassword_confirm') }}</p>
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
                                          </div>
                                      </section>
                                    </div>


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
