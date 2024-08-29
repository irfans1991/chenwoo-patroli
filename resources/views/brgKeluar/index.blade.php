@extends('header.header')
@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Product Keluar</h1>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="./">Home</a></li>
                  <li class="breadcrumb-item"><a href="./">Product</a></li>
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
                  <div class="card" id="refresh-form">
                    <div class="card-header py-3 d-flex flex-row align-items-center">
                      <h6 class="m-0 font-weight-bold text-primary mr-auto p-1">Product Keluar</h6>
                      <a href="javascript:void(0);" class="btn btn-primary mb-1 p-1 mr-2" id="ModalBarangKeluar"><i class="fa fa-plus"> &nbsp;Nota</i></a>
                      <a href="/productOutExport" class="btn btn-success mb-1 p-1"><i class="far fa-file-excel"> Excel</i></a>
                    </div>
                    <div class="card-body">
                      <form action="/stored/create" method="post">
                        @csrf
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                                <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName">No. Nota :</label><code class="highlighter-rouge"> *</code>
                                <select name="" class="form-control @error('id_phone') is-invalid @enderror" id="notaId" placeholder="Enter your ID" onkeyup="autoFill()" value="" autofocus>
                                <option selected disabled value> --please choose nota--</option>
                                @foreach ($nota as $row )
                                <option value="{{ $row->id }}">{{ $row->nota }} / {{ $row->pembeli }}</option>
                                {{-- <option value="{{ $row->id }}" {!! ($row->disetujui !== Null) ? 'hidden' : '' !!}>{{ $row->nota }} / {{ $row->pembeli }}</option> --}}
                                @endforeach
                              </select>
                                @error('id_phone')
                              <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                            @enderror
                              </div>
                            <!-- Form Group (last name)-->
                            <div class="col-md-6">
                                  <label for="total_items" class="small mb-1">Jumlah Items</label><code class="highlighter-rouge"> *</code>
                                  <input type="text" name="total_items" class="form-control @error('total_items') is-invalid @enderror totalItems" autocomplete="off" value="{{ old('total_items') }}">
                                      @error('total_items')
                                      <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                    @enderror
                            </div>
                            </div>
                        <div class="row gx-3 mb-3">
                        <div class="col-md-6">
                          <label for="uraian" class=" small mb-1">Jenis Product</label><code class="highlighter-rouge"> *</code>
                          <select name="" class="form-control @error('id_phone') is-invalid @enderror" id="jenisItem" placeholder="Enter your ID">
                              @foreach($dataJenisBarang as $row)
                              <option value="{{ $row->id }}">{{ $row->jenisBarang }}</option>
                              @endforeach
                          </select>
                        </div>
                        <div class="col-md-6">
                        <label class="small mb-1" for="inputFirstName">Satuan :</label><code class="highlighter-rouge"> *</code>
                            <select name="satuan" class="form-control @error('satuan') is-invalid @enderror" id="unit" placeholder="Enter your ID" >
                                  <option selected disabled value> --please choose Unit--</option>
                                  <option value="Kg">Kilogram</option>
                                  <option value="Pcs">Pcs</option>
                                  <option value="Bks">Bks</option>
                                  <option value="Keranjang">Keranjang</option>
                              </select>
                            </div>
                            @error('smartphone')
                              <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <button type="submit" id="saveDataBarang" class="btn btn-primary">Tambah</button>
                      </form>
                     </div>
               </div>
  </div>
                 <div class="col-lg-12 mb-4">
                  <div class="card">
                    <div class="card-header d-flex flex-row align-items-center">
                      <h6 class="m-0 font-weight-bold text-primary mr-auto p-1">Data Produk</h6>
                    </div>
                    <div class="card-body">
                    <div class="table-responsive">
                  <table class="table align-items-center table-flush" id="TableRefresh">
                    <thead class="thead-light">
                      <tr>
                        <th>#</th>
                        <th>No. Nota</th>
                        <th>Product</th>
                        <th>Jumlah Item</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($dataBrg as $row)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->notaBarang->nota }}</td>
                        <td>{{ $row->product->jenisBarang }}</td>
                        <td class="text-center">{{ $row->qty }}{{ $row->unit }}</td>
                        <td class="text-center col-lg-2 mt-2">
                            <button type="button" value="{{ $row->id }}" class="btn btn-sm btn-danger deleteHasil"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <div class="d-flex justify-content-center">
                  {{ $dataBrg->links() }}
                </div>
                  </div>
                </div>
  </div>
</div>
    @include('brgKeluar._createDataNota')
@endsection
@section('script')
@include('brgKeluar._script')
@endsection
