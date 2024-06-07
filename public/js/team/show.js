$(function () {
    $('#players').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "language": {
            "url": "/lang/es/datatables.json"
        },
    });
});

$(document).on('click', '.btnDelete', function () {
    let id = $(this).data('id');
    Swal.fire({
        title: "¿Desea eliminar el jugador?",
        text: "Una vez eliminado no podrá ser recuperado",
        showCancelButton: true,
        confirmButtonColor: "#dc3545",
        confirmButtonText: "Estoy seguro",
        closeOnConfirm: false,
    }).then(function () {
        $.ajax('/player/' + id, {
            type: "DELETE",
            asynchronous: false,
            success: function () {
                location.href = '';
                return false;
            }
        });
    });
});