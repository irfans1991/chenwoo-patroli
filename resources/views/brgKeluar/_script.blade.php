<script>
    $(document).ready(function(){
        $(document).on('click', '#ModalBarangKeluar', function(e){
            e.preventDefault();
            $('#createDataNota').modal('show');
        });

        $(document).on('click', '#savedata', function(e){
            e.preventDefault()
            var data = {
                'nota' : $('#nota').val(),
                'pembeli' : $('#pembeli').val(),
                'jenisPembeli' : $('#jenisPembeli').val(),
                'pembuat' : $('#pembuat').val(),
                'penimbang' : $('#penimbang').val(),
            }
                $.ajaxSetup({ headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')}});
                $.ajax({        
                    type:"POST",
                    url: "/notaBarang",
                    data: data,
                    dataType: "json",
                    success: function(resp){
                        console.log(resp);
                        if(resp.status == 400)
                        {
                            $('.errList').addClass('is-invalid');
                            $.each(resp.errors, function(key, err_values){
                                $('.invalid-feedback').text(err_values);
                            });
                        }else if(resp.status == 503){
                            $('#createModalBarangKeluar').modal('hide');
                            $('#success_message').append("<div class='alert alert-danger alert-dismissible supplier-disable' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>"+resp.message+"</div>")   
                        
                        }else{
                            $('#createDataNota').modal('hide');
                            $('#success_message').append("<div class='alert alert-success alert-dismissible supplier-disable' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>"+resp.message+"</div>")
                            setInterval(() => {
                                window.location.href = '/brgKeluar/create';
                                }, 2000);
                            }
                    }
                });
        });

        //Barang Keluar
        $(document).on('click', '#saveDataBarang', (e) => {
        e.preventDefault();
        let data = {
            'product_id' : $("#jenisItem").val(),
            'qty' : $(".totalItems").val(),
            'nota_barang_id' : $("#notaId").val(),
            'unit' : $("#unit").val()
        }

        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')}});

            $.ajax({        
                type:"POST",
                url: "/brgKeluar",
                data: data,
                dataType: "json",
                success: function(resp){
                    console.log(resp);
                    if(resp.status == 400)
                    {
                        $('.errList').addClass('is-invalid');
                        $.each(resp.errors, function(key, err_values){
                            $('.invalid-feedback').text(err_values);
                        });
                    }else{
                        $('#createModalBarangKeluar').modal('hide');
                        $('#success_message').append("<div class='alert alert-success alert-dismissible supplier-disable' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>"+resp.message+"</div>")
                        $('#TableRefresh').load(location.href + " #TableRefresh");
                    }
                }
            });
        });

            // Delete
            $(document).on('click', '.deleteHasil', function(e){
                e.preventDefault();
                let idHasil = $(this).val();
                
                $.ajaxSetup({
                        headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "delete",
                    url: "/brgKeluar/"+idHasil,
                    success: function(response){
                        console.log(response);
                        $('#success_message').append("<div class='alert alert-success alert-dismissible supplier-disable' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>"+response.message+"</div>")
                        $('#TableRefresh').load(location.href + " #TableRefresh");
                    }
                    });
                });

                $(document).on('click', '.securityValidated', function(e){
                    e.preventDefault()
                    let idValidated = $(this).val();
                    console.log(idValidated)
                    $('#ModalValidasiNota').modal('show');
                    $('#updateNota').attr('action', "notaBarang/"+idValidated)

            $.ajax({
                type: "GET",
                url: `/notaBarang/${idValidated}/edit`,
                success : function(response){
                    $('.title').html(`Nota ${response.data.nota}`)
                    $('#idValidasi').val(response.data.id)
                    $('.warning').html(`validasi nota pembeli : ${response.data.pembeli}`)
                    if (response.data.disetujui !== null) {
                        $('#validasiNota').prop('hidden', true);
                    }else{
                        $('#validasiNota').prop('hidden', false);
                    }
                }
            }); 
        });

        $(document).on('click','.checkedBy',function(e) {
            e.preventDefault();
            let idCheck = $(this).val();
            console.log(idCheck)
            $('#ModalCheckedBy').modal('show');

            $.ajax({
                type: "GET",
                url: `/notaBarang/${idCheck}/edit`,
                success : function(response){
                    $('.title').html(`Nota ${response.data.nota}`)
                    $('#checkedNota').html('Approved')
                    $('#idValidasi').val(response.data.id)
                    $('.warning').html(`validasi nota pembeli : ${response.data.pembeli}`)
                }
            }); 

                    $(document).on('click', '#checkedNota', function(e){
                    e.preventDefault();
                    let data = {
                        'checked_by' : $('#cekBy').val()
                    }
                    $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });
                    $.ajax({
                        type: "PUT",
                        url: "/notaBarang/"+idCheck,
                        data: data,
                        dataType: 'json',
                        success: function(response){
                        $('#success-message').html("");
                        $('#success_message').append("<div class='alert alert-success alert-dismissible supplier-disable' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>"+response.message+"</div>")
                        $('#ModalCheckedBy').modal('hide');
                        setInterval(() => {
                            window.location.href = '/notaBarang';
                            }, 1500);
                        }
                    });
                });
        });

    });
</script>