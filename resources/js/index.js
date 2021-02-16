$(document).ready(function () {
    $('#requireTable').removeAttr('width').DataTable({
        "paging": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "scrollY": 300,
        "scrollX": true,
        scrollCollapse: true,
        "stateSave": true,
        fixedColumns: {
            leftColumns: 3
        },
    });
    $.getJSON( "https://restcountries.eu/rest/v2/all", function(data) {
        var results = [];
        data.forEach(function (country) {
            results.push({
                text: country.name,
                id: country.name
            });
        });
        $('#regionSelect').select2({
            data: results
        });
    });
    $("input[data-bootstrap-switch]").each(function () {
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });
})

