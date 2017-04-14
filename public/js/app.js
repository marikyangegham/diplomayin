$(document).ready(function(){
    $('#table-goods').DataTable();
    $('#table-categories').DataTable();

    $('#table-catalog').DataTable( {
        "pageLength": 50
    });
    $('#table-deliveryman').DataTable();
    $('#table-input').DataTable();
    $('#table-output').DataTable();
    $('#table-returned').DataTable();
    $('#request-to-me-table').DataTable();
    $('#request-from-me-table').DataTable();
    $('#request-main-table').DataTable();
});