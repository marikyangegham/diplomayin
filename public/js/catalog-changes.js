window.onload = function () {
    $('#change-quantity').click(function () {
        $('#custom-modal-content-style').removeClass('error-div-border');
        $('#errorMessage').text('');
    });
    $('.saveQuantityChange').click(function () {
        let operator = $('input[name=quantityPlusOrMinus]:checked', '#quantityChange').val();
        let toChangeCatalogId = $('#selected_goods').val();
        let goodsQuantity = $('#number').val();



        if(goodsQuantity < 0 || goodsQuantity == '' || !toChangeCatalogId || operator == undefined){
            $('#custom-modal-content-style').addClass('error-div-border');
            $('#errorMessage').text('no correct data');
        }else {
            $('#custom-modal-content-style').removeClass('error-div-border');
            $('#errorMessage').text('');

            $.ajax({
                url: '/change/catalog/data',
                data : {operator: operator, toChangeCatalogId: toChangeCatalogId, goodsQuantity: goodsQuantity, "_token": $('meta[name="csrf-token"]').attr('content')},
                type: "POST",
                dataType: "json",
                success : function(response){
                    console.log(response);
                    if(response.status == "success"){

                         location.reload();
                    }
                    else if(response.status == false){
                        $('#errorMessage').text(response.errors[0]);
                    }
                },
                error : function(res){
                    //$(_this).closest('tr').removeClass('danger');
                    alert("try again");
                }

            });
        }

    });
};