@extends('header.header')
@section('content')
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Visitors Check In</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ $page }}</li>
            </ol>
          </div>
          @if(session()->has('success'))
          <div class="d-flex flex-row-reverse">
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
                {{ session('success') }}
            </div>
          </div>
          @endif
          <div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <livewire:visitor-index />
              </div>
            </div>
          <!--Row-->
          @endsection
          @include('visitors.detail')
          @include('visitors.checkOut')
