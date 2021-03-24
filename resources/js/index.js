var editor;
var requireTable;
var sizingTable;
var proposalTable;
var userTable;
var customerTable;
var unsupportedTable;
var regions = [
    {value: '', label: ''},
    {label: 'East Asia', value: 'eastasia'},
    {label: 'Southeast Asia', value: 'southeastasia'},
    {label: 'Australia Central', value: 'australiacentral'},
    {label: 'Australia Central2', value: 'australiacentral2'},
    {label: 'Australia East', value: 'australiaeast'},
    {label: 'Australia Southeast', value: 'australiasoutheast'},
    {label: 'Brazil South', value: 'brazilsouth'},
    {label: 'Brazil Southeast', value: 'brazilsoutheast'},
    {label: 'Canada Central', value: 'canadacentral'},
    {label: 'Canada East', value: 'canadaeast'},
    {label: 'Central India', value: 'centralindia'},
    {label: 'South India', value: 'southindia'},
    {label: 'West India', value: 'westindia'},
    {label: 'North Europe', value: 'northeurope'},
    {label: 'West Europe', value: 'westeurope'},
    {label: 'France Central', value: 'francecentral'},
    {label: 'France South', value: 'francesouth'},
    {label: 'Germany Central', value: 'germanycentral'},
    {label: 'Germany North', value: 'germanynorth'},
    {label: 'Germany Northeast', value: 'germanynortheast'},
    {label: 'Germany Westcentral', value: 'germanywestcentral'},
    {label: 'Japan East', value: 'japaneast'},
    {label: 'Japan West', value: 'japanwest'},
    {label: 'Korea Central', value: 'koreacentral'},
    {label: 'Korea South', value: 'koreasouth'},
    {label: 'Norway East', value: 'norwayeast'},
    {label: 'Norway West', value: 'norwaywest'},
    {label: 'South Africa North', value: 'southafricanorth'},
    {label: 'South Africa West', value: 'southafricawest'},
    {label: 'Switzerland North', value: 'switzerlandnorth'},
    {label: 'Switzerland West', value: 'switzerlandwest'},
    {label: 'UAE Central', value: 'uaecentral'},
    {label: 'UAE North', value: 'uaenorth'},
    {label: 'UK South', value: 'uksouth'},
    {label: 'UK West', value: 'ukwest'},
    {label: 'Central US', value: 'centralus'},
    {label: 'East US', value: 'eastus'},
    {label: 'East US2', value: 'eastus2'},
    {label: 'North Central US', value: 'northcentralus'},
    {label: 'South Central US', value: 'southcentralus'},
    {label: 'West Central US', value: 'westcentralus'},
    {label: 'West US', value: 'westus'},
    {label: 'West US2', value: 'westus2'},
]
var regionAry = [];
for (var i in regions) {
    regionAry['"' + regions[i].value + '"'] = regions[i].label;
}
var regionAry = {
    "australiacentral2": "Australia Central2",
    "australiacentral": "Australia Central",
    "australiaeast": "Australia East",
    "australiasoutheast": "Australia Southeast",
    "brazilsouth": "Brazil South",
    "brazilsoutheast": "Brazil Southeast",
    "canadacentral": "Canada Central",
    "canadaeast": "Canada East",
    "centralindia": "Central India",
    "centralus": "Central US",
    "eastasia": "East Asia",
    "eastus2": "East US2",
    "eastus": "East US",
    "francecentral": "France Central",
    "francesouth": "France South",
    "germanycentral": "Germany Central",
    "germanynorth": "Germany North",
    "germanynortheast": "Germany Northeast",
    "germanywestcentral": "Germany Westcentral",
    "japaneast": "Japan East",
    "japanwest": "Japan West",
    "koreacentral": "Korea Central",
    "koreasouth": "Korea South",
    "northcentralus": "North Central US",
    "northeurope": "North Europe",
    "norwayeast": "Norway East",
    "norwaywest": "Norway West",
    "southafricanorth": "South Africa North",
    "southafricawest": "South Africa West",
    "southcentralus": "South Central US",
    "southeastasia": "Southeast Asia",
    "southindia": "South India",
    "switzerlandnorth": "Switzerland North",
    "switzerlandwest": "Switzerland West",
    "uaecentral": "UAE Central",
    "uaenorth": "UAE North",
    "uksouth": "UK South",
    "ukwest": "UK West",
    "westcentralus": "West Central US",
    "westeurope": "West Europe",
    "westindia": "West India",
    "westus2": "West US2",
    "westus": "West US"
};
var pricetype = [
    {value: '', label: ''},
    {value: 'payg', label: 'Pay-as-you-Go'},
    {value: 'spot', label: 'Spot'},
    {value: 'ahb', label: 'Azure Hybrid Use Benefit'},
    {value: 'ahboneyear', label: '1 Year Reserved Instance'},
    {value: 'ahbthreeyear', label: '3 Year Reserved Instance'},
    {value: 'ahbspot', label: 'Spot with AHUB'},
    {value: 'oneyear', label: '1 Year Reserved Instance with AHUB'},
    {value: 'threeyear', label: '3 Year Reserved Instance with AHUB'},
]
var pricetypeAry = {
    'payg': 'Pay-as-you-Go',
    'spot': 'Spot',
    'ahb': 'Azure Hybrid Use Benefit',
    'ahboneyear': '1 Year Reserved Instance',
    'ahbthreeyear': '3 Year Reserved Instance',
    'ahbspot': 'Spot with AHUB',
    'oneyear': '1 Year Reserved Instance with AHUB',
    'threeyear': '3 Year Reserved Instance with AHUB',
}
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
            options: pricetype
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
                {label: "99.9%", value: '99.9'},
                {label: "99.5%", value: '99.5'},
                {label: "99%", value: '99'}
            ]
        }, {
            label: "Backup retention (months):",
            name: "backupretdays"
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
    editor.on('postSubmit', function (e, json, data) {
        $('#requireTable').DataTable().ajax.reload();
    });
    requireTable = $('#requireTable').removeAttr('width').DataTable({
        dom: 'Bfrtip',
        ajax: "/vm/getvmreqdata",
        "paging": false,
        "searching": true,
        "info": true,
        "autoWidth": false,
        "scrollY": $(window).height() - 320,
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
            {
                data: "pricetype",
                "render": function (val, type, row) {
                    return pricetypeAry[val] == undefined ? '' : pricetypeAry[val];
                }
            },
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
                    return val + '%';
                }
            },
            {data: "backupretdays"},
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
                    if (row.donotmigrate == 0) {
                        return '<button class="btn btn-secondary" onclick="donot_migrate(\'' + row.vmid + '\')">Don\'t migrate </button>';
                    } else {
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
                className: 'btn btn-info',
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
                    return '<button class="btn btn-primary btn-sm" onclick="accept_proposal(\'' + row.vmid + '\')">Accept </button> | ' +
                        '<button class="btn btn-secondary btn-sm" onclick="deny_proposal(\'' + row.vmid + '\')">Deny </button>';
                }
            }
        ],
        "columnDefs": [{
            "searchable": false,
            "orderable": false,
            "targets": 0
        }],
    });
    proposalTable.on('order.dt search.dt', function () {
        proposalTable.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();

    userTable = $('#userTable').DataTable({
        dom: 'Bfrtip',
        ajax: "/users/getusers",
        "paging": false,
        "searching": true,
        "info": true,
        "autoWidth": false,
        "scrollY": $(window).height() - 320,
        'scrollCollapse': true,
        'order': [[0, 'asc']],
        'columns': [
            {data: "id"},
            {data: "name"},
            {data: "email"},
            {
                data: "is_admin",
                render: function (val) {
                    return (val == 1) ? 'Admin' : 'User'
                }
            },
            {data: "customername"},
            {
                data: "created_at",
                render: function (val) {
                    var d = new Date(val);
                    return d.getFullYear() + '-' + (d.getMonth() + 1) + '-' + d.getDate();
                }
            },
            {
                data: null,
                render: function (row) {
                    return '<button class="btn btn-primary btn-sm" onclick="edit_user(\'' + row.id + '\',\''
                        + row.name + '\', \'' + row.email + '\',\'' + row.customer_id + '\',\'' + row.is_admin + '\')">Edit </button> | ' +
                        '<button class="btn btn-secondary btn-sm" onclick="delete_user(\'' + row.id + '\')">Delete </button>';
                }
            }
        ],
        "columnDefs": [{
            "searchable": false,
            "orderable": false,
            "targets": 0
        }],
        'buttons': [
            {
                text: 'Add User',
                className: 'btn btn-info',
                action: function (e, dt, node, config) {
                    add_user();
                }
            }
        ]
    });
    customerTable = $('#customerTable').DataTable({
        dom: 'Bfrtip',
        ajax: "/customers/getcustomers",
        "paging": false,
        "searching": true,
        "info": true,
        "autoWidth": false,
        "scrollY": $(window).height() - 320,
        'scrollCollapse': true,
        'order': [[0, 'asc']],
        'columns': [
            {data: "customerid"},
            {data: "customername"},
            {data: "currency"},
            {
                data: null,
                render: function (row) {
                    return '<button class="btn btn-primary btn-sm" onclick="edit_customer(\'' + row.customerid + '\',\''
                        + row.customername + '\', \'' + row.currency + '\')">Edit </button> | ' +
                        '<button class="btn btn-secondary btn-sm" onclick="delete_user(\'' + row.id + '\')">Delete </button>';
                }
            }
        ],
        "columnDefs": [{
            "searchable": false,
            "orderable": false,
            "targets": 0
        }],
        'buttons': [
            {
                text: 'Add Customer',
                className: 'btn btn-info',
                action: function (e, dt, node, config) {
                    add_customer();
                }
            }
        ]
    });
    unsupportedTable = $('#unsupportedTable').DataTable({
        "paging": false,
        "searching": true,
        "info": true,
        "autoWidth": true,
        "scrollY": $(window).height() - 320,
        'scrollCollapse': true,
        order: [[0, 'asc']]
    });
})

