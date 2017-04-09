$('.input').click(function () {
    var _this = $(this);
    var goods_id = $('#inputGoodType').val();
    var quantity = $('#goodQuantity').val();
    var delivery_id = $('#goodDeliveryman').val();
        $(_this).closest('tr').addClass('danger');

    $.ajax({
        url: '/input/goods',
        data : {goods_id: goods_id,
                quantity: quantity,
                delivery_id: delivery_id,
                "_token": $('meta[name="csrf-token"]').attr('content')},
        type: "POST",
        dataType: "json",
        success : function(response){
            console.log(response);
            if(response.status == "success"){
                location.reload();
            }else if(response.status == "fail"){

            }
        },
        error : function(response){
            $(_this).closest('tr').removeClass('danger');
            console.log(response);
            //alert("try again");
        }

    });
});