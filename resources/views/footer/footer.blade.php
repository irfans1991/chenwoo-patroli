<!-- Modal Logout -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Are you sure you want to logout?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                  <form action="/logout" method="post">
                    @csrf
                  <button class="btn btn-primary">Logout</button>
                  </form>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!---Container Fluid-->
</div>

<!-- Footer -->
<footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script> - developed by
              <b><a href="https://indrijunanda.gitlab.io/" target="_blank">IT SUPPORT | DEV | CHENWOO</a></b>
            </span>
          </div>
        </div>

        <!-- <div class="container my-auto py-2">
          <div class="copyright text-center my-auto">
            <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script> - distributed by
              <b><a href="https://themewagon.com/" target="_blank">themewagon</a></b>
            </span>
          </div>
        </div>
      </footer> -->
      <!-- Footer -->
 

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <script src="/js/app.js"></script>
  <script>
  function autoFill(){
    var suppliers = $("#supplierName").val();
    $.ajax({
      url: '/test/'+suppliers,
      success: function(url){
          var json = url,
          obj = JSON.parse(json);
          $('#from').val(obj.from);
          $('#supplier').val(obj.supplier);
          console.log(obj.supplier);
      }
      
    });
  }
  
</script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js"></script>
  <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
  <script src="{{asset('js/chek.js')}}"></script>
  <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap2.bundle.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/jquery2.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('js/ruang-admin.min.js')}}"></script>
  <script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script>
  <script src="{{asset('js/demo/chart-area-demo.js')}}"></script>  
  <script src="{{ asset('vendor/bootstrap-touchspin/js/jquery.bootstrap-touchspin.js') }}"></script>
  <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('vendor/select2/dist/js/select2.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
  <script src="{{ asset('vendor/clock-picker/clockpicker.js') }}"></script>


  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script>
    // setInterval(() => {
    //     $('#refresh-content').load(' #refresh-content');
    //     $('#refresh-item').load(' #refresh-item');
    //     $('#refresh-notif').load(' #refresh-notif');
    //     $('#refresh-item-permission').load(' #refresh-item-permission');
    //   }, 1000);
    let jumlah = 0;
    let text = "";
    const socket = io("http://192.168.10.120:3000");
    socket.on("data baru", (data) => {
      let notifikasi = [data.permission];
      console.log(notifikasi);
      //time
      const date = new Date(notifikasi.updated_at);
      const time = date.getHours() + ":" + date.getMinutes() + ":" + date.getSeconds();
      jumlah++;
      $('.remark').text(notifikasi.remark);
      $('.permission').text(jumlah);
      $('.hrd-notif').text(notifikasi.hrd);
    });

    $(document).ready(function () {
      
      $('.select2-single').select2({
        placeholder:"Please Select here",
        allowClear: true
      });

// Select2 Single  with Placeholder
$('.select2-single-placeholder').select2({
  placeholder: "Please Select supplier",
  allowClear: true,
});      

// Select2 Multiple
$('.select2-multiple').select2();

// Bootstrap Date Picker
$('#simple-date1 .input-group.date').datepicker({
  format: 'dd/mm/yyyy',
  todayBtn: 'linked',
  todayHighlight: true,
  autoclose: true,        
});

$('#simple-date2 .input-group.date').datepicker({
  startView: 1,
  format: 'dd/mm/yyyy',        
  autoclose: true,     
  todayHighlight: true,   
  todayBtn: 'linked',
});

$('#simple-date3 .input-group.date').datepicker({
  startView: 2,
  format: 'dd/mm/yyyy',        
  autoclose: true,     
  todayHighlight: true,   
  todayBtn: 'linked',
});

$('#simple-date4 .input-daterange').datepicker({        
  format: 'dd/mm/yyyy',        
  autoclose: true,     
  todayHighlight: true,   
  todayBtn: 'linked',
});    

// TouchSpin

$('#touchSpin1').TouchSpin({
  min: 0,
  max: 10000,                
  boostat: 5,
  maxboostedstep: 10,        
  initval: 0
});

$('#touchSpin2').TouchSpin({
  min:0,
  max: 10000,
  decimals: 2,
  step: 0.1,
  postfix: '%',
  initval: 0,
  boostat: 5,
  maxboostedstep: 10
});

$('#touchSpin3').TouchSpin({
  min: 0,
  max: 10000,
  initval: 0,
  boostat: 5,
  maxboostedstep: 10,
  verticalbuttons: true,
});

$('#clockPicker1').clockpicker({
  donetext: 'Done'
});

$('#clockPicker2').clockpicker({
  autoclose: true
});

let input = $('#clockPicker3').clockpicker({
  autoclose: true,
  'default': 'now',
  placement: 'top',
  align: 'left',
});

$('#check-minutes').click(function(e){        
  e.stopPropagation();
  input.clockpicker('show').clockpicker('toggleView', 'minutes');
});
$('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>
  @yield('script')
  @livewireScripts
</body>

</html>