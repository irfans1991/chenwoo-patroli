<script>
    $(document).on('click', '#detailAllData', function(e){
        e.preventDefault()
        let visitoridShow = $(this).val()
        $('#showAllData').modal('show')
        console.log(visitoridShow)
        $.ajax({
            type: 'GET',
            url: 'visitors/'+visitoridShow,
            dataType: 'json',
            success: function(response){
                const date = new Date(response.data.updated_at);
                const time = date.getHours() + ":" + date.getMinutes() + ":" + date.getSeconds();
                console.log(response.data)
                $('.title').text('Detail Data '+ response.data.name)
                $('#imageVisitor').attr("src", "storage/public/"+response.data.photo); 
                $('#email').text(`Email : ${response.data.email}`)
                $('#police').text(`No. Police : ${response.data.police}`)
                if(response.data.status == 'masuk'){
                    $('#jamKeluar').text(`Jam Keluar : Belum Keluar`)
                    $('#status').text(`Status : ${response.data.status}`)
                }else{
                    $('#status').text(`Status : ${response.data.status}`)
                    $('#jamKeluar').text(`Jam Keluar : ${time} wita`)
                }
                $('#information span').text(response.data.info)  
            } 
        });

    });
</script>