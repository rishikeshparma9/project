@extends('layouts.master')
@section('title')
Sign Up
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
<br><br><br><br><br><br><br><br><br><br>

<div class="container-fluid">
<div class="row">
  <div class="col-sm-offset-1 col-sm-3">
     <form class="form-signin" action=" {{ route('signup') }} " method="post" novalidate>

       <div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">

       <input type="text" id="username" name="username" class="form-control" placeholder="Username 4 to 12 characters long" value="{{ Request::old('username') }}">
          <p style="color:red;font_weight:bold;">{{ $errors->first('username') }}</p>
     </div>
       <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">

       <input type="email" id="email" name="email" class="form-control" placeholder="Email address" value="{{ Request::old('email') }}">
        <p style="color:red;font_weight:bold;">{{ $errors->first('email') }}</p>
     </div>
       <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">

       <input type="password" id="password" name="password" class="form-control" placeholder="Password(length:4 to 10 characters long">
        <p style="color:red;font_weight:bold;">{{ $errors->first('password') }}</p>
     </div>
       <div class="checkbox">
         <label>
           <span class="pull-left" style="color:white"> <a href="/"> Sign In</a></span>
         </label>
       </div>
       <button class="btn btn-lg btn-primary btn-block" type="submit">Sign Up</button></br>

       <input type="hidden" name="_token" value="{{ Session::token() }}">
     </form>
   </div>
 </div>
</div> <!-- /container -->
<style>
body{
  background-image:url({{ URL::asset('img/bg-0.jpg') }});
}
</style>

@endsection
