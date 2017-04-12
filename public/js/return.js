$('.return').click(function () {
    var _this = $(this);
    var goods_id = $('#returnGoodType').val();
    var quantity = $('#goodQuantity').val();
    $(_this).closest('tr').addClass('danger');

    $.ajax({
        url: '/return/goods',
        data : {goods_id: goods_id,
                quantity: quantity,
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

$(document).ready(function(){
    $("#returnGoodType").on('change', function(){
        var measurement = $(this).find(':selected').data('measurement');

        if(measurement){
            $("#return-goods-measurement").text(measurement);
        }
    });
});
