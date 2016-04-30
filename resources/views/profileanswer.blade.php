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
<script src="{{URL::to('js/jquery.timeago.js')}}" type="text/javascript"></script>
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

                         <div class="container">
                           @if (Storage::disk('local')->has($fname))
                           <!--  <img src="img/profile-widget-avatar.jpg" alt=""> -->
                             <img src="{{route('userimage',['filename'=>$fname])}}" alt="" class="img-responsive"  width="40" height="40" style="border-radius:50% ;height:40px;weight:40px;"/>
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
      <section id="main-content" >
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
                                      <img src="{{route('userimage',['filename'=>'img-'.$id.'.jpg'])}}" alt="" class="img-responsive"  width="40" height="40"/>
                                      @else
                                      <img src="{{{ asset('img/avatar1_small.jpg') }}}" alt="" class="img-responsive"  width="40" height="40"/>
                                      @endif
                                  </div>
                                </div>
                                <div class="col-lg-4 col-sm-4 follow-info">
                                    <p>{{$user_profile->bio}}</p>
                                    <p>{{$name}}</p>

                                </div>
                              </div>
                        </div>
                    </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-12">
                        <section class="panel">
          <header class="panel-heading tab-bg-info">
              <ul class="nav nav-tabs">
                  <li class="">
                      <a  href="/profile/{{$name}}">
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
                  <li class="active">
                      <a  href="/profileanswer/{{$name}}">
                          <i class="icon-user"></i>
                          Answer
                      </a>
                  </li>

              </ul>
          </header>

          <div class="panel-body">
              <div class="tab-content">

                <div id="answer" class="tab-pane active">
                  <section class="panel">
                      <div class="panel-body bio-graph-info">
                  <h3>Answer</h3>

                      @foreach($answers_text as $answer_text)
                      @if($answer_text->anonymous==0)
      <div style="background-color:#f7f7f7;padding-left:20px;padding-right:20px;padding-bottom:20px;">
                  <div class="row"><div class="col-lg-12" style="background-color:white;">
                        <h3><a href="/question/{{$answer_text->question_id}}"style="color:black;font-size:21px;font-weight:bold;">{{$answer_text->question_text}}</a></h3>
                      </div></div>
                        <div class="row" style="background-color:white;" >
                      <div class="col-sm-1">
                        <h5>  @if (Storage::disk('local')->has('img-'.$id.'.jpg'))
                          <!--  <img src="img/profile-widget-avatar.jpg" alt=""> -->
                            <img src="{{route('userimage',['filename'=>'img-'.$id.'.jpg'])}}" alt="" class="img-responsive"  width="40" height="40"/>
                            @else
                            <img src="{{{ asset('img/avatar1_small.jpg') }}}" alt="" class="img-responsive"  width="40" height="40"/>
                            @endif</h5>
                      </div>
                      <div class="col-sm-10" >
                        <h3>  <a style="color:black;font-size:20px;" href="/profile/{{$name}}">{{$name}}</a>,{{$user_profile->bio}}</h3>

                    </div>

                      <div class="col-sm-1" style="background-color:white;font-size:15px;">
                        <?php
                        $time = strtotime($answer_text->created_at);
                        $newformat = date('Y/m/d h:i:sa',$time);
                        ?>
                        <h5>{{$newformat}}</h5>
                      </div>
                  </div>
                     <div class="row" style="background-color:white;">
                       <div class="col-lg-12">
                         <h5 style="font-size:20px;" class="short"><?php
                         $str = $answer_text->answer;
                         echo html_entity_decode($str);
                         ?></h5>

                       </div>
                     </div>
                     <div class="row" style="background-color:white;" data-value="{{Auth::user()->id}}">
                       <div class="col-lg-1"  data-value="{{$answer_text->id}}">
                         @if($answer_text->light!=1)
                         <span class="fa fa-caret-up fa-2x up" style="color:#009de6;"></span>
                         @endif
                         @if($answer_text->light==1)
                         <span class="fa fa-caret-up fa-2x up" style="color:green;"></span>
                         @endif
                         <span style="font-size:20px;" id="like{{$answer_text->id}}">{{$answer_text->upvotes}}</span>
                       </div>
                       <div class="col-lg-1" data-value="{{$answer_text->id}}">
                         @if($answer_text->light!=-1)
                         <span class="fa fa-caret-down fa-2x down" style="color:  #009de6;"></span>
                         @endif
                         @if($answer_text->light==-1)
                         <span class="fa fa-caret-down fa-2x down" style="color:red;"></span>
                         @endif
                         <span style="font-size:20px;" id="unlike{{$answer_text->id}}">{{$answer_text->downvotes}}</span>
                       </div>
                       <div class="col-lg-1">
                          <p class="com-click" style="color:black;cursor:pointer;">Comments</p>
                        </div>
                        <div class="col-lg-9"></div>
                      </div>
                      <div class="row com" style="display:none;background-color:#f7f7f7;border-radius:5px;">
                        <form class="form-comment{{$answer_text->id}} has-success form-commen" action="" novalidate>
                          <div  class=" col-lg-12 "  style="padding-top:4px;padding-bottom:10px;margin-top:2px;" >
                            <input id="inputSuccess" type="text" class="comment" name="comment" class="form-control" placeholder="" value="{{ Request::old('comment') }}" style="border-color:#d4d4d4;border-radius:5px;width:100%;"></br>
                            <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" id="answer_id" name="answer_id" value="{{$answer_text->id}}">

                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                          </div>
                        </form>
                        <div class="container-fluid comments_section{{$answer_text->id}}">

                        </div>

                      </div>
     </div>
      <br>
      @endif
      @endforeach

      <!--main content end-->
    </div></section></div></div></div>
  </section></section>


  <script>
  $(document).ready(function(){

      $('.com-click').click(function(){
        var answer_id=$(this).parent().parent().next().children().find('input[name="answer_id"]').val();
        var url1='/comment/'+answer_id;
        $(this).parent().parent().next().toggle();
        $.ajax({
              method:'GET',
              url:url1,
              success: function(data){
                $('.comments_section'+answer_id).text('');
                var text='';
                for (i = 0; i < data['comments'][0].length; i++) {


                  text ='<div class="row" style="border:3px solid white;border-radius:5px;padding-top:-1px;padding-bottom:-1px;margin-top:4px;"><div class="col-sm-10"  style="overflow:auto;">'+data['comments'][0][i].username+': '
                  + data['comments'][0][i].comment +
                  '</div><div class="col-sm-2"><span style="float:right;">'+jQuery.timeago(data['comments'][0][i].created_at)+'</span></div></div>';
                  $('.comments_section'+answer_id).append(text);
              }
            }
          });
    });
    $('.form-commen').submit(function(e){
      e.preventDefault();
         var comment=$(this).find('input[name="comment"]').val();
         var user_id=$(this).find('input[name="user_id"]').val();
         var answer_id=$(this).find('input[name="answer_id"]').val();
         var token = '{{Session::token()}}';
         var url1='/comment';
         $.ajax({
               method:'POST',
               url:url1,
               data:{'comment':comment,'answer_id':answer_id,'user_id':user_id,'_token':token},
               success: function(data){
                       $('.comments_section'+answer_id).text('');
                 var text='';
                 for (i = 0; i < data['comments'][0].length; i++) {
                   text ='<div class="row" style="border:3px solid white;border-radius:5px;padding-top:-1px;padding-bottom:-1px;margin-top:4px;"><div class="col-sm-10"  style="overflow:auto;">'+data['comments'][0][i].username+' : '
                   + data['comments'][0][i].comment +
                   '</div><div class="col-sm-2"><span style="float:right;">'+jQuery.timeago(data['comments'][0][i].created_at)+'</span></div></div>';
                   $('.comments_section'+answer_id).append(text);
                   }
               }
           });
         });
         $("input").keypress(function(event) {
             if (event.which == 13) {
                 event.preventDefault();
                 $(".form-commen").submit();
             }
         });



                                       $(".down").click(function(e){
                                           var user_id = $(this).parent().parent().data('value');
                                           var answer_id=$(this).parent().data('value');
                                           var id = '#unlike'+answer_id;
                                             e.preventDefault();
                                             var url2='/disliked';
                                              var token = '{{Session::token()}}';
                                               $.ajax({
                                                 method: 'POST',
                                                     url:url2,
                                         data:{'u':user_id,'a':answer_id,'_token':token},
                                             success: function(data){
                                                         $(id).text(' '+data['downvotes']);
                                                                   }
                                                                });
                                                              });

                                          $(".up").click(function(e){
                                             var user_id = $(this).parent().parent().data('value');
                                             var answer_id=$(this).parent().data('value');
                                               var id = '#like'+answer_id;
                                           e.preventDefault();
                                           var url1='/liked';
                                            var token = '{{Session::token()}}';
                                             $.ajax({
                                                   method: 'POST',
                                                   url:url1,
                                               data:{'u':user_id,'a':answer_id,'_token':token},
                                                   success: function(data){
                                                           $(id).text(' '+data['upvotes']);
                                                             }
                                                     });
                                               });
  });
  </script>

  @endsection


  <script>

      //knob
      $(".knob").knob();

  </script>


  </body>
</html>
