<script>
    $(document).ready(function(){

        $(document).on('click', '#detail', function(e){
            e.preventDefault();
            let permission_id = $(this).val();
            $('#detailModalPermission').modal('show');
            $.ajax({
                type: "GET",
                url: `/permission/${permission_id}`,
                success : function(respon){
                    let data = respon.details.needs;
                    let convert = data.toUpperCase();

                    //time
                    const date = new Date(respon.details.updated_at);
                    const time = date.getHours() + ":" + date.getMinutes() + ":" + date.getSeconds();

                    $('#permission_id').val(permission_id);
                    $('.title').text(`Surat Izin ${respon.details.name}`);
                    $('#needs').text(convert);
                    $('#name').text(`Nama Karyawan : ${respon.details.name}`);
                    $('#remark').text(`Keterangan : ${respon.details.remark}`);
                    $('#hrd').text(`Diketahui HRD : ${respon.details.hrd}`);
                    $('#part').text(`Disetujui Kepala Departement : ${respon.details.departement}`);
                    if(respon.details.security === null) {
                        $('#security').text('Security : belum di Validasi');
                    }else{
                        $('#validate').prop('hidden', true);
                        $('#security').text(`Security : ${respon.details.security}`);
                    }
                    $('#status').text(`Status : ${respon.details.status}`);

                    if(respon.details.status == 'Keluar'){
                        $('#masuk').text(`Karyawan Belum Kembali`);
                    }else{
                    $('#masuk').text(`Waktu Kembali Karyawan : ${time}`);
                    }


                }
            });
        });


                // validate Karyawan
                $(document).on('click', '#validate', function(e){
                    e.preventDefault();
                    let permission_id = $('#permission_id').val();
                    let data = {
                        'security' : $('#security_update').val(),
                    }
                    $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     }
                        });

                        $.ajax({
                            type: "PUT",
                            url: "/permission/"+permission_id,
                            data: data,
                            dataType: 'json',
                            success: function(respon){
                                // console.log(respon);
                                $('#success-message').html("");
                                $('#success_message').append(`<div class='alert alert-success alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>${respon.message}</div>`)
                                $('#detailModalPermission').modal('hide');
                                $('#TableRefresh').load(" #TableRefresh" );
                            }
                        });
                });


                //Get data CheckIn
                $(document).on('click', '#checkIn', function(e){
                  e.preventDefault();
                  let permission_id = $(this).val();
                  $('#checkInEmployee').modal('show');
                  $.ajax({
                      type: "GET",
                      url: `permission/${permission_id}/edit`,
                      success : function(response) {
                              $('.title').text('Check In Employee');
                              $('.permission_id').val(permission_id);
                              $('.status').val('Masuk');
                              $('.warning').text(`Are you sure you want to Check In ${response.employee.name}  ?`)
                            }
                        });
              });

                //Update Check In
                $(document).on('click', '#checkInData', function(e){
                    e.preventDefault();
                    let id_permission = $('.permission_id').val();
                    let data = {
                        'status' : $('.status').val(),
                    }
                    $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     }
                        });

                        $.ajax({
                            type: "PUT",
                            url: "/permission/"+id_permission,
                            data: data,
                            dataType: 'json',
                            success: function(respon){
                                console.log(respon);
                                $('#success-message').html("");
                                $('#success_message').append("<div class='alert alert-success alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>"+respon.message+"</div>")
                                $('#checkInEmployee').modal('hide');
                                $('#TableRefresh').load(" #TableRefresh" );
                            }
                        });
                        });
    });

    $(document).on('click', '#hrd-validated', function(e){
            e.preventDefault();
            let idValidate = $(this).val();
            $('#validateModalUpdate').modal('show');
            console.log(idValidate);
            $.ajax({
                type: "GET",
                url: `permission/${idValidate}/edit`,
                success : function(response) {
                        $('.idValidated').val(idValidate);
                        $('.departement').val();
                        $('.warning').text(`Are you sure you want validate ?`);
                    }
                });
        });

        $(document).on('click', '#validasi', function(e){
                    e.preventDefault();
                    let idValidated = $('#idValidated').val();
                    let data = {
                        'departement' : $('.departement').val(),
                    }
                    $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     }
                        });

                        $.ajax({
                            type: "PUT",
                            url: "/permission/"+idValidated,
                            data: data,
                            dataType: 'json',
                            success: function(respon){
                                console.log(respon);
                                $('#success-message').html("");
                                $('#success_message').append("<div class='alert alert-success alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>"+respon.message+"</div>")
                                $('#validateModalUpdate').modal('hide');
                                $('#TableRefresh').load(" #TableRefresh" );
                            }
                        });
                });

            $(document).on('click', '#deletePermission', function(e){
                e.preventDefault();
                let idDelete = $(this).val();
                console.log(idDelete);

                    $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
                    });
                $.ajax({
                    type: "DELETE",
                    url: `permission/${idDelete}/delete`,
                    success : function(response) {
                        console.log(response);
                        $('#success_message').append("<div class='alert alert-success alert-dismissible supplier-disable' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>"+response.message+"</div>")
                        $('#deleteModal').modal('hide');
                        $('#dataTable').load(" #dataTable" );
                        }
                    });
            });
</script>
