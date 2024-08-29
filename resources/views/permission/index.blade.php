@extends('header.header')
@section('content')
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tabel Izin Karyawan</h1>
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
                <div class="card-header py-3 d-flex flex-row align-items-center bd-highlight">
                  <h6 class="m-0 font-weight-bold text-primary flex-grow-1 bd-highlight">Tabel Izin Karyawan</h6>
                  @can('admin_staff')
                  <a href="/permission/create" class="btn btn-primary mb-1 bd-highlight mr-2"><i class="fa fa-plus"> &nbsp Buat Izin</i></a>
                  <a href="/permissionExport" class="btn btn-success mb-1 bd-highlight"><i class="far fa-file-excel"> Excel</i></a>
                  @endcan
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush" id="TableRefresh">
                    <thead class="thead-light">
                      <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Nama</th>
                        <th>Bagian</th>
                        <th>jam Keluar</th>
                        <th>Keterangan</th>
                        <th>Validasi</th>
                        <!-- <th>Diketahui</th> -->
                        <th class="text-center" width="50px">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($permissions as $row)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->created_at->format('l, d m Y') }}</td>
                        <td>{{ $row->name }}</td>
                        <td><span class="badge {{ $row->departement ? 'badge-success' : 'badge-danger'}}">{{ $row->section }}</span></td>
                        <td>{{ $row->created_at->format('H:i') }} Wita</td>
                        <td>{{ $row->remark }}</td>
                        <td><span class="badge {{ $row->departement ? 'badge-success' : 'badge-danger'}}">{{ $row->departement ? $row->departement : 'Belum Validasi'}}</span></td>
                        <!-- <td>{{ $row->hrd }}</td> -->
                        <td class="text-center col-lg-2 mt-2">
                          @can('admin_guest')
                          @if($row->departement)
                          <button type="button" value="{{ $row->id }}" class="btn btn-sm btn-warning" id="hrd-validated" disabled><i class="fa fa-check" aria-hidden="true"></i></button>
                          @else
                          <button type="button" value="{{ $row->id }}" class="btn btn-sm btn-warning" id="hrd-validated"><i class="fa fa-check" aria-hidden="true"></i></button>
                          @endif
                          @endcan
                          @can('admin_staff_security')
                          @if($row->departement === NULL)
                          <button type="button" value="{{ $row->id }}" class="btn btn-sm btn-info" id="detail" disabled><i class="fa fa-info-circle" aria-hidden="true"></i></button>
                          @else
                          <button type="button" value="{{ $row->id }}" class="btn btn-sm btn-info" id="detail"><i class="fa fa-info-circle" aria-hidden="true"></i></button>
                          @endif

                          @if($row->security === NULL)
                           <button type="button" value="{{ $row->id }}" class="btn btn-sm btn-success" id="checkIn" disabled><i class="fas fa-door-open" aria-hidden="true"></i></button>
                           @elseif($row->status == "Masuk")

                           @else
                           <button type="button" value="{{ $row->id }}" class="btn btn-sm btn-success" id="checkIn"><i class="fas fa-door-open" aria-hidden="true"></i></button>
                         @endif
                        @can('admin_delete')
                        <button type="button" value="{{ $row->id }}" class="btn btn-sm btn-danger text-center" id="deletePermission"><i class="fa fa-trash"></i></button>
                        @endcan
                        </td>
                        @endcan
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
        @include('permission._checkInEmployee')
        @include('permission._detailUpdate')
        @include('permission._detailModalPermission')
        @endsection
@section('script')

<script>

  setTimeout(()=>{
    $('.alert-dismissible').fadeOut();
  },3000);
</script>
  @include('permission._scriptDetail')

@endsection
