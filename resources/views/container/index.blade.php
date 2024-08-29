@extends('header.header')
@section('content')
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Container Tables</h1>
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
                  <h6 class="m-0 font-weight-bold text-primary">Kontainer Masuk </h6>
                  @can('admin_staff')
                  <a href="/containerExport" class="btn btn-success mb1"><i class="far fa-file-excel"> Excel</i></a>
                  @endcan
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush" id="TableRefresh">
                    <thead class="thead-light">
                      <tr>
                        <th>#</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Security</th>
                        <th>Company/Instance</th>
                        <th>No. Container</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($containers as $container)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $container->created_at->format('l, d M Y') }}</td>
                        <td>{{ $container->created_at->format('H:i') }} Wita</td>
                        <td>{{ $container->security }}</td>
                        <td>{{ $container->company }}</td>
                        <td class="text-center">{{ $container->no_container }}</td>
                        <td class="text-center col-lg-2 mt-2">
                            <button type="button" value="{{ $container->id }}" class="btn btn-sm btn-warning detail_container"><i class="fa fa-info-circle" aria-hidden="true"></i></button>
                            <button type="button" value="{{ $container->id }}" class="btn btn-sm btn-success edit_container"><i class="fa fa-check-square" aria-hidden="true"></i></button>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
          </div>
          @include('container._editModalContainer')
          @include('container._detailModalContainer')
          <!--Row-->

@endsection

@section('script')
<script>
   $('.touchSpin2').TouchSpin({
                    min: -100,
                    max: 100,                
                    boostat: 5,
                    postfix: '°C',
                    maxboostedstep: 10,        
                    initval: 0
                });
  //detail-Container-Ajax
    $(document).ready(function(){
                $(document).on('click', '.detail_container', function(e){
                e.preventDefault();
                var container_id = $(this).val();
                $('#detailModalContainer').modal('show');
                $.ajax({
                    type: "GET",
                    url: "/kontainer/"+container_id,
                    success: function(response){
                        console.log(response);
                        $('#id_container').val(container_id);
                        $('.title').text('Detail Container '+response.containers.company);
                        $('#image_container').attr("src", "storage/public/"+response.containers.photo);
                        $('#driver').text('Driver : '+response.containers.driver);
                        $('#police').text('No. Police/No. Plat: '+response.containers.police);
                        $('#no_container').text('No. Container : '+response.containers.no_container);
                        $('#no_seal').text('No. Seal : '+response.containers.no_seal);
                        $('#type_container').text('Type Container : '+response.containers.type_container);
                        $('#position').text('Position : '+response.containers.position);
                        $('#volume').text('Volume : '+response.containers.volume);
                        $('#destination').text('Destination : '+response.containers.destination);
                        $('#before_temperature').text('Before In Temperature : '+response.containers.before_temperature+' °C');
                    }
                });
                });

                //edit-container-ajax
              $(document).on('click', '.edit_container', function(e){
                  e.preventDefault();
                  let container_id = $(this).val();
                  $('#editModalContainer').modal('show');
                        $.ajax({
                            type: "GET",
                            url: `kontainer/${container_id}/edit`,
                            success : function(response) {
                              $('#noSealUpdate').val(response.containers.no_seal)
                              $('#id_container').val(container_id);
                              $('#status_container').val('Keluar');
                              $('#warning').text(`Are you sure you want to Check Out ${response.containers.company}  ?`)
                            }
                        });
              });

              //update ajax
        $(document).on('click', '#updateDataContainer', function(e){
          e.preventDefault();
          // console.log('test');
        let id_container = $('#id_container').val();
        let data = {
          'status_container' : $('#status_container').val(),
          'after_temperature' : $('#after_temperature').val(),
          'no_seal' : $('#noSealUpdate').val(),
        }
                  $.ajaxSetup({
              headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
          });
          $.ajax({
              type: "PUT",
              url: "/kontainer/"+id_container,
              data: data,
              dataType: 'json',
              success: function(response){
                // console.log(response);
              $('.errList').html("");
              $('#success-message').html("");
              $('#success_message').append("<div class='alert alert-success alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>"+response.message+"</div>")
              $('#editModalContainer').modal('hide');
              $('#TableRefresh').load(" #TableRefresh" );
            }
          });

    });
   });
</script>
@endsection