@extends('header.header')
@section('content')
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Document</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./dashboard">Home</a></li>
              <li class="breadcrumb-item">Document</li>
              <li class="breadcrumb-item active" aria-current="page">{{$page}}</li>
            </ol>
          </div>
          <div class="d-flex flex-row-reverse"  id="success_message">
          
          </div>
            <!-- Row -->
          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center bd-highlight">
                  <h6 class="m-0 font-weight-bold text-primary flex-grow-1 bd-highlight">Data Supplier</h6>
                  <a href="/dokumen/create" class="btn btn-primary mb-1 mr-2"><i class="fa fa-plus"> &nbsp Tambah Dokumen</i></a>
                  @can('admin_staff')
                  <a href="/DocumentExport" class="btn btn-success mb-1 bd-highlight"><i class="far fa-file-excel"> Excel</i></a>
                  @endcan
                </div>
                <div class="table-responsive p-3">
                  <table class="table aligsn-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                      <th>#</th>
                        <th>Tanggal</th>
                        <th>Security</th>
                        <th>Receiver</th>
                        <th>Pengirim</th>
                        <th class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>#</th>
                        <th>Tanggal</th>
                        <th>Security</th>
                        <th>Receiver</th>
                        <th>Pengirim</th>
                        <th class="text-center">Action</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      @foreach($documents as $doc)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $doc->created_at->format('l, d M y') }}</td>
                        <td>{{ $doc->security }}</td>
                        <td>{{ $doc->receiver }}</td>
                        <td>{{$doc->sender}}</td>
                        <td>
                        <button type="button" value="{{ $doc->id }}" class="btn btn-sm btn-success" id="detail"><i class="fa fa-check" aria-hidden="true"></i></button>
                      </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
        </div>
</div> 
          
@include('document._detailModalDocument')
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $(document).on('click', '#detail', function(e){
                    e.preventDefault();
                    let doc_id = $(this).val();
                    $('#detailModalDocument').modal('show');
                    $.ajax({
                        type: "GET",
                        url: "/dokumen/"+doc_id,
                        success: function(response){
                          const date = new Date(response.details.created_at);
                          const time = date.getHours() + ":" + date.getMinutes() + ":" + date.getSeconds();
                            console.log(response);
                            $('.title').text(`Detail Data Document ${response.details.sender}`);
                            $('#time').text(`Waktu Masuk Dokumen : ${time} WITA`);
                            $('#security').text(`Security : ${response.details.security}`);
                            $('#address').text(`Alamat : ${response.details.address}`);
                            $('#document').text(`Jenis Document : ${response.details.document_type}`);
                            $('#sender').text(`Pengirim : ${response.details.sender}`);
                            $('#receiver').text(`Penerima : ${response.details.receiver}`);
                        }
                    });
            });
        });
    </script>
@endsection
