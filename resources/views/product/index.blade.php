@extends('header.header')
@section('content')
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Product</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./dashboard">Home</a></li>
              <li class="breadcrumb-item">Product</li>
              <li class="breadcrumb-item active" aria-current="page">Index</li>
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
                  <h6 class="m-0 font-weight-bold text-primary flex-grow-1 bd-highlight">Jenis Product</h6>
                  <a href="javascript:void(0);" class="btn btn-primary mb-1 bd-highlight mr-2  buttonModal" data-toggle="modal" data-target="#createModal"><i class="fa fa-plus"> &nbsp Product</i></a>
                  <a href="/productExport" class="btn btn-success mb-1 bd-highlight"><i class="far fa-file-excel"> Excel</i></a>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>#UUID</th>
                        <th>Jenis Barang</th>
                        <th>Harga</th>
                        <th class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>#UUID</th>
                        <th>Jenis Barang</th>
                        <th>Harga</th>
                        <th class="text-center">Action</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      @foreach ($data as $row )
                        
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->jenisBarang }}</td>
                        <td>Rp. {{ number_format($row->harga) }}</td>
                        <td>
                          <button type="button" value="{{$row->id}}" class="btn btn-sm btn-danger text-center" id="deleteProduct"><i class="fa fa-trash"></i></button>
                        </td>
                      </tr>
                      @endforeach
                      
                    </tbody>
                  </table>
                </div>
              </div>
        </div>
</div> 
@include('product._ModalCreateProduct')
@endsection

@section('script')
@include('product._script')
@endsection