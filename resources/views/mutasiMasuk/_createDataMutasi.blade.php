
<script>
  function autoFill(){
    var suppliers = $("#name").val();
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
