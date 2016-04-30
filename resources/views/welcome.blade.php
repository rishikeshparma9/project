@extends('layouts.master')
@section('title')
Sign In
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
@endsection
@section('content')
<br><br><br><br><br><br><br><br><br><br>

<div class="container-fluid">
<div class="row">
  <div class="col-sm-offset-1 col-sm-3">
    @if(Session::has('message'))
   <p class="text-center" style="color:red;">
       {{ Session::get('message') }}
   </p>
@endif
     <form class="form-signin" action=" {{ route('signin') }} " method="post" novalidate>

       <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
       <label for="email" class="sr-only">Email address</label>
       <input type="email" id="email" name="email" class="form-control" placeholder="Email address" value="{{ Request::old('email') }}">
       <p style="color:red;font_weight:bold;">{{ $errors->first('email') }}</p>
     </div>
       <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
       <label for="password" class="sr-only">Password</label>
       <input type="password" id="password" name="password" class="form-control" placeholder="Password">
       <p style="color:red;font_weight:bold;">{{ $errors->first('password') }}</p>
       </div>
       <div class="checkbox">
         <label class="checkbox">
             <span class="pull-left" style="color:white"> <a href="/signup"> New User?</a></span>

         </label>

       </div>
       <button class="btn btn-lg btn-primary btn-block" type="submit">Sign In</button></br>

       <input type="hidden" name="_token" value="{{ Session::token() }}">
     </form>
   </div>



<script>
$(function(){
  $("#sign").click(function(){
     $("#log-button").removeClass("active");
     $("#login").removeClass("active");
    $("#sign-button").addClass("active");
    $("#signup").addClass("active");
});
});
</script>
<style>
body{
  background-image:url({{ URL::asset('img/bg-0.jpg') }});
}
</style>

 </div>
</div> <!-- /container -->

@endsection
