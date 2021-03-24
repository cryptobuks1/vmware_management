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
        function require_edit() {
            document.getElementById("bulkEditDiv").style.width = "350px";
        }
        function closeNav(){
            document.getElementById("bulkEditDiv").style.width = "0";
        }
        function donot_migrate(vmid) {
            if(!confirm('Do you want to set this vm do not migrate?'))
                return;
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/vm/donot_migrate',
                data: {vmid : vmid},
                success: function () {
                    $('#requireTable').DataTable().ajax.reload();
                }
            });
        }
    </script>
    <div class="container-fluid" id="main">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header row">
                        <div class="col-10">
                            <h3 class="card-title">Virtual Machine Requirement Classification</h3>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="max-height: 80%;">
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
                                <th>Hours on per day</th>
                                <th>Burstable</th>
                                <th>Latency Sensitive</th>
                                <th>Service Level Agreement</th>
                                <th>Backup retension(months)</th>
                                <th>Disaster Recovery</th>
                                <th>Temp storage need(GB)</th>
                                <th>Don't migrate</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
    <div id="bulkEditDiv" class="editpanel">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <div class="container">
            <form role="form" id="builEditForm" method="post" action="{{route('vmreq.edit')}}" novalidate="novalidate">
                @csrf
                <div class="form-group row col-12">
                    <label for="region">Region</label>
                    <select class="form-control select2" id="regionSelect" name="region"
                            style="width: 100%;">
                    </select>
                </div>
                <div class="form-group row col-12">
                    <label for="pricetype">Billing model</label>
                    <select class="form-control" id="pricetype" style="width: 100%;" name="pricetype">
                        <option></option>
                        <option value="payg">Pay-as-you-Go</option>
                        <option value="spot">Spot</option>
                        <option value="ahb">Azure Hybrid Use Benefit</option>
                        <option value="ahboneyear">1 Year Reserved Instance</option>
                        <option value="ahbthreeyear">3 Year Reserved Instance</option>
                        <option value="ahbspot">Spot with AHUB</option>
                        <option value="oneyear">1 Year Reserved Instance with AHUB</option>
                        <option value="threeyear">3 Year Reserved Instance with AHUB</option>
                    </select>
                </div>
                <div class="form-group row col-12">
                    <label for="vmtotaldisksizegb">Hours on per day</label>
                    <input type="number" class="form-control" id="pricetype">
                </div>
                <div class="form-group row col-12">
                    <label for="burstable" class="mr-1">Burstable</label>
                    <select class="form-control" id="burstable" name="burstable">
                        <option></option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <div class="form-group row col-12">
                    <label for="latency" class="mr-1">Latency Sensitive</label>
                    <select class="form-control" id="latency" name="latency">
                        <option></option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <div class="form-group row col-12">
                    <label for="SLA" class="mr-1">Service Level Agreement</label>
                    <select class="form-control" id="SLA" name="SLA">
                        <option></option>
                        <option value="99.9">99.9%</option>
                        <option value="99.5">99.5%</option>
                        <option value="99">99%</option>
                    </select>
                </div>
                <div class="form-group row col-12">
                    <label for="backupretdays">Backup retention (months)</label>
                    <input type="number" class="form-control" id="backupretdays" name="backupretdays">
                </div>
                <div class="form-group row col-12">
                    <label for="dr" class="mr-1">Disaster Recovery</label>
                    <select class="form-control" id="dr" name="dr">
                        <option></option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <div class="form-group row col-12">
                    <label for="tempstoragegb">Temp storage need (GB)</label>
                    <input type="number" class="form-control" id="tempstoragegb" name="tempstoragegb">
                </div>
                <div class="row justify-content-between" style="margin-bottom:80px;">
                    <button type="button" class="btn btn-default ml-2" onclick="closeNav();">Close</button>
                    <button type="button" class="btn btn-primary mr-2" id="bulkSaveBtn">Save changes</button>
                </div>
            </form>
        </div>
    </div>
@endsection
