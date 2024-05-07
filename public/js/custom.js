$(function () {
    $('#datatable').DataTable({
        "paging": true,
        "lengthChange": true,
        "iDisplayLength": 50,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
});