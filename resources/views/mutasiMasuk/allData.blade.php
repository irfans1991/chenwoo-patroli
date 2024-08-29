@extends('header.header')
@section('content')
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Mutasi</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./dashboard">Home</a></li>
              <li class="breadcrumb-item">Mutasi</li>
              <li class="breadcrumb-item active" aria-current="page">Data Mutasi</li>
            </ol>
          </div>
          @if(session()->has('success'))
          <div class="d-flex flex-row-reverse" id="success_message" >
          <div class="alert alert-success alert-dismissible user-disable" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    {{ session('success') }}
                  </div>
                  </div>
          @endif
            <!-- Row -->
          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center bd-highlight">
                  <h6 class="m-0 font-weight-bold text-primary flex-grow-1 bd-highlight">Data Mutasi</h6>
                  <a href="/mutasiExport" class="btn btn-success mb-1 bd-highlight"><i class="far fa-file-excel"> Excel</i></a>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>#</th>
                        <th>tanggal</th>
                        <th>tipe mutasi</th>
                        <th>Nama Supplier</th>
                        <th>Asal</th>
                        <th>Jenis</th>
                        <th>Security</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>#</th>
                        <th>tanggal</th>
                        <th>tipe mutasi</th>
                        <th>Nama Supplier</th>
                        <th>Asal</th>
                        <th>Jenis</th>
                        <th>Security</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      @foreach($allData as $row)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$row->created_at->format('l, d m Y')}}</td>
                        <td>{{$row->type_mutasi}}</td>
                        <td>{{$row->supplier_name}}</td>
                        <td>{{$row->from}}</td>
                        <td>{{$row->supplier}}</td>
                        <td>{{$row->security}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
        </div>
</div>

@endsection
