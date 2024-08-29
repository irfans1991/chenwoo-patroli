

<script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap2.bundle.min.js"></script>
  <script src="vendor/bootstrap/js/jquery2.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
  <script>
    let loading = document.querySelector('#loading');
    window.addEventListener('load', function(){
      loading.style.display="none";
    });
  </script>
@yield('scriptLogin')
</body>

</html>