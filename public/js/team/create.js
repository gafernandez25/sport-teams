$(function () {

    //Initialize Select2 Elements
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })

    //Date picker
    $('#foundation_date').datetimepicker({
        format: 'DD-MM-YYYY',
    });
});
