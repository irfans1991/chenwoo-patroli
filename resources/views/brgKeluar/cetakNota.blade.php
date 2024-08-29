@extends('header.header')
@section('content')
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Document Tables</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ $page }}</li>
            </ol>
          </div>
          <div class="d-flex flex-row-reverse success_message"  id="success_message">
          
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
                <div class="card-header py-6 d-flex flex-column align-items-left">
                  <div class="d-flex flex-row">
                  <h6 class="m-0 font-weight-bold text-black flex-grow-1">NOTA PENJUALAN</h6>
                  @can('admin_tirza_agusnaini')
                  @if($dataNota->disetujui)
                  <a href="/cetak-nota/{{ $dataNota->id }}" target="_blank" class="btn btn-primary mb-1 bd-highlight"><i class="fa fa-print"> Print</i></a>
                  @endif
                  @endcan  
                </div>
                  <br>
                  <!-- <a href="/permission/create" class="btn btn-black mb-1 bd-highlight mr-2"><i class="fa fa-print"> Cetak</i></a>
                  <a href="/permissionExport" class="btn btn-success mb-1 bd-highlight"><i class="far fa-file-excel"> Excel</i></a> -->
                    <div class="row">
                        <div class="col">
                            <h6 class="m-0 font-weight-bold text-black">PENERIMA : {{ $dataNota->pembeli }} </h6>
                            <h6 class="m-0 font-weight-bold text-black">JENIS : {{ $dataNota->jenisPembeli }} </h6>
                        </div>
                        <div class="col">
                        <h6 class="m-0 font-weight-bold text-black mb-2">TANGGAL : {{ $dataNota->created_at->format('l, d M Y') }}</h6>
                        <h6 class="m-0 font-weight-bold text-black">NOTA NO : {{ $dataNota->nota }} </h6>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush" id="TableRefresh">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>Jenis</th>
                        <th>Jumlah</th>
                        <th>Unit</th>
                        <th>Harga</th>
                        <th>Sub Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($data3 as $row )
                      <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $row->jenisBarang }}</td>
                          <td>{{ $row->qty }}</td>
                          <td>{{ $row->unit }}</td>
                          <td>Rp. {{ number_format($row->harga) }}</td>
                          <td>Rp. {{number_format($row->qty*$row->harga)}}</td>
                        </tr>
                        
                    @endforeach
                    </tbody>
                    <th>Total</th>
                        <td></td>
                        <td class="font-weight-bold">{{ $totalQty }}</td>
                        <td></td>
                        <td class="font-weight-bold">Rp. {{ number_format($totalHarga) }}</td>
                        <td class="font-weight-bold">Rp. {{ number_format($totalBiaya) }}</td>
                  </table>
                </div>
                <div class="card-footer"></div>
                <div class="p-3">
                      <table width="100%" cellspacing="0" class="text-center">
                        <thead>
                          <tr>
                            <th>PENERIMA</th>
                            <th>VALIDASI</th>
                            <th>MENGETAHUI</th>
                            <th>PEMBUAT & PENIMBANG</th>
                          </tr>
                        </thead>
                          <tr>
                            <th height="50px">
                            </th>
                            <th height="50px">
                            </th>
                          </tr>
                        <tr>
                          <td>{{ $dataNota->pembeli }}</td>
                          <td>{{ $dataNota->checked_by }}</td>
                          @if($dataNota->disetujui)
                          <td>{{ $dataNota->disetujui }}</td>
                          @else
                          <td><span class="badge badge-danger">Belum Disetujui</span></td>
                          @endif
                          <td>{{ $dataNota->pembuat }}</td>
                        </tr>
                  </table>
                </div>
            </div>
        </div>
      </div>

@endsection