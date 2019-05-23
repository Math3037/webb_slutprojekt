function toggleModal(modalClass){
    $(modalClass).toggleClass('modal_open');
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