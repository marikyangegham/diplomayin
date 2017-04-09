$('#deliveryman-table .glyphicon-trash').click(function () {
    var _this = $(this);
    var id = $(this).attr('data-id');
    $(_this).closest('tr').addClass('danger');

    $.ajax({
        url: '/remove/deliveryman',
        data : {id: id, "_token": $('meta[name="csrf-token"]').attr('content')},
        type: "POST",
        dataType: "json",
        success : function(response){
            if(response.status == "success"){
                $(_this).closest('tr').remove();
            }else if(response.status == "fail"){

            }
        },
        error : function(res){
            $(_this).closest('tr').removeClass('danger');
            alert("try again");
        }

    });
});
$('#deliveryman-table .glyphicon-pencil').click(function () {
    $('#editArea').val('');
    var _this = $(this);
    var id = $(this).attr('data-id');
    $('#toEditArea').val(id);
    var deliveryman_name = $(_this).closest("tr")["0"].innerText;
    $('#toChange').text(deliveryman_name);
    $('#editArea').removeClass('error-input-border');
});

$('.deliveryman-modal .saveDeliverymanChange').click(function(){
    let deliveryman_id = $('#toEditArea').val();
    let text = $('#editArea').val();
    $.ajax({
        url: '/edit/deliveryman',
        data : {"deliveryman_id": deliveryman_id, "name": text,  "_token": $('meta[name="csrf-token"]').attr('content')},
        type: "POST",
        dataType: "json",
        success : function(response){
            if(response.status == "success"){
                location.reload();
            }else if(response.status == "fail"){
                $('#editArea').addClass('error-input-border');
            }
        },
        error : function(res){
            $(_this).closest('tr').removeClass('danger');
            alert("try again");
        }

    });
});
