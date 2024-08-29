<script>
    $('#touchSpin2').TouchSpin({
                    min: 0,
                    max: 9999999999,
                    boostat: 5,
                    postfix: 'Km/h',
                    maxboostedstep: 10,
                    initval: 0
                });
    $('.touchSpin2').TouchSpin({
                    min: 0.0,
                    max: 200,
                    step: 0.1,
                    decimals: 1,
                    boostat: 5,
                    postfix: 'L',
                    maxboostedstep: 10,
                    initval: 0
                });

    $(document).ready(function(){
        $(document).on('click', '#update_kendaraan', function(e){
            e.preventDefault();
            let id_kendaraan = $(this).val();
            $('#checkInKendaraan').modal('show');
            $.ajax({
                type: "GET",
                url: `kendaraan/${id_kendaraan}/edit`,
                success: function(respon){
                    console.log(respon);
                    let upperCase = respon.edit.transport.toUpperCase();
                    $('.title').text(upperCase);
                    $('.warning').text(`Are you sure want to check out ${respon.edit.transport}!`);
                    $('#transport_id').val(id_kendaraan);
                    $('#status').val('Masuk');
                }
            });
        });

        //Update Check In
        $(document).on('click', '#checkInData', function(e){
                    e.preventDefault();
                    let id_kendaraan = $('#transport_id').val();
                    let data = {
                        'status' : $('#status').val(),
                        'after_speedometer' : $('.after_speedometer').val(),
                        'fuel' : $('.fuel').val(),
                    }
                    $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     }
                        });

                        $.ajax({
                            type: "PUT",
                            url: "kendaraan/"+id_kendaraan,
                            data: data,
                            dataType: 'json',
                            success: function(respon){
                                console.log(respon);
                                $('#success-message').html("");
                                $('#success_message').append("<div class='alert alert-success alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>"+respon.message+"</div>")
                                $('#checkInKendaraan').modal('hide');
                                $('#TableRefresh').load(" #TableRefresh" );
                                 }
                            });
                        })
    });
</script>
