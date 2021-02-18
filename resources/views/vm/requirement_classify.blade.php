@extends('layouts.app')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <script>
        function require_edit(vm_id) {
            // $.getJSON('/vm/getvmdata', {'id': vm_id}, function (response) {
            //     $('#vmid').val(response.vmid);
            //     $('#vmname').val(response.vmname);
            //     $('#hvclustername').val(response.hvclustername);
            //     $('#vmoperatingsystem').val(response.vmoperatingsystem);
            //     $('#vmniccount').val(response.vmniccount);
            //     $('#vmproccount').val(response.vmproccount);
            //     $('#vmdiskcount').val(response.vmdiskcount);
            //     $('#vmtotaldisksizegb').val(response.vmtotaldisksizegb);
            //     $('#regionSelect').val(response.region).trigger('change');
            //     $('#pricetype').val(response.pricetype);
            //     $('#burstable').bootstrapSwitch('state', response.burstable == "1");
            //     $('#latency').bootstrapSwitch('state', response.latency == "1");
            //     $('#SLA').bootstrapSwitch('state', response.SLA == "1");
            //     $('#azbackup').val(response.azbackup);
            //     $('#dr').bootstrapSwitch('state', response.dr == "1");
            //     $('#tempstoragegb').val(response.tempstoragegb);
            //     console.log(response);
            // })
                $('#modal-require').modal('show');
        }
    </script>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header row">
                        <div class="col-10">
                            <h3 class="card-title">Virtual Machine Requirement Classification</h3>
                        </div>
                        {{--                        <div class="col-2">--}}
                        {{--                            <button type="button" class="btn btn-block btn-info btn-sm"--}}
                        {{--                                    data-toggle="modal" data-target="#modal-lg">Add Virtual Machine--}}
                        {{--                            </button>--}}
                        {{--                        </div>--}}
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="requireTable" class="table table-bordered table-striped" width="100%">
                            <thead>
                            <tr>
                                <th></th>
                                <th>VM Name</th>
                                <th>Cluster Name</th>
                                <th>Operating System</th>
                                <th>Nic Count</th>
                                <th>CPU Count</th>
                                <th>Disk Count</th>
                                <th>Disk Total Size</th>
                                <th>Region</th>
                                <th>Billing Model</th>
                                <th>Hours on per dag</th>
                                <th>Burstable</th>
                                <th>Latency Sensitive</th>
                                <th>Service Level Agreement</th>
                                <th>Backup retension(months)</th>
                                <th>Disaster Recovery</th>
                                <th>Temp storage need(GB)</th>
                            </tr>
                            </thead>
{{--                            <tbody>--}}
{{--                            @foreach($vms as $key => $data)--}}
{{--                                <tr @if($key%2 == 0) class="odd" @else class="even" @endif>--}}
{{--                                    <td>--}}
{{--                                        <button type="button" class="btn btn-block btn-success btn-sm"--}}
{{--                                                onclick="require_edit('{{$data->vmid}}')">--}}
{{--                                            <i class="fas fa-edit"></i>Edit--}}
{{--                                        </button>--}}
{{--                                    </td>--}}
{{--                                    <td>{{$key+1}}</td>--}}
{{--                                    <td>{{$data->vmname}}</td>--}}
{{--                                    <td>{{$data->hvclustername}}</td>--}}
{{--                                    <td><b>{{$data->vmoperatingsystem}}</b></td>--}}
{{--                                    <td>{{ $data->vmniccount}}</td>--}}
{{--                                    <td>{{ $data->vmproccount}}</td>--}}
{{--                                    <td>{{ $data->vmdiskcount}}</td>--}}
{{--                                    <td>{{ $data->vmtotaldisksizegb}}</td>--}}
{{--                                    <td>{{ $data->region}}</td>--}}
{{--                                    <td>{{ $data->pricetype}}</td>--}}
{{--                                    <td>{{ $data->pricetype}}</td>--}}
{{--                                    <td>{{ ($data->burstable) ? 'Yes' : 'No'}}</td>--}}
{{--                                    <td>{{ ($data->latency) ? 'Yes' : 'No'}}</td>--}}
{{--                                    <td>{{ ($data->SLA) ? 'Yes' : 'No'}}</td>--}}
{{--                                    <td>{{ $data->azbackup}}</td>--}}
{{--                                    <td>{{ ($data->dr) ? 'Yes' : 'No'}}</td>--}}
{{--                                    <td>{{ $data->tempstoragegb}}</td>--}}
{{--                                </tr>--}}
{{--                            @endforeach--}}
{{--                            </tbody>--}}
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-require" aria-hidden="true">
        <form role="form" name="addUserForm" method="post" action="{{route('vmreq.edit')}}" novalidate="novalidate">
            @csrf
            <input type="hidden" value="" name="vmid" id="vmid">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Virtual Machine</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
{{--                            <div class="row">--}}
{{--                                <div class="form-group col-3">--}}
{{--                                    <label for="vmname">VM Name</label>--}}
{{--                                    <input type="text" class="form-control" id="vmname" readonly>--}}
{{--                                </div>--}}
{{--                                <div class="form-group col-3">--}}
{{--                                    <label for="hvclustername">Cluster name</label>--}}
{{--                                    <input type="text" class="form-control" id="hvclustername" readonly>--}}
{{--                                </div>--}}
{{--                                <div class="form-group col-5">--}}
{{--                                    <label for="vmoperatingsystem">Operating system</label>--}}
{{--                                    <input type="text" class="form-control" id="vmoperatingsystem" readonly>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="row">--}}
{{--                                <div class="form-group col-3">--}}
{{--                                    <label for="vmniccount">NIC Count</label>--}}
{{--                                    <input type="text" class="form-control" id="vmniccount" readonly>--}}
{{--                                </div>--}}
{{--                                <div class="form-group col-3">--}}
{{--                                    <label for="vmproccount">CPU Count</label>--}}
{{--                                    <input type="text" class="form-control" id="vmproccount" readonly>--}}
{{--                                </div>--}}
{{--                                <div class="form-group col-3">--}}
{{--                                    <label for="vmoperatingsystem">Disk Count</label>--}}
{{--                                    <input type="text" class="form-control" id="vmdiskcount" readonly>--}}
{{--                                </div>--}}
{{--                                <div class="form-group col-3">--}}
{{--                                    <label for="vmtotaldisksizegb">Disks total size</label>--}}
{{--                                    <input type="text" class="form-control" id="vmtotaldisksizegb" readonly>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="row">
                                <div class="form-group col-4">
                                    <label for="region">Region</label>
                                    <select class="form-control select2" id="regionSelect" name="region"
                                            style="width: 100%;">
                                    </select>
                                </div>
                                <div class="form-group col-5">
                                    <label for="pricetype">Billing model</label>
                                    <select class="form-control" id="pricetype" style="width: 100%;" name="pricetype">
                                        <option>Pay-as-you-Go</option>
                                        <option>Azure Hybrid Use Benefit</option>
                                        <option>1 Year Reserved Instance</option>
                                        <option>3 Year Reserved Instance</option>
                                        <option>1 Year Reserved Instance with AHUB</option>
                                        <option>3 Year Reserved Instance with AHUB</option>
                                    </select>
                                </div>
                                <div class="form-group col-3">
                                    <label for="vmtotaldisksizegb">Hours on per dag</label>
                                    <input type="number" class="form-control" id="pricetype">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-3">
                                    <label for="burstable">Burstable</label>
                                    <input type="checkbox" name="burstable" id="burstable" data-on-text="Yes"
                                           data-off-text="No" checked data-bootstrap-switch>
                                </div>
                                <div class="form-group col-4">
                                    <label for="latency">Latency Sensitive</label>
                                    <input type="checkbox" name="latency" id="latency" data-on-text="Yes"
                                           data-off-text="No" checked data-bootstrap-switch>
                                </div>
                                <div class="form-group col-5">
                                    <label for="latency">Service Level Agreement</label>
                                    <input type="checkbox" name="SLA" id="SLA" data-on-text="Yes" data-off-text="No"
                                           checked data-bootstrap-switch>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-4">
                                    <label for="azbackup">Backup retention (months)</label>
                                    <input type="number" class="form-control" id="azbackup" name="azbackup">
                                </div>
                                <div class="form-group col-3">
                                    <label for="dr">Disaster Recovery</label>
                                    <input type="checkbox" name="dr" id="dr" data-on-text="Yes" data-off-text="No"
                                           checked data-bootstrap-switch>
                                </div>
                                <div class="form-group col-5">
                                    <label for="tempstoragegb">Temp storage need (GB)</label>
                                    <input type="number" class="form-control" id="tempstoragegb" name="tempstoragegb">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
        </form>
        <!-- /.modal-dialog -->
    </div>

@endsection
