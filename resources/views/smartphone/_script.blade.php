<script>
  function autoFill(){
    var phone_id = $('#id_phone').val();
    $.ajax({
      type: 'GET',
      url: 'getPhone/'+phone_id,
      success: function(response){
        console.log(response);
          $('#id_phones').val(response.fills.id_phone);
          $('#name').val(response.fills.name);
          $('#section').val(response.fills.section);
          $('#smartphone').val(response.fills.smartphone);
          $('#number').val(response.fills.number);
      }
      
    });
  }
  
  $(document).ready(function(){
    $(document).on('click', '#checkOutPhone', function(e){
      e.preventDefault();
      let idStored = $(this).val()
      $('#checkOutPhone').modal('show');
      $.ajax({
          type: 'GET',
          url: `stored/${idStored}/edit`,
          success: function(response){
            console.log(response);
            $('.title').text('Smart Phone '+response.phones.name);
            $('.warning').text('Do you want to take the Phone !');
            $("[name='id']").val(idStored);
          }
      });
      
    });

    $(document).on('click', '#takeIt', function(e){
      e.preventDefault();
      let id_stored = $('.editId').val()
      data = {
        'status' : $('.status').val(),
      }

      $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     }
                        });
      $.ajax({
          type: 'PUT',
          url: '/stored/update/'+id_stored,
          data: data,
          success: function(response){
              console.log(response)
              $('#success-message').html("");
              $('#success_message').append("<div class='alert alert-success alert-dismissible stored-disable' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>"+response.message+"</div>")
              $('#checkOutPhone').modal('hide');
              $('#TableRefresh').load(" #TableRefresh" );
          }
      });
    });
  });

</script>