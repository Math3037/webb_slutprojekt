function toggleModal(modalClass){
    $(modalClass).toggleClass('modal_open');
}

function resetForm(name, email, number){
    $('#input_name').val(name);
    $('#input_email').val(email);
    $('#input_number').val(number);
}

$('.barcodeModal').on({
    click: function(event){
        if(event.target == this){
            toggleModal('.barcodeModal');
        }
    }
})

$('.helpModal').on({
    click: function(event){
        if(event.target == this){
            toggleModal('.helpModal');
        }
    }
})

JsBarcode("#barcode").init();