window.onload = function () {

    $(".glyphicon-trash").click(function(){

        var _this = $(this);
        var id = $(this).attr('data-id');
        $(_this).closest('tr').addClass('danger');

        $.ajax({
            url: '/remove/category',
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

    $('.glyphicon-pencil').click(function () {
        $('#editArea').val('');
        var _this = $(this);
        var id = $(this).attr('data-id');
        var category_name = $(_this).closest("tr")["0"].innerText;
        $('#toChange').text(category_name);
        $('#toEditArea').val(id);
        $('#editArea').removeClass('error-input-border');
       // $(_this).closest('tr').addClass('danger');


    });

    $('.saveChange').click(function(){
        let id = $('#toEditArea').val();
        let text = $('#editArea').val();

        $.ajax({
            url: '/edit/category',
            data : {"id": id, "category_name": text, "_token": $('meta[name="csrf-token"]').attr('content')},
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
                console.log(res);
                // $(_this).closest('tr').removeClass('danger');
                // alert("try again");
            }

        });
    });


};
