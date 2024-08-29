@extends('header.header')
@section('content')
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Mutasi Tables</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ $page }}</li>
            </ol>
          </div>
          <div class="d-flex flex-row-reverse"  id="success_message">

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
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Mutasi Masuk </h6>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush" id="TableRefresh">
                    <thead class="thead-light">
                      <tr>
                        <th>#</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Security</th>
                        <th>Jenis Mutasi</th>
                        <th>Nama Supplier</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($mutasis as $mutasi)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $mutasi->created_at->format('l, d M Y') }}</td>
                        <td>{{ $mutasi->created_at->format('H:i') }} Wita</td>
                        <td>{{ $mutasi->security }}</td>
                        <td>{{ $mutasi->type_mutasi }}</td>
                        <td class="text-center">{{ $mutasi->supplier_name }}</td>
                        <td><button type="button" value="{{ $mutasi->id }}" class="btn btn-sm btn-success edit_mutasi"><i class="fa fa-check" aria-hidden="true"></button></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
          </div>
          @include('mutasiMasuk._editModalMutasi')
          <!--Row-->

@endsection
@section('script')
<script>
            $(document).ready(function(){
            $(document).on('click', '.edit_mutasi', function(e){
            e.preventDefault();
            $('#type_mutasi').val('in')
            var mutasi_id = $(this).val();
              $('#checkOutMutasi').modal('show');
              $.ajax({
                  type: "GET",
                  url: "/mutasi/edit/"+mutasi_id,
                  success: function(response){
                    console.log(response);
                      $('#id_mutasi').val(mutasi_id);
                      $('.title').text('Mutasi Keluar '+response.mutasis.type_mutasi);
                      $('#warning').text('Are you sure you want to Check Out '  +response.mutasis.type_mutasi+ ' ?');
                  }
              });
          });

          //update ajax
        $(document).on('click', '#updateDataMutasi', function(e){
          e.preventDefault();
          // console.log('test');
        let id_mutasi = $('#id_mutasi').val();
        let data = {
          'type_mutasi' : $('#type_mutasi').val(),
        }
                  $.ajaxSetup({
              headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
          });
          $.ajax({
              type: "PUT",
              url: "/mutasi/update/"+id_mutasi,
              data: data,
              dataType: 'json',
              success: function(response){
                // console.log(response);
              $('.errList').html("");
              $('#success-message').html("");
              $('#success_message').append("<div class='alert alert-success alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>"+response.message+"</div>")
              $('#checkOutMutasi').modal('hide');
              $('#TableRefresh').load(" #TableRefresh" );
            }
          });

    });
            });


</script>
@endsection
