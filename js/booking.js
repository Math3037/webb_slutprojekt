$('#datepicker').on({
    change: function(){
        var date = $('#datepicker').val();

        $.ajax({
            url: '../post/check_date',
            method: "post",
            data: {date:date},
            dataType: "text",
            success: function(data){
                if(data == "false"){
                    $('.submit_btn').addClass('disabled');
                    $('.valid').html("We are closed this day, please choose another date");
                }else{
                    $('.submit_btn').removeClass('disabled');
                    $('.valid').html("");
                }
            }
        })
    }
})

$('#table_selector').on({
    change: function(){
        var table = $(this);

        $.ajax({
            url: '../post/get_available_times',
            method: "post",
            data: {table: table.val(), day: day},
            dataType: "text",
            success: function(data){
                console.log(data)
                var data = JSON.parse(data);
                console.log(data);
                
                data.forEach(function(e){
                    $('#time_selector').append("<option value=" + e.id + ">" + e.start  + " - " + e.end + "</option>")
                })
            }
        })
    }
})