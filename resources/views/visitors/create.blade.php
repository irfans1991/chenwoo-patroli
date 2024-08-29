@extends('header.header')
@section('content')
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Input Data Visitor</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ $page }}</li>
            </ol>
          </div>

          <div class="row">
          <div class="col-lg-3 mb-4">
        </div>
            <div class="col-lg-6 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Tambah Data Visitor</h6>
                </div>
                <div class="card-body">
                  <livewire:visitor-create />
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
          </div>
          <!--Row-->
@endsection