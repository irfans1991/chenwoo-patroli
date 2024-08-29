@extends('header.header')
@section('content')
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Input Data Document</h1>
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
                  <h6 class="m-0 font-weight-bold text-primary">Tambah Data Document Masuk</h6>
                </div>
                <div class="card-body">
                <form action="/dokumen" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="security">Security </label><code class="highlighter-rouge"> *</code> 
                      <input type="text" class="form-control" name="security" id="" value="{{ auth()->user()->name }}" readonly>
                  </div>
                    <div class="form-group">
                      <label for="company">Perusahaan/Instansi</label><code class="highlighter-rouge"> *</code> 
                      <input type="text" class="form-control @error('company') is-invalid @enderror" name="company" id="" value="{{ old('company') }}" autofocus>
                      @error('company')
                          <div class="invalid-feedback">
                         {{ $message }}
                        </div>
                        @enderror
                      </div>
                    <div class="form-group">
                      <label for="address">Alamat </label><code class="highlighter-rouge"> *</code> 
                      <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="" value="{{ old('address') }}" >
                      @error('address')
                          <div class="invalid-feedback">
                         {{ $message }}
                        </div>
                        @enderror
                      </div>
                  <div class="form-group">
                      <label for="sender">Pengirim </label><code class="highlighter-rouge"> *</code> 
                      <input type="text" class="form-control @error('sender') is-invalid @enderror" name="sender" id="" value="{{ old('sender') }}" >
                      @error('sender')
                          <div class="invalid-feedback">
                         {{ $message }}
                        </div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="guest">Jenis Document</label>
                        <select class="form-control" name="document_type" id="" required>
                          <option value="document" selected>Document</option>
                          <option value="surat">Surat</option>
                          <option value="paket">Paket</option>
                          <option value="invoice">Invoice</option>
                        </select>
                      </div>
                  <div class="form-group">
                      <label for="receicer">Penerima </label><code class="highlighter-rouge"> *</code> 
                      <input type="text" class="text-left form-control @error('receiver') is-invalid @enderror" name="receiver" id="" value="{{ old('receiver') }}" >
                      @error('receiver')
                          <div class="invalid-feedback">
                         {{ $message }}
                        </div>
                        @enderror
                  </div>
                    <input type="hidden" class="form-control" name="status" id="" value="Masuk" >
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
          </div>
@endsection

