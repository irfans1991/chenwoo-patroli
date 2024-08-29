@extends('header.header')
@section('content')

<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Visitor</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./dashboard">Home</a></li>
              <li class="breadcrumb-item">Mutasi</li>
              <li class="breadcrumb-item active" aria-current="page">{{ $page }}</li>
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
                  <h6 class="m-0 font-weight-bold text-primary flex-grow-1 bd-highlight">Data Mutasi</h6>
                  @can('admin_staff')
                  <a href="/exportVisitor" class="btn btn-success mb1"><i class="far fa-file-excel"> Excel</i></a>
                @endcan
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Security</th>
                        <th>Guest name</th>
                        <th>Company</th>
                        <th>Meet</th>
                        <th>Purpose</th>
                        <th class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Security</th>
                        <th>Guest name</th>
                        <th>Company</th>
                        <th>Meet</th>
                        <th>Purpose</th>
                        <th class="text-center">Action</th>
                      </tr>
                    </tfoot>
                    <tbody>
                        @foreach($visitors as $visitor)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $visitor->created_at->format('l, d M Y') }}</td>
                          <td>{{ $visitor->created_at->format('H:i') }} Wita</td>
                          <td>{{ $visitor->security }}</td>
                          <td>{{ $visitor->name }}</td>
                          <td>{{ $visitor->company }}</td>
                          <td>{{ $visitor->meet }}</td>
                          <td>{{ $visitor->purpose}}</td>
                          <td class="text-center">
                          <button value="{{ $visitor->id}}" class="btn btn-sm btn-primary mb-2" id="detailAllData"><i class="fa fa-info-circle" aria-hidden="true"></i></button>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                  </table>
                </div>
              </div>
        </div>
</div> 
@include('visitors._detailAllData')
@endsection

@section('script')
@include('visitors._ScriptAllData')
@endsection