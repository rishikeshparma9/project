@extends('layouts.master')
@section('title')
Log out.
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
</br></br></br></br></br></br></br></br></br></br></br>
<div class="container text-center">
<button class="btn btn-default" ><a href="/" style="color:black;">Sign In </a></button>
</div>
<style>
body{
  background-image:url({{ URL::asset('img/bg-3.jpg') }});
}
</style>
@endsection
