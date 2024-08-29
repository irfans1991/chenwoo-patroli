<script>
    $(document).ready(function(){
        $('.buttonModal').on('click', function(e){
         e.preventDefault();
            $('.title').text('Create Product')
            $('#ModalCreateProduct').modal('show');
        });

        //Create Product
     $(document).on('click', '#savedata', function(e){
            e.preventDefault();
            let data = {
                'jenisBarang' : $('#jenisBarang').val(),
                'harga' : $('#harga').val()
            }

            $.ajaxSetup({ headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')}});

                $.ajax({
                    type:"POST",
                    url:"/product",
                    data: data,
                    dataType: "json",
                    success: function(response){
                        if(response.status == 400){
                            $('.errList').addClass('is-invalid');
                            console.log(response.errors);
                            $.each(response.errors, function(key, err_values){
                                console.log(err_values);
                                $('.invalid-feedback').append(err_values);
                            });
                        }else{  
                            $('#ModalCreateProduct').modal('hide');
                            $('#success_message').append("<div class='alert alert-success alert-dismissible supplier-disable' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>"+response.message+"</div>")
                            $('#dataTable').load("/product #dataTable" );
                            $('#jenisBarang').val('').change()
                            $('#harga').val('').change()
                            }
                    }
                });
        });

     // Delete
        $(document).on('click', '#deleteProduct', function(e){
        e.preventDefault();
        let idProduct = $(this).val();
        $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "delete",
            url: "product/"+idProduct,
            success: function(response){
                console.log(response);
                $('#success_message').append("<div class='alert alert-success alert-dismissible supplier-disable' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>"+response.message+"</div>")
                setInterval(() => {
                window.location.href = '/product';
                }, 2000);
            }
            });
        });
    });
</script>