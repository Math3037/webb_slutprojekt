function toggleModal(modalClass){
    $(modalClass).toggleClass('modal_open');
}


$(document).ready(function(){
    $('.searchModal').on({
        click: function(event){
            if(event.target == this){
                toggleModal('.searchModal');
            }
        }
    })

    $('#search_input').keyup(function(){
        var query = $(this).val();

        if(query != ''){
            $.ajax({
                url: './post/search_menu',
                method: "post",
                data: {q:query},
                dataType: "text",
                success: function(data){
                    console.log("Success");
                    console.log(data);
                    $('#search_menu_list').html(data);
                }
            })
        }else{
            $('#search_menu_list').html("");
        }
    })
})