@extends('header.header')
@section('content')
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Input Data Kontainer</h1>
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
          <h6 class="m-0 font-weight-bold text-primary">Tambah Data Kontainer Masuk</h6>
        </div>
        <div class="card-body">
          <form action="/kontainer" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="security">Security </label><code class="highlighter-rouge"> *</code>
              <input type="text" class="form-control" name="security" id="" value="{{ auth()->user()->name }}" readonly>
            </div>
            <div class="form-group">
              <label for="driver">Driver </label><code class="highlighter-rouge"> *</code>
              <input type="text" class="form-control @error('driver') is-invalid @enderror" name="driver" id="" value="" autofocus>
              @error('driver')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="police">No. Polisi/ No. Plat </label><code class="highlighter-rouge"> *</code>
              <input type="text" class="form-control @error('police') is-invalid @enderror" name="police" id="" value="">
              @error('police')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <input type="hidden" class="form-control" name="status_container" id="" value="Masuk">
            <div class="form-group">
              <label for="company">Perusahaan/Instansi </label><code class="highlighter-rouge"> *</code>
              <input type="text" class="form-control @error('company') is-invalid @enderror" name="company" id="" value="">
              @error('company')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="no_container">No. Container</label><code class="highlighter-rouge"> *</code>
              <input type="text" class="text-right form-control @error('no_container') is-invalid @enderror" name="no_container" id="" value="">
              @error('no_container')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="no_seal">No. Seal</label><code class="highlighter-rouge"> (jika tidak ada abaikan) *</code>
              <input type="text" class="text-right form-control @error('no_seal') is-invalid @enderror" name="no_seal" id="" value="Belum Ada">
              @error('no_seal')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="row d-flex justify-content-between mb-3">
              <fieldset class="form-group mx-2">
                <div class="row">
                  <legend class="col-form-label col-sm-6 pt-0">Tipe :</legend>
                  <div class="col-sm-9">
                    <div class="custom-control custom-radio">
                      <input type="radio" id="type_conteiner" name="type_container" class="custom-control-input" value="20 feet" checked>
                      <label class="custom-control-label" for="type_conteiner">20 Feet</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input type="radio" id="type_container" name="type_container" class="custom-control-input" value="40 feet">
                      <label class="custom-control-label" for="type_container">40 Feet</label>
                    </div>
                  </div>
                </div>
              </fieldset>
              <fieldset class="form-group ">
                <div class="row">
                  <legend class="col-form-label col-sm-8 pt-0">Tujuan:</legend>
                  <div class="col-sm-9">
                    <div class="custom-control custom-radio">
                      <input type="radio" id="destination" name="destination" class="custom-control-input" value="local" checked>
                      <label class="custom-control-label" for="destination">Local</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input type="radio" id="destinations" name="destination" class="custom-control-input" value="export">
                      <label class="custom-control-label" for="destinations">Export</label>
                    </div>
                  </div>
                </div>
              </fieldset>
              <fieldset class="form-group ">
                <div class="row">
                  <legend class="col-form-label col-sm-8 pt-0">Volume :</legend>
                  <div class="col-sm-9">
                    <div class="custom-control custom-radio">
                      <input type="radio" id="yes" name="volume" class="custom-control-input" value="yes" checked>
                      <label class="custom-control-label" for="yes">Yes</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input type="radio" id="no" name="volume" class="custom-control-input" value="no">
                      <label class="custom-control-label" for="no">No</label>
                    </div>
                  </div>
                </div>
              </fieldset>
            </div>
            <div class="form-group">
              <label for="position">Lokasi Container</label>
              <select class="form-control text-center" name="position">
                <option selected>-- Silahakan Pilih Posisi Kontainer --</option>
                <option value="plan 1">Plan 1</option>
                <option value="plan 2">Plan 2</option>
              </select>
            </div>
            <div class="form-group">
              <label for="before_temperature">suhu(datang) °C </label><code class="highlighter-rouge"> *</code></label>
              <input id="touchSpin2" type="text" name="before_temperature" class="form-control">
            </div>
            <div class="form-group">
              <label for="position">Upload File</label><code class="highlighter-rouge"> *</code></label>
              <div class="custom-file">
                <input type="file" name="photo" class="custom-file-input form-control @error('photo') is-invalid @enderror" id="customFile">
                <label class="custom-file-label" for="customFile">Upload Surat Jalan</label>
              </div>
              @error('photo')
              <code class="highlighter-rouge">
                {{ $message }}
              </code>
              @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
        <div class="card-footer"></div>
      </div>
    </div>
  </div>
  <!--Row-->
  @section('script')
  <script>
    $('#touchSpin2').TouchSpin({
      min: -100,
      max: 100,
      boostat: 5,
      postfix: '°C',
      maxboostedstep: 10,
      initval: 0
    });
  </script>
  @endsection
  @endsection
