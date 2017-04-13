$(document).ready(function () {
   function getRequestsCount() {
       $.ajax({
           url: '/request/all',
           data : {
               "_token": $('meta[name="csrf-token"]').attr('content')
           },
           type: "POST",
           dataType: "json",
           success : function(response){

               if(response.status == "success"){
                   console.log(response);
                   $('#requestCount').html(response.count);
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
               //$(_this).closest('tr').removeClass('danger');
               console.log(response);
               //alert("try again");
           },
           complete: function(){
               window.setTimeout(getRequestsCount, 5000);
           }

       });
   }

    window.setTimeout(getRequestsCount, 1000);
});