@extends('header.header')
@section('content')
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            @auth
            <h1 class="h3 mb-0 text-gray-800">Wellcome Back, <b><i>{{ auth()->user()->name }} !</i></b></h1>
            @endauth
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
          </div>

          <div class="row mb-3">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Container</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $containers->count() }}</div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                      <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> {{ $persen }}%</span>
                        @foreach($containers->take(1) as $row)
                        <span>{{ $row->created_at->diffForHumans() }}</span>
                        @endforeach
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-truck fa-2x text-primary"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Supplier Ikan-->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Supplier</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $supplier->count() }}</div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                      <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> {{ $persen }}%</span>
                        @foreach($supplier->take(1) as $row)
                        <span>{{ $row->created_at->diffForHumans() }}</span>
                        @endforeach
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-bus fa-2x text-danger"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Earnings (Annual) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Visitors</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $visitors }}</div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                        <span>{{ $visitor_time }}</span>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="far fa-address-card fa-2x text-success"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- New User Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                @foreach ($users as $row)
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Users</div>
                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $row->count() }}</div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 20.4%</span>
                        <span>{{ $row->created_at->diffForHumans() }}</span>
                        @endforeach
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-info"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">SUPPLIER IKAN MASUK</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $supplierIkan->count() }}</div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                        @foreach($supplierIkan->take(1) as $row)
                        <span>{{ $row->created_at->diffForHumans() }}</span>
                        @endforeach
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-fish fa-2x text-primary"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">BARANG MASUK</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $barangMasuk->count() }}</div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                        @foreach($barangMasuk->take(1) as $row)
                        <span>{{ $row->created_at->diffForHumans() }}</span>
                        @endforeach
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-box-open fa-2x text-danger"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">IZIN KARYAWAN</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $izin->count() }}</div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                        @foreach($izin->take(1) as $row)
                        <span>{{ $row->created_at->diffForHumans() }}</span>
                        @endforeach
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-skating fa-2x text-success"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">PEMAKAIAN KENDARAAN</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $kendaraan->count() }}</div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                        @foreach($kendaraan->take(1) as $row)
                        <span>{{ $row->created_at->diffForHumans() }}</span>
                        @endforeach
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-car fa-2x text-info"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">SMARTPHONE(stored)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $StorePhone->count() }}</div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                        @foreach($StorePhone->take(1) as $row)
                        <span>{{ $row->created_at->diffForHumans() }}</span>
                        @endforeach
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-mobile fa-2x text-info"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Document</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $docs->count() }}</div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                        @foreach($docs->take(1) as $row)
                        <span>{{ $row->created_at->diffForHumans() }}</span>
                        @endforeach
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-file fa-2x text-info"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-3 d-flex justify-content-center">
          <!-- Message From Customer-->
          <div class="col-xl-4 col-lg-5">
              <div class="card">
                <div class="card-header py-4 bg-primary d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-light">Message</h6>
                </div>
                <div>
                  <div class="customer-message align-items-center refresh-messages">
                    <a class="font-weight-bold" href="#">
                      @forelse($dashboard as $row)
                      <div class="text-truncate message-title messageid" id="{{ $row->id }}">{{ $row->message }}</div>
                      <div class="small text-gray-500 message-time font-weight-bold" id="id="anchor-remark""> {{ $row->name }} · {{ $row->created_at->diffForHumans() }}</div>
                      @empty
                      <div class="text-truncate message-title text-center">Haven't Message</div>
                      @endforelse
                    </a>
                  </div>
                  <div class="card-footer text-center">
                    <a class="m-0 small text-primary card-link" href="#">View More <i class="fas fa-chevron-right"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--Row-->

          <!-- <div class="row">
            <div class="col-lg-12 text-center">
              <p>Do you like this template ? you can download from <a href="https://github.com/indrijunanda/RuangAdmin"
                  class="btn btn-primary btn-sm" target="_blank"><i class="fab fa-fw fa-github"></i>&nbsp;GitHub</a></p>
            </div>
          </div> -->

          @include('dashboard._ModalDashboard')
@endsection

@section('script')
<script>
  $('.messageid').on('click', (e) => {
    e.preventDefault();
    let id_message = e.target.id;
    // console.log(id_message);
    $('#detailModalDashboard').modal('show');

    $.ajax({
      type: 'GET',
      url: `message/${id_message}/get`,
      success: (response) => {
        $('.title').text('Feedback Message');
        $('#warning').text('Message From '+response.feedback.name);
        $('#pesan').text(response.feedback.message);
        $('#id_pesan').val(response.feedback.id);
        $('#id_pesan').val(response.feedback.id);
      }
    });
  });

  //Update feedback 
  $(document).on('click', '#button-feedback', function(e){
                    e.preventDefault();
                    // console.log('tester');
                    let id_feedback = $('#id_pesan').val();
                    let data = {
                        'security' : $('#security_feedback').val(),
                        'feedback' : $('#feedback').val(),
                    }
                    $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     }
                        });

                        $.ajax({
                            type: "PUT",
                            url: "/message/"+id_feedback+"/update",
                            data: data,
                            dataType: 'json',
                            success: function(respon){
                                console.log(respon);
                                $('#success-message').html("");
                                $('#success_message').append("<div class='alert alert-success alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>"+respon.message+"</div>")
                                $('#detailModalDashboard').modal('hide');
                                $('.refresh-messages').load(" .refresh-messages");
                            }
                        });
                    });

</script>
@endsection
