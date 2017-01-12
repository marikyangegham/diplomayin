$('#goods-types-table .glyphicon-trash').click(function () {
    var _this = $(this);
    var id = $(this).attr('data-id');
    $(_this).closest('tr').addClass('danger');

    $.ajax({
        url: '/remove/goods/type',
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

$('#goods-types-table .glyphicon-pencil').click(function () {
    $('#editArea').val('');
    var _this = $(this);
    var id = $(this).attr('data-id');
    $('#toEditArea').val(id);
    var goods_name = $(_this).closest("tr")["0"].innerText;
    $('#toChange').text(goods_name);
    $('#editArea').removeClass('error-input-border');
});

$('.saveGoodsChange').click(function(){
    let id = $('#toEditArea').val();
    let text = $('#editArea').val();
    let category_name = $('#selectedCategory').val();
    $.ajax({
        url: '/edit/goods',
        data : {"id": id, "category_name": category_name, "name": text, "_token": $('meta[name="csrf-token"]').attr('content')},
        type: "POST",
        dataType: "json",
        success : function(response){
            console.log(response);
            // if(response.status == "success"){
            //     location.reload();
            // }else if(response.status == "fail"){
            //     $('#editArea').addClass('error-input-border');
            // }
        },
        error : function(res){
            console.log(res);
            // $(_this).closest('tr').removeClass('danger');
            // alert("try again");
        }

    });
});
