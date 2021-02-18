var editor;
$(document).ready(function () {
    editor = new $.fn.DataTable.Editor({
        ajax: {
            url: "/vm/editvmreqdata",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        },
        table: "#requireTable",
        idSrc: 'vmid',
        fields: [{
            label: "Region:",
            name: "region"
        }, {
            label: "Billing model:",
            name: "pricetype",
            type: "select",
            options: [
                {label: "Pay-as-you-Go", value: "Pay-as-you-Go"},
                {label: "Azure Hybrid Use Benefit", value: "Azure Hybrid Use Benefit"},
                {label: "1 Year Reserved Instance", value: "1 Year Reserved Instance"},
                {label: "3 Year Reserved Instance", value: "3 Year Reserved Instance"},
                {label: "1 Year Reserved Instance with AHUB", value: "1 Year Reserved Instance with AHUB"},
                {label: "3 Year Reserved Instance with AHUB", value: "3 Year Reserved Instance with AHUB"}
            ]
        }, {
            label: "Hours on per dag:",
            name: "hourson"
        }, {
            label: "Burstable:",
            name: "burstable",
            type: "select",
            options: [
                {label: "Yes", value: 1},
                {label: "No", value: 0}
            ]
        }, {
            label: "Latency Sensitive:",
            name: "latency",
            type: "select",
            options: [
                {label: "Yes", value: 1},
                {label: "No", value: 0}
            ]
        }, {
            label: "Service Level Agreement:",
            name: "SLA",
            type: "select",
            options: [
                {label: "Yes", value: 1},
                {label: "No", value: 0}
            ]
        }, {
            label: "Backup retention (months):",
            name: "azbackup"
        }, {
            label: "Disaster Recovery:",
            name: "dr",
            type: "select",
            options: [
                {label: "Yes", value: 1},
                {label: "No", value: 0}
            ]
        }, {
            label: "Temp storage need (GB):",
            name: "tempstoragegb"
        }
        ]
    });

    $('#requireTable').on('click', 'tbody td:nth-child(n+10)', function (e) {
        editor.inline(this, {
            onBlur: 'submit'
        });
    });
    $('#requireTable').removeAttr('width').DataTable({
        dom: 'Bfrtip',
        ajax: "/vm/getvmreqdata",
        "paging": false,
        "searching": true,
        // "ordering": true,
        "info": true,
        "autoWidth": false,
        "scrollY": 300,
        "scrollX": true,
        'scrollCollapse': true,
        // "stateSave": true,
        'fixedColumns': {
            leftColumns: 3
        },
        order: [[ 1, 'asc' ]],
        'columns': [
            {
                data: null,
            },
            {data: "vmname"},
            {data: "hvclustername"},
            {data: "vmoperatingsystem"},
            {data: "vmniccount"},
            {data: "vmproccount"},
            {data: "vmdiskcount"},
            {data: "vmtotaldisksizegb"},
            {data: "region"},
            {data: "pricetype"},
            {data: "hourson"},
            {
                data: "burstable",
                "render": function (val, type, row) {
                    return val == 1 ? "Yes" : "No";
                }
            },
            {
                data: "latency",
                "render": function (val, type, row) {
                    return val == 1 ? "Yes" : "No";
                }
            },
            {
                data: "SLA",
                "render": function (val, type, row) {
                    return val == 1 ? "Yes" : "No";
                }
            },
            {data: "azbackup"},
            {
                data: "dr",
                "render": function (val, type, row) {
                    return val == 1 ? "Yes" : "No";
                }
            },
            {data: "tempstoragegb"},
        ],
        'columnDefs': [
            {
                'targets': 0,
                'checkboxes': {
                    'selectRow': true
                }
            }
        ],
        'buttons': [
            {
                text: 'Bulk Edit',
                className:'btn-info',
                action: function ( e, dt, node, config ) {
                    require_edit();
                }
            }
        ]
    });

    $.getJSON("https://restcountries.eu/rest/v2/all", function (data) {
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

