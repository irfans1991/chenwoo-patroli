@extends('header.header')
@section('content')
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Users Tables</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ $page }}</li>
            </ol>
          </div>
          @if(session()->has('success'))
          <div class="d-flex flex-row-reverse" id="success_message" >
          <div class="alert alert-success alert-dismissible user-disable" role="alert">
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
                  <h6 class="m-0 font-weight-bold text-primary">Users Tables</h6>
                  <a href="/users/{{$slug}}" class="btn btn-primary mb-1 "><i class="fa fa-plus"> &nbsp Tambah User</i></a>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>User Name</th>
                        <th>Level Access</th>
                        <th>Status</th>
                        <th class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($users as $user)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->level }}</td>
                        <td><span class="badge badge-success">Active</span></td>
                        <td class="text-center">
                          <a href="/profile/{{ $user->id}}/edit" class="btn btn-sm btn-info"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
                          <a href="/users/{{ $user->id }}/edit" class="btn btn-sm btn-warning"><i class="fa fa-edit" aria-hidden="true"></i></a>
                          <button value="{{ $user->id }}" class="btn btn-sm btn-danger deleteUser" id="deleteUser"><i class="fa fa-trash" aria-hidden="true"></i></button>
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
          <!--Row-->

@endsection
@include('users._deleteUsers')
@section('script')
<script>
      //setinterval
      setInterval(() => {
        $('.user-disable').fadeOut()
      }, 3000);

    $(document).on('click', '#deleteUser', function(e){
      e.preventDefault();
      let id_users = $(this).val();
      $('#deleteUserId').val(id_users);
      $('#deleteModalUsers').modal('show');
      $('.title').text('Delete User');
      $('.warning').text('Are You Sure Delete this User!')
      console.log(id_users);
    });
      $(document).on('click', '#deleteUsers', function(e){
        e.preventDefault();
        let id_users = $('#deleteUserId').val();

        $.ajaxSetup({
              headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
          });

          $.ajax({
              method: "DELETE",
              url: 'users/'+id_users,
              success: function(response){
                $('#success_message').append("<div class='alert alert-success alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>"+response.message+"</div>")
                $('#deleteModalUsers').modal('hide');
                $('#dataTable').load(" #dataTable" );
              }
          });
      });

</script>
@endsection
