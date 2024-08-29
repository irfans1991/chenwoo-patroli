@extends('header.header')
@section('content')
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Input Data Izin Karyawan</h1>
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
                  <h6 class="m-0 font-weight-bold text-primary">Tambah Data Izin Karyawan</h6>
                </div>
                <div class="card-body">
                <form action="/permission" method="post" enctype="multipart/form-data">
                    @csrf
                    <fieldset class="form-group">
                      <div class="row">
                        <legend class="col-form-label col-sm-3 pt-0">Keperluan : </legend>
                        <div class="col-sm-9">
                          <div class="custom-control custom-radio">
                            <input type="radio" id="needs" name="needs" class="custom-control-input" value="keperluan pribadi" checked>
                            <label class="custom-control-label" for="needs">Keperluan Pribadi</label>
                          </div>
                          <div class="custom-control custom-radio">
                            <input type="radio" id="need" name="needs" class="custom-control-input" value="keperluan kantor">
                            <label class="custom-control-label" for="need">Keperluan Kantor</label>
                          </div>
                        </div>
                      </div>
                    </fieldset>
                    <div class="form-group">
                      <label for="name">Nama Karyawan </label><code class="highlighter-rouge"> *</code> 
                      <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="" value="{{ old('name') }}" autofocus>
                      @error('name')
                          <div class="invalid-feedback">
                         {{ $message }}
                        </div>
                        @enderror
                  </div>
                  <div class="form-group">
                        <label for="section">Bagian</label>
                        <select class="form-control text-center" name="section" >
                        <option selected disabled value>-- Please Choice Section --</option>
                          <option value="Produksi">Produksi</option>
                          <option value="HRD">HRD</option>
                          <option value="IT Support">IT SUPPORT</option>
                          <option value="Teknisi">Teknisi</option>
                          <option value="Gudang">Gudang</option>
                          <option value="Accounting">Accounting</option>
                          <option value="Quality Control">Quality Control</option>
                          <option value="Koperasi">Koperasi</option>
                          <option value="Driver">Driver</option>
                          <option value="General Affair">General Affair</option>
                          <option value="Internal Control">Internal Control</option>
                          <option value="Lab">Laboratorium</option>
                          <option value="Laundry">Laundry</option>
                          <option value="Cleaning Service">Cleaning Service</option>
                          <option value="Security">Security</option>
                          <option value="Purchasing">Purchasing</option>
                        </select>
                      </div>
                      <div class="form-group">
                      <label for="hrd">Diketahui :</label><code class="highlighter-rouge"> *</code> 
                      <input type="text" class="form-control @error('hrd') is-invalid @enderror" name="hrd" id="" value="{{ auth()->user()->name }}" readonly>
                      @error('hrd')
                          <div class="invalid-feedback">
                         {{ $message }}
                        </div>
                        @enderror
                  </div>
                      <div class="form-group">
                      <label for="remark">Keterangan</label><code class="highlighter-rouge"> *</code> 
                      <textarea name="remark" class="form-control @error('remark') is-invalid @enderror" id="remark" rows="3"></textarea>
                      @error('remark')
                      <code class="highlighter-rouge">
                      {{ $message }}
                      </code>
                      @enderror
                    </div>
                    <input type="hidden" class="form-control" name="status" id="" value="Keluar" >
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
          </div>
@endsection

