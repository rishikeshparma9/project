<?php
$fname='img-'.Auth::user()->id.'.jpg';
?>
@extends('layouts.master')
@section('title')
Profile
@endsection
@section('links')
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
<meta name="author" content="GeeksLabs">
<meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
<link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
<link rel="shortcut icon" href="{{{ asset('img/favicon.ico') }}}">
<link rel="stylesheet" href="{{ URL::asset('css/bootstrap-theme.css') }}" >
<link rel="stylesheet"  href="{{ URL::asset('css/elegant-icons-style.css') }}">
<link rel="stylesheet" href="{{ URL::asset('css/font-awesome.css') }}">
<link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
<link href="{{ URL::asset('css/style-responsive.css') }}" rel="stylesheet">
<script src="{{URL::to('js/jquery.min.js')}}"></script>
<script src="{{URL::to('js/bootstrap.min.js')}}"></script>
<link rel="stylesheet" href="{{URL::asset('fontawe/fontawee/css/font-awesome.min.css')}}">
@endsection
@section('content')
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
                        @if (Storage::disk('local')->has($fname))
                         <div class="container">
                         <img src="{{route('userimage',['filename'=>$fname])}}" alt="" class="img-responsive img-circle"  width="40" height="40"  style="border-radius:50%; height:40px;weight:40px;"/>
                        </div>
                        @else
                        <div class="container">
                        <img src="{{{ asset('img/avatar1_small.jpg') }}}" alt="" class="img-responsive"  width="40" height="40"  style="border-radius:50%; height:40px;weight:40px;"/>
                        </div>
                        @endif
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
                  <li class="active">
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
                  <li class="sum-menu">
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
					<h3 class="page-header"><i class="fa fa-user-md"></i> Profile</h3>

				</div>
			</div>
              <div class="row">
                <!-- profile-widget -->
                <div class="col-lg-12">
                    <div class="profile-widget profile-widget-info">
                          <div class="panel-body">
                            <div class="col-lg-2 col-sm-2">
                              <h4>{{$user_profile->first_name}} {{$user_profile->last_name}}</h4>
                              <div class="follow-ava">
                                @if (Storage::disk('local')->has('img-'.$id.'.jpg'))
                                <!--  <img src="img/profile-widget-avatar.jpg" alt=""> -->
                                  <img src="{{route('userimage',['filename'=>'img-'.$id.'.jpg'])}}" alt="" class="img-responsive"  width="40" height="40" style="border-radius:50% ;height:40px;weight:40px;"/>
                                  @else
                                  <img src="{{{ asset('img/avatar1_small.jpg') }}}" alt="" class="img-responsive"  width="40" height="40" style="border-radius:50% ;height:40px;weight:40px;"/>
                                  @endif
                              </div>
                            </div>
                            <div class="col-lg-4 col-sm-4 follow-info">
                                <p>  {{$user_profile->bio}}</p>
                                <p>{{$name}}</p>

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
                                      <a  href="#profile">
                                          <i class="icon-user"></i>
                                          Profile
                                      </a>
                                  </li>
                                  <li class="">
                                      <a  href="/profilequestion/{{$name}}">
                                          <i class="icon-user"></i>
                                          Question
                                      </a>
                                  </li>
                                  <li class="">
                                      <a  href="/profileanswer/{{$name}}">
                                          <i class="icon-user"></i>
                                          Answer
                                      </a>
                                  </li>

                              </ul>
                          </header>
                          <div class="panel-body">
                              <div class="tab-content">
                                  <!-- profile -->
                                  <div id="profile" class="tab-pane active">
                                    <section class="panel">
                                      <div class="bio-graph-heading">

                                                {{$user_profile->about}}

                                      </div>
                                      <div class="panel-body bio-graph-info">
                                          <h1>Profile</h1>
                                          <div class="row">
                                              <div class="bio-row">
                                                  <p><span>User Name </span>:
                                                     {{$name}} </p>
                                              </div>
                                              <div class="bio-row">

                                                  <p><span>Bio </span>:
                                                 {{$user_profile->bio}}
                                                  </p>
                                              </div>

                                              <div class="bio-row">
                                                  <p><span>First Name </span>:     {{$user_profile->first_name}} </p>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span>Last Name </span>:  {{$user_profile->last_name}}</p>
                                              </div>

                                              <div class="bio-row">
                                                  <p><span>Grad. Year </span>:  {{$user_profile->year}} </p>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span>Degree </span>: {{$user_profile->degree}}</p>
                                              </div>
                                          </div>
                                      </div>
                                    </section>
                                      <section>
                                          <div class="row">
                                          </div>
                                      </section>
                                  </div>



                      </section>
                 </div>
              </div>

              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
  </section>
  @endsection


  <script>

      //knob
      $(".knob").knob();

  </script>


  </body>
</html>
