<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="{{asset('img/logo/logo-cwf.png')}}" rel="icon">
    <title> {{ $title }} </title>
      <!-- bootstrapt -->
      <link href="{{asset('css/ruang-admin.min.css')}}" rel="stylesheet">

    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/login2.css')}}" rel="stylesheet">
  </head>
  <body>
    <div id="loading">

    </div>
      @yield('content')
  @include('footer.footerLogin')

