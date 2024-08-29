@extends('header.header')
@section('content')
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Input Data Mutasi</h1>
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
                  <h6 class="m-0 font-weight-bold text-primary">Tambah Data Mutasi masuk</h6>
                </div>
                <div class="card-body">
                <form action="/mutasi" method="post">
                    @csrf
                    <div class="form-group">
                      <label for="security">Security </label><code class="highlighter-rouge"> *</code>
                      <input type="text" class="form-control" name="security" id="" value="{{ auth()->user()->name }}" readonly>
                  </div>
                      <div class="form-group">
                        <label for="type_mutasi">Jenis Mutasi </label><code class="highlighter-rouge"> *</code>
                        <select class="form-control @error('type_mutasi') is-invalid @enderror" name="type_mutasi" >
                          @if(old('type_mutasi'))
                          <option value="{{old('type_mutasi')}}">{{old('type_mutasi')}}</option>
                          <option value="Masuk Barang" >Barang Masuk</option>
                          <option value="Masuk" >Supplier Ikan Masuk</option>
                          <option value="Keluar" >Barang Keluar</option>
                          @else
                        {{-- <option selected>-- Silahkan Pilih Jenis Mutasi --</option> --}}
                          <option value="Masuk Barang" >Barang Masuk</option>
                          <option value="Masuk" >Supplier Ikan Masuk</option>
                          <option value="Keluar" >Barang Keluar</option>
                          @endif
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="supplier_name">Nama Supplier/Penerima</label><code class="highlighter-rouge"> *</code>
                        <select class="select2-single-placeholder form-control " name="supplier_name" id="supplierName" onchange="autoFill()">
                      <option value="">Select</option>
                          @foreach($suppliers as $row)
                          <option value="{{ $row->name }}">{{ $row->name }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="from">Asal </label><code class="highlighter-rouge"> * Auto fill</code>
                        <input type="text" class="form-control @error('from') is-invalid @enderror" name="from" id="from" readonly>
                          @error('from')
                          <div class="invalid-feedback">
                         {{ $message }}
                        </div>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="supplier">Jenis Supplier </label><code class="highlighter-rouge"> * Auto fill</code>
                        <input type="text" class="form-control @error('supplier') is-invalid @enderror" name="supplier" id="supplier" autocomplete="off" readonly>
                          @error('supplier')
                          <div class="invalid-feedback">
                         {{ $message }}
                        </div>
                        @enderror
                      </div>
                    <div class="form-group">
                      <label for="driver">Driver </label><code class="highlighter-rouge"> *</code>
                      <input type="text" class="form-control @error('driver') is-invalid @enderror" name="driver" id="" autocomplete="off" value="{{ old('driver') }}" placeholder="Masukkan Nama Driver..">
                        @error('driver')
                        <div class="invalid-feedback">
                       {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="police">No. Polisi</label>
                      <input type="text" class="form-control " name="police" id="" autocomplete="off" value="{{ old('police') }}" placeholder="Masukkan No Plat Kendaraan Jika ada..">
                      @error('police')
                        <div class="invalid-feedback">
                       {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                    <label for="total_items">Jumlah Items</label><code class="highlighter-rouge"> *</code>
                    <input id="touchSpin1" type="number" name="total_items" class="form-control @error('total_items') is-invalid @enderror" autocomplete="off" value="{{ old('total_items') }}">
                        @error('total_items')
                        <div class="invalid-feedback">
                       {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                        <label for="unit">Jumlah Satuan</label>
                        <select class="select2-single form-control " name="unit" id="" >
                          <option value="Kg">Kilo Gram(Kg)</option>
                          <option value="Boks">Box(Boks)</option>
                          <option value="Mobil">mobil</option>
                          <option value="Galon">Galon</option>
                          <option value="Liter">Liter</option>
                          <option value="Colly">Colly</option>
                          <option value="Gas">Gas</option>
                          <option value="Tabung">Tabung</option>
                          <option value="Gabus">Gabus</option>
                          <option value="Pcs">Pcs</option>
                          <option value="Drum">Drum</option>
                          <option value="Pail">Pail</option>
                          <option value="Ekor">Ekor</option>
                          <option value="Roll">Roll</option>
                          <option value="Botol">Botol</option>
                          <option value="Bal">Bal</option>
                          <option value="Balok">Balok</option>
                          <option value="Lembar">Lembar</option>
                        </select>
                      </div>
                    <div class="form-group">
                      <label for="travel_permit">Surat Jalan/Nota</label><code class="highlighter-rouge"> *</code>
                      <input type="text" class="form-control @error('travel_permit') is-invalid @enderror" name="travel_permit" id="" autocomplete="off" value="{{ old('travel_permit') }}" placeholder="Masukkan Surat Jalan..">
                        @error('travel_permit')
                        <div class="invalid-feedback">
                       {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="remark">Keterangan </label>
                      <textarea class="form-control @error('remark') is-invalid @enderror" name="remark" id="exampleFormControlTextarea1" rows="3" value="{{ old('remark') }}" placeholder="Masukkan Keterangan jika ada.."></textarea>
                        @error('remark')
                        <div class="invalid-feedback">
                       {{ $message }}
                      </div>
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
@endsection
@section('script')
<script>
  function autoFill(){
    var suppliers = $("#supplierName").val();
    $.ajax({
      url: '/test/'+suppliers,
      success: function(response){
          $('#from').val(response.supplier.from);
          $('#supplier').val(response.supplier.supplier);
          console.log(response);
      }
    });
  }
</script>
@endsection
