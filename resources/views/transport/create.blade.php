@extends('header.header')
@section('content')
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Input Data Transportasi</h1>
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
                  <h6 class="m-0 font-weight-bold text-primary">Tambah Data Pemakaian Transportasi</h6>
                </div>
                <div class="card-body">
                <form action="/kendaraan" method="post">
                    @csrf
                    <div class="form-group">
                      <label for="security">Security </label><code class="highlighter-rouge"> *</code> 
                      <input type="text" class="form-control @error('security') is-invalid @enderror" name="security" id="" value="{{ auth()->user()->name }}" readonly>
                      @error('security')
                          <div class="invalid-feedback">
                         {{ $message }}
                        </div>
                        @enderror
                      </div>
                    <div class="form-group">
                        <label for="transport">Jenis Kendaraan</label>
                        <select class="form-control text-center" name="transport" >
                          @if(old('transport'))
                          <option value="{{old('transport')}}">{{old('transport')}}</option>
                          <option value="suzuki DD8514UZ">Mobil Suzuki</option>
                          <option value="Traga DD8278IC">Mobil Traga Isuzu</option>
                          <option value="panther DD8672DA">Mobil Panther</option>
                          <option value="hilux DD8582OY">Mobil Hilux</option>
                          <option value="expander DD1932SP">Mobil Expander</option>
                          <option value="beat DD6369KJ">Motor Honda Beat</option>
                          @else
                        <option value="n/a" selected>-- Please Choice Type transportation --</option>
                          <option value="avanza DD1387IK">Mobil Avanza</option>
                          <option value="suzuki DD8514UZ">Mobil Suzuki</option>
                          <option value="Traga DD8278IC">Mobil Traga Isuzu</option>
                          <option value="panther DD8672DA">Mobil Panther</option>
                          <option value="hilux DD8582OY">Mobil Hilux</option>
                          <option value="expander DD1932SP">Mobil Expander</option>
                          <option value="beat DD6369KJ">Motor Honda Beat</option>
                          @endif
                        </select>
                      </div>
                    <div class="form-group">
                      <label for="name">Pengguna</label><code class="highlighter-rouge"> *</code> 
                      <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="" value="{{ old('name') }}" autofocus>
                      @error('name')
                          <div class="invalid-feedback">
                         {{ $message }}
                        </div>
                        @enderror
                  </div>
                    <div class="form-group">
                      <label for="driver">Driver </label><code class="highlighter-rouge"> *</code> 
                      <input type="text" class="form-control @error('driver') is-invalid @enderror" name="driver" id="" value="{{ old('driver') }}" >
                      @error('driver')
                          <div class="invalid-feedback">
                         {{ $message }}
                        </div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="condition">Kondisi Kendaraan</label>
                        <select class="form-control text-center" name="condition" >
                        <option value="pass" selected>Pass/Baik</option>
                          <option value="fail">Fail/Tidak Baik</option>
                        </select>
                      </div>
                      <div class="form-group">
                      <label for="destination">Tujuan</label><code class="highlighter-rouge"> *</code> 
                      <textarea name="destination" class="form-control @error('destination') is-invalid @enderror" id="destination" rows="3" value="old('destination')"></textarea>
                      @error('destination')
                      <code class="highlighter-rouge">
                      {{ $message }}
                      </code>
                      @enderror
                    </div>
                    <input type="hidden" class="form-control" name="status" id="" value="Keluar" >
                    <div class="form-group">
                      <label for="before_speedometer">Speedometer</label><code class="highlighter-rouge"> *</code></label>
                      <input id="touchSpin2" type="text" name="before_speedometer" class="form-control">
                      @error('before_speedometer')
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
          @section('script')
          <script>
          $('#touchSpin2').TouchSpin({
            min: 0,
        max: 99999999999,                
        boostat: 5,
        postfix: 'Km/h',
        maxboostedstep: 10,        
        initval: 0
      });
      </script>
          @endsection
@endsection

