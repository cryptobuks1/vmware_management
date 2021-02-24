var editor;
var requireTable;
var sizingTable;
var proposalTable;
var regions = [
    {value: 'asia-pacific-east', label: 'eastasia'},
    {value: 'asia-pacific - southeast', label: 'southeastasia'},
    {value: 'australia-central', label: 'australiacentral'},
    {value: 'australia-central - 2', label: 'australiacentral2'},
    {value: 'australia-east', label: 'australiaeast'},
    {value: 'australia-southeast', label: 'australiasoutheast'},
    {value: 'brazil-south', label: 'brazilsouth'},
    {value: 'brazil-southeast', label: 'brazilsoutheast'},
    {value: 'canada-central', label: 'canadacentral'},
    {value: 'canada-east', label: 'canadaeast'},
    {value: 'central-india', label: 'centralindia'},
    {value: 'south-india', label: 'southindia'},
    {value: 'west-india', label: 'westindia'},
    {value: 'europe-north', label: 'northeurope'},
    {value: 'europe-west', label: 'westeurope'},
    {value: 'france-central', label: 'francecentral'},
    {value: 'france-south', label: 'francesouth'},
    {value: 'germany-central', label: 'germanycentral'},
    {value: 'germany-north', label: 'germanynorth'},
    {value: 'germany-northeast', label: 'germanynortheast'},
    {value: 'germany-west-central', label: 'germanywestcentral'},
    {value: 'japan-east', label: 'japaneast'},
    {value: 'japan-west', label: 'japanwest'},
    {value: 'korea-central', label: 'koreacentral'},
    {value: 'korea-south', label: 'koreasouth'},
    {value: 'norway-east', label: 'norwayeast'},
    {value: 'norway-west', label: 'norwaywest'},
    {value: 'south-africa - north', label: 'southafricanorth'},
    {value: 'south-africa - west', label: 'southafricawest'},
    {value: 'switzerland-north', label: 'switzerlandnorth'},
    {value: 'switzerland-west', label: 'switzerlandwest'},
    {value: 'uae-central', label: 'uaecentral'},
    {value: 'uae-north', label: 'uaenorth'},
    {value: 'united-kingdom - south', label: 'uksouth'},
    {value: 'united-kingdom - west', label: 'ukwest'},
    {value: 'us-central', label: 'centralus'},
    {value: 'us-east', label: 'eastus'},
    {value: 'us-east - 2', label: 'eastus2'},
    {value: 'us-north - central', label: 'northcentralus'},
    {value: 'us-south - central', label: 'southcentralus'},
    {value: 'us-west - central', label: 'westcentralus'},
    {value: 'us-west', label: 'westus'},
    {value: 'us-west - 2', label: 'westus2'},
    {value: 'usgov-arizona', label: 'usgov-arizona'},
    {value: 'usgov-texas', label: 'usgov-texas'},
    {value: 'usgov-virginia', label: 'usgov-virginia'},
    {value: 'global', label: 'global'}
]
var regionAry = {
    'asia-pacific - southeast': "southeastasia",
    'asia-pacific-east': "eastasia",
    'australia-central': "australiacentral",
    'australia-central - 2': "australiacentral2",
    'australia-east': "australiaeast",
    'australia-southeast': "australiasoutheast",
    'brazil-south': "brazilsouth",
    'brazil-southeast': "brazilsoutheast",
    'canada-central': "canadacentral",
    'canada-east': "canadaeast",
    'central-india': "centralindia",
    'europe-north': "northeurope",
    'europe-west': "westeurope",
    'france-central': "francecentral",
    'france-south': "francesouth",
    'germany-central': "germanycentral",
    'germany-north': "germanynorth",
    'germany-northeast': "germanynortheast",
    'germany-west-central': "germanywestcentral",
    'global': "global",
    'japan-east': "japaneast",
    'japan-west': "japanwest",
    'korea-central': "koreacentral",
    'korea-south': "koreasouth",
    'norway-east': "norwayeast",
    'norway-west': "norwaywest",
    'south-africa - north': "southafricanorth",
    'south-africa - west': "southafricawest",
    'south-india': "southindia",
    'switzerland-north': "switzerlandnorth",
    'switzerland-west': "switzerlandwest",
    'uae-central': "uaecentral",
    'uae-north': "uaenorth",
    'united-kingdom - south': "uksouth",
    'united-kingdom - west': "ukwest",
    'us-central': "centralus",
    'us-east': "eastus",
    'us-east - 2': "eastus2",
    'us-north - central': "northcentralus",
    'us-south - central': "southcentralus",
    'us-west': "westus",
    'us-west - 2': "westus2",
    'us-west - central': "westcentralus",
    'usgov-arizona': "usgov-arizona",
    'usgov-texas': "usgov-texas",
    'usgov-virginia': "usgov-virginia",
    'west-india': "westindia"
};
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
            name: "region",
            type: "select",
            options: regions
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

    $('#requireTable').on('click', 'tbody td:nth-child(n+9):nth-child(-n+17)', function (e) {
        editor.inline(this, {
            onBlur: 'submit'
        });
    });
    requireTable = $('#requireTable').removeAttr('width').DataTable({
        dom: 'Bfrtip',
        ajax: "/vm/getvmreqdata",
        "paging": false,
        "searching": true,
        "info": true,
        "autoWidth": false,
        "scrollY": $(window).height() - 310,
        "scrollX": true,
        'scrollCollapse': true,
        'fixedColumns': {
            leftColumns: 3
        },
        order: [[1, 'asc']],
        'columns': [
            {
                data: "vmid",
            },
            {data: "vmname"},
            {data: "hvclustername"},
            {data: "vmoperatingsystem"},
            {data: "vmniccount"},
            {data: "vmproccount"},
            {data: "vmdiskcount"},
            {data: "vmtotaldisksizegb"},
            {
                data: "region",
                "render": function (val, type, row) {
                    return regionAry[val] == undefined ? '' : regionAry[val];
                }
            },
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
            {
                data: null,
                render: function (row) {
                    if(row.donotmigrate == 0){
                        return '<button class="btn btn-secondary" onclick="donot_migrate(\'' + row.vmid + '\')">Don\'t migrate </button>';
                    }else{
                        return '';
                    }
                }
            }
        ],
        'columnDefs': [
            {
                'targets': 0,
                'checkboxes': {
                    'selectRow': true
                }
            }
        ],
        'select': {
            'style': 'multi'
        },
        'buttons': [
            {
                text: 'Bulk Edit',
                className: 'btn-info',
                action: function (e, dt, node, config) {
                    require_edit();
                }
            }
        ]
    });

    var options = [{id: '', text: ''}];
    for (var i in regions) {
        options.push({
            id: regions[i].value,
            text: regions[i].label
        })
    }
    $('#regionSelect').select2({
        data: options
    });
    $('#bulkSaveBtn').click(function () {
        var selectedIds = requireTable.columns().checkboxes.selected()[0];
        if (selectedIds.length == 0) {
            alert('Please Check VMs for bulk Edit');
            return;
        }
        $.each(selectedIds, function (index, rowId) {
            // Create a hidden element
            $('#builEditForm').append(
                $('<input>')
                    .attr('type', 'hidden')
                    .attr('name', 'vmids[]')
                    .val(rowId)
            );
        });
        $('#builEditForm').submit();
    })
    //For sizing Page


    sizingTable = $('#sizingTable').DataTable({
        "paging": false,
        "searching": true,
        "info": true,
        "autoWidth": false,
        "scrollY": $(window).height() - 320,
        'scrollCollapse': true,
        order: [[0, 'asc']]
    });
    proposalTable = $('#proposalTable').DataTable({
        ajax: "/vm/get_proposal",
        "paging": false,
        "searching": true,
        "info": true,
        "autoWidth": false,
        "scrollY": $(window).height() - 320,
        'scrollCollapse': true,
        order: [[0, 'asc']],
        'columns': [
            {
                data: null,
            },
            {data: "vmname"},
            {data: "vmniccount"},
            {data: "vmproccount"},
            {data: "pvmproccount"},
            {data: "vmdiskcount"},
            {data: "pvmdiskcount"},
            {
                data: null,
                render: function (row) {
                    if(row.pnewsize != 0){
                        return '<button class="btn btn-primary btn-sm" onclick="accept_proposal(\'' + row.vmid + '\')">Accept </button> | ' +
                            '<button class="btn btn-secondary btn-sm" onclick="deny_proposal(\'' + row.vmid + '\')">Deny </button>';
                    }else{
                        return 'Denied';
                    }
                }
            }
        ],
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        } ],
    });
    proposalTable.on( 'order.dt search.dt', function () {
        proposalTable.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
})

