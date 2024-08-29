@extends('header.header')
@section('content')
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Supplier</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./dashboard">Home</a></li>
              <li class="breadcrumb-item">Supplier</li>
              <li class="breadcrumb-item active" aria-current="page">Data Supplier</li>
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
                  <a href="javascript:void(0);" class="btn btn-primary mb-1 bd-highlight mr-2" data-toggle="modal" data-target="#createModal"><i class="fa fa-plus"> &nbsp Tambah Supplier</i></a>
                  @can('admin_staff')
                  <a href="/SupplierExport" class="btn btn-success mb-1 bd-highlight"><i class="far fa-file-excel"> Excel</i></a>
                  @endcan
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>#</th>
                        <th>Nama Supplier</th>
                        <th>Asal</th>
                        <th>Jenis</th>
                        <th class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>#</th>
                        <th>Nama Supplier</th>
                        <th>Asal</th>
                        <th>Jenis</th>
                        <th class="text-center">Action</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      @foreach($suppliers as $row)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->from }}</td>
                        <td>{{ $row->supplier }}</td>
                        <td>
                        <button type="button" value="{{ $row->id }}" class="btn btn-sm btn-warning edit_supplier" >Edit</button>
                        <button type="button" value="{{ $row->id }}" class="btn btn-sm btn-danger delete_supplier">Delete</button>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
        </div>
</div> 

@include('supplier.createModal')
@include('supplier.editModal')
@include('supplier.deleteModal')
@endsection

@section('script')
<script>
  
  setInterval(() => {
        $('.supplier-disable').fadeOut()
      }, 3000);


    $(document).ready(function(){
      //edit supplier
          $(document).on('click', '.edit_supplier', function(e){
            e.preventDefault();
            var supplier_id = $(this).val();
              $('#editModal').modal('show');
              $.ajax({
                  type: "GET",
                  url: "/supplier/edit/"+supplier_id,
                  success: function(response){
                    // console.log(response);
                    if(response.status == 404){
                      $('#success_message').html("");
                      $('#success_message').addClass('alert alert-danger');
                      $('#success_message').text(response.message);

                    }else{
                      $('#id_supplier').val(supplier_id);
                      $('#edit_name').val(response.suppliers.name);
                      $('#edit_from').val(response.suppliers.from);
                      $('#edit_supplier').val(response.suppliers.supplier);
                    }
                  }
              });
          });
      
      //update Supplier
      $(document).on('click', '.updateData', function(e){
        e.preventDefault();
        let id_supplier = $('#id_supplier').val();
        let data = {
          'name' : $('#edit_name').val(),
          'from' : $('#edit_from').val(),
          'supplier' : $('#edit_supplier').val(),
        }
                  $.ajaxSetup({
              headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
          });
          $.ajax({
              type: "PUT",
              url: "/supplier/update/"+id_supplier,
              data: data,
              dataType: 'json',
              success: function(response){
                // console.log(response);
                 if(response.status == 400){
                  $('.errList').addClass('is-invalid');
                  $('.invalid-feedback').html("");
                  $.each(response.errors, function(key, err_values){
                 $('.invalid-feedback').html(err_values);
              });
                }else if(response.status == 404){
              $('.errList').html("");
              $('.errList').addClass('alert alert-success');
              $('#success_message').text(response.message);
            }else{
              $('.errList').html("");
              $('#success-message').html("");
              $('#success_message').append("<div class='alert alert-success alert-dismissible supplier-disable' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>"+response.message+"</div>")
              $('#editModal').modal('hide');
              $('#dataTable').load("/supplier #dataTable" );
            }
          }
        });
    });



      $(document).on('click', '#savedata', function (e){
        e.preventDefault();
        var data = {
          'name': $('#name').val(),
          'from': $('#from').val(),
          'supplier': $('#supplier').val(),
        }

        $.ajaxSetup({
    
    
          headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

        $.ajax({
          type:"POST",
          url: "supplier",
          data: data,
          dataType: "json",
          success: function (response) {
            console.log(response);
            if(response.status == 400)
            {
              $('.errList').addClass('is-invalid');
              $('.invalid-feedback').html("");
              $.each(response.errors, function(key, err_values){
                $('.invalid-feedback').html(err_values);
              });
            }
            else{
              $('#success_message').append("<div class='alert alert-success alert-dismissible supplier-disable' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>"+response.message+"</div>")
              $('#createModal').modal('hide');
              $('#createModal').find('input').val("");
              $('#dataTable').load(" #dataTable" );

              fetchsupplier();
            }

          }
        });
      });

      //destroy Supplier
       $(document).on('click', '.delete_supplier', function(e){
        e.preventDefault();
        let id_supplier = $(this).val();
        $('#deleteSupplierId').val(id_supplier);
        $('#deleteModal').modal('show');
        console.log(id_supplier);
       });
       $(document).on('click', '.deleteModal', function(e){
        e.preventDefault();
        let id_supplier = $('#deleteSupplierId').val();

        $.ajaxSetup({
              headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
          });

        $.ajax({
          type: "DELETE",
          url: "supplier/delete/"+id_supplier,
          success: function(response){
            console.log(response);
            $('#success_message').append("<div class='alert alert-success alert-dismissible supplier-disable' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>"+response.message+"</div>")
            $('#deleteModal').modal('hide');
            $('#dataTable').load(" #dataTable" );
          }
        });
       });


    });
</script>

@endsection