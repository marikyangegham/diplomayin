$('#outputButton').click(function () {
    $('.if-failed,.request').hide();
    $('.output').show();
});
$('.output').click(function () {
    var _this = $(this);
    var goods_id = $('#outputGoodId').val();
    var quantity = $('#goodQuantity').val();
    $(_this).closest('tr').addClass('danger');

    $.ajax({
        url: '/output/goods',
        data : {
            goods_id: goods_id,
            quantity: quantity,
            "_token": $('meta[name="csrf-token"]').attr('content')
        },
        type: "POST",
        dataType: "json",
        success : function(response){
            console.log(response);
            if(response.status == "success"){
                location.reload();
            }else if(response.status == "fail"){
                $('.if-failed,.request').show();
                $('.output').hide();
            }
        },
        error : function(response){
            $(_this).closest('tr').removeClass('danger');
            console.log(response);
            //alert("try again");
        }

    });
});
$('button.request').click(function () {
    var _this = $(this);
    var goods_id = $('#outputGoodId').val();
    var quantity = $('#goodQuantity').val();
    $(_this).closest('tr').addClass('danger');

    $.ajax({
        url: '/request/new/goods',
        data : {
            goods_id: goods_id,
            quantity: quantity,
            "_token": $('meta[name="csrf-token"]').attr('content')
        },
        type: "POST",
        dataType: "json",
        success : function(response){
            console.log(response);
            if(response.status == "success"){
                location.reload();
            }else if(response.status == "fail"){
                // $('#form form').css('height', '1px');
                // $('#form form').css('overflow', 'hidden');
                // // $('#form').css('visibility', 'hidden');
                //
                // $('#request').css('visibility', 'visible');
                // $('#request').css('height', 'auto');
            }
        },
        error : function(response){
            $(_this).closest('tr').removeClass('danger');
            console.log(response);
            //alert("try again");
        }

    });
});



