@extends('header.header')
@section('content')
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Product</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./dashboard">Home</a></li>
              <li class="breadcrumb-item">Nota</li>
              <li class="breadcrumb-item active" aria-current="page">Data Product Keluar</li>
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

          <div class="d-flex flex-row-reverse"  id="success_message">

          </div>
            <!-- Row -->
          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center bd-highlight">
                  <h6 class="m-0 font-weight-bold text-primary flex-grow-1 bd-highlight">Nota Product Keluar</h6>
                  <a href="/notaBarangExport" class="btn btn-success mb-1 bd-highlight"><i class="far fa-file-excel"> Excel</i></a>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                      <th>#UUID</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>No. NOTA</th>
                        <th>Pembeli</th>
                        <th>Pembuat</th>
                        <th>Status</th>
                        <th>Foto</th>
                        <th class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>#UUID</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>No. NOTA</th>
                        <th>Pembeli</th>
                        <th>Pembuat</th>
                        <th>Status</th>
                        <th>Foto</th>
                        <th class="text-center">Action</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      @foreach ($dataNota as $row )
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->created_at->format('l, d M Y') }}</td>
                        <td>{{ $row->created_at->format('H:i') }}</td>
                        <td>{{ $row->nota }}</td>
                        <td>{{ $row->pembeli }}</td>
                        <td>{{ $row->pembuat }}</td>
                        <td><span class="badge @if($row->checked_by == null) badge-danger @else badge-success @endif  ">{!! ($row->checked_by == Null) ? 'Waiting' : 'Checked' !!}</span></td>
                        <td>
                          @if($row->foto == Null)
                          <span class="badge badge-danger">no Image</span>
                          @else
                          <a href="{{asset('storage/public/'. $row->foto)}}" target="_blank"><span class="badge badge-warning">download</span></a>
                          @endif
                        </td>
                        <td class="d-flex justify-content-center">
                          @can('admin_tirza_produksi_agusnaini_security')
                          <a href="{{url('notaBarang',['id' => $row->id])}}" class="btn btn-sm btn-warning mr-1" title="cetak" ><i class="fa fa-info-circle"></i></a>
                          @endcan
                          @can('admin_tirza_agusnaini_security')
                          <button type="button" value="{{ $row->id }}" class="btn btn-sm btn-success securityValidated mr-1" title="validated" {!! ($row->checked_by == Null) ? 'disabled' : '' !!}><i class="fa fa-check" aria-hidden="true"></i></button>
                          @endcan
                          @can('admin_tirza_agusnaini')
                          <button type="button" value="{{ $row->id }}" class="btn btn-sm btn-primary checkedBy mr-1" title="checked" {!! ($row->checked_by !== Null) ? 'disabled' : '' !!}><i class="fa fa-check" aria-hidden="true"></i></button>
                          @endcan
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
        </div>
    @include('brgKeluar._ModalCheckedBy')
  @include('brgKeluar._ModalValidasiNota')
@endsection

@section('script')
    @include('brgKeluar._script')
@endsection
