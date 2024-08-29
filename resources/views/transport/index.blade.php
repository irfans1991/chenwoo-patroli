@extends('header.header')
@section('content')
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Pemakaian Transportasi Kantor</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ $page }}</li>
            </ol>
          </div>
          <div class="d-flex flex-row-reverse"  id="success_message">
          
          </div>
          @if(session()->has('success'))
          <div class="d-flex flex-row-reverse">
          <div class="alert alert-success alert-dismissible" role="alert">
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
                    {{ session('success') }}
                  </div>
                  </div>
          @endif
          <div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center bd-highlight">
                  <h6 class="m-0 font-weight-bold text-primary flex-grow-1 bd-highlight">Tabel Kendaraan</h6>
                  <a href="/kendaraan/create" class="btn btn-primary mb-1 bd-highlight"><i class="fa fa-plus"> &nbsp Tambah Kendaraan</i></a>
                  @can('admin_staff')
                  <a href="/transportExcel" class="btn btn-success mb-1 bd-highlight bd-highlight mx-2"><i class="far fa-file-excel"> Excel</i></a>
                  @endcan
                </div>
                
                <div class="table-responsive">
                  <table class="table align-items-center table-flush" id="TableRefresh">
                    <thead class="thead-light">
                      <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Kendaraan</th>
                        <th>Nama</th>
                        <th>Driver</th>
                        <th>Kondisi</th>
                        <th>Tujuan</th>
                        <!-- <th>Plat</th> -->
                        <th class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($kendaraan as $row)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->created_at->format('l, d-m-Y') }}</td>
                        <td>{{ $row->transport }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->driver }}</td>
                        <td>{{ $row->condition }}</td>
                        <td>{{ $row->destination }}</td>
                        <!-- <td>{{ $plat[1]}}</td> -->
                        <td class="text-center col-lg-2 mt-2">
                        <button type="button" value="{{ $row->id }}" class="btn btn-sm btn-success" id="update_kendaraan"><i class="fa fa-check" aria-hidden="true"></i></button>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>
    <!--Row-->
    @include('transport._updateModalKendaraan')
@endsection

@section('script')
@include('transport._scriptUpdate')
@endsection 