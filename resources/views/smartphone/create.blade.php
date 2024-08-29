@extends('header.header')
@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Input Data Smartphone</h1>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="./">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{ $page }}</li>
                </ol>
              </div>
              <div class="d-flex flex-row-reverse"  id="success_message">
          
          </div>
                <!-- Alert -->
                @if(session()->has('success'))
              <div class="d-flex flex-row-reverse">
                <div class="alert alert-success alert-dismissible stored-disable" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                {{ session('success') }}
                </div>
              </div>
              @endif
                <!-- alert -->
              <div class="row">
              <div class="col-lg-3 mb-4">
            </div>
                <div class="col-lg-12 mb-4">
                  <!-- Simple Tables -->
                  <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                      <h6 class="m-0 font-weight-bold text-primary">Tambah Data Pengguna Smartphone</h6>
                      @can('admin_staff')
                      <a href="/storedExport" class="btn btn-success mb-1 bd-highlight"><i class="far fa-file-excel"> Excel</i></a>
                      @endcan
                    </div>
                    <div class="card-body">
                      <form action="/stored/create" method="post">
                        @csrf
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                                <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName">ID Smartphone :</label>
                                <input name="" class="form-control @error('id_phone') is-invalid @enderror" id="id_phone" type="text" placeholder="Enter your ID" onkeyup="autoFill()" value="" autofocus>
                                <input name="id_phone" class="form-control " id="id_phones" type="hidden" >
                                @error('id_phone')
                              <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                            @enderror
                              </div>
                            <!-- Form Group (last name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName">Your Name :</label>
                                <input name="name" class="form-control @error('name') is-invalid @enderror" id="name" type="text" placeholder="Enter your Full Name" value="" readonly>
                                @error('name')
                              <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                            @enderror
                              </div>
                        </div>
                        <div class="row gx-3 mb-3">
                        <div class="col-md-6">
                          <label for="section" class=" small mb-1">Section :</label>
                          <input  name="section" class="form-control @error('section') is-invalid @enderror" id="section" type="text" placeholder="Enter your Full Name" value="" readonly>
                        </div>
                        <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName">Smartphone Type :</label>
                                <input name="smartphone" class="form-control @error('smartphone') is-invalid @enderror" id="smartphone" type="text" placeholder="Enter Your Smartphone Type" value="" readonly>
                            </div>
                            @error('smartphone')
                              <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="row gx-3 mb-3">
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLastName">Number Phone :</label>
                                    <input name="number" class="form-control @error('number') is-invalid @enderror" id="number" type="number" placeholder="Enter Your Number Phone" value="" readonly>
                                </div>
                                @error('number')
                              <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <input name="status"  id="status" type="hidden" value="store">
                        <button type="submit" class="btn btn-primary">Stored</button>
                      </form>
                      <hr>
                      <table class="table align-items-center table-flush mt-4" id="TableRefresh">
                                        <thead class="thead-light">
                                          <tr>
                                            <th>#</th>
                                            <th>Verification Number</th>
                                            <th>Nama</th>
                                            <th>Bagian</th>
                                            <th>Jenis HP</th>
                                            <!-- <th>No. HP</th> -->
                                            <th>Status</th>
                                            <th class="text-center">Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          @forelse($stored as $row)
                                          <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $row->id_phone }}</td>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->section }}</td>
                                            <td>{{ $row->smartphone }}</td>
                                            <!-- <td>{{ $row->number }}</td> -->
                                            @if($row->status === "store" )
                                            <td><span class="badge badge-warning">{{ $row->status }}</span></td>
                                            @else
                                            <td><span class="badge badge-success">{{ $row->status }}</span></td>
                                            @endif
                                            <td>
                                            <button class="btn btn-sm btn-warning" id="checkOutPhone" value="{{$row->id}}"><i class="fa fa-edit"></i></button>
                                              <form action="/stored/{{ $row->id }}" method="post" class="d-inline" >
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-sm btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                              </form>
                                            </td>
                                            @empty
                                            <tbody class="text-center">
                                            <tr class="odd">
                                            <td valign="top" colspan="5" class="dataTables_empty">No data available in table</td>
                                            </tr>
                                            </tbody>
                                          </tr>
                                          @endforelse
                                        </tbody>
                                      </table>

                    </div>
                    <div class="card-footer"></div>
                  </div>
  </div>
</div>
@endsection
@include('smartphone._checkOut')

@section('script')
@include('smartphone._script')
<script>
  setInterval(() => {
        $('.stored-disable').fadeOut()
      }, 3000);
</script>

@endsection