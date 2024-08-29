<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="{{asset('img/logo/logo-cwf.png')}}" rel="icon">
  <title> {{ $title }} </title>
  <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('vendor/bootstrap-touchspin/css/jquery.bootstrap-touchspin.css')}}" rel="stylesheet" >
  <link href="{{asset('vendor/select2/dist/css/select2.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{asset('vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet" >
  <link href="{{asset('vendor/clock-picker/clockpicker.css')}}" rel="stylesheet">
  <link href="{{asset('css/ruang-admin.min.css')}}" rel="stylesheet">
  <link href="{{asset('css/profile.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
</head>
<body id="page-top">
    <div class="container-fluid mt-5" id="container-wrapper">
        <div class="card">
                <div class="card-header py-6 d-flex flex-column align-items-left">
                  <div class="d-flex flex-row">
                  <h6 class="m-0 font-weight-bold text-black flex-grow-1">NOTA PENJUALAN</h6>
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
                          <td>{{ $dataNota->disetujui ? $dataNota->disetujui : 'Belum Disetujui'  }}</td>
                          <td>{{ $dataNota->pembuat }}</td>
                        </tr>
                  </table>
                </div>
            </div>
      </div>
  
</script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js"></script>
  <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
  <script src="{{asset('js/chek.js')}}"></script>
  <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap2.bundle.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/jquery2.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('js/ruang-admin.min.js')}}"></script>
  <script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script>
  <script src="{{asset('js/demo/chart-area-demo.js')}}"></script>  
  <script src="{{ asset('vendor/bootstrap-touchspin/js/jquery.bootstrap-touchspin.js') }}"></script>
  <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('vendor/select2/dist/js/select2.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
  <script src="{{ asset('vendor/clock-picker/clockpicker.js') }}"></script>


  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script>
  </script>
</body>

</html>
