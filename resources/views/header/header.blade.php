<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="{{asset('img/logo/logo-cwf.png')}}" rel="icon">
  <title> {{ $title }} </title>
  <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('vendor/bootstrap-touchspin/css/jquery.bootstrap-touchspin.css')}}" rel="stylesheet" >
  <link href="{{asset('vendor/select2/dist/css/select2.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{asset('vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet" >
  <link href="{{asset('vendor/clock-picker/clockpicker.css')}}" rel="stylesheet">
  <link href="{{asset('css/ruang-admin.min.css')}}" rel="stylesheet">
  <link href="{{asset('css/profile.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
  @livewireStyles
</head>
<body id="page-top">
<div id="wrapper">
    @include('navbar.navbar')
    @yield('content')
    @include('footer.footer')