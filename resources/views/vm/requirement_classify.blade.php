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
                                <th>Hours on per dag</th>
                                <th>Burstable</th>
                                <th>Latency Sensitive</th>
                                <th>Service Level Agreement</th>
                                <th>Backup retension(months)</th>
                                <th>Disaster Recovery</th>
                                <th>Temp storage need(GB)</th>
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
                        <option>Pay-as-you-Go</option>
                        <option>Azure Hybrid Use Benefit</option>
                        <option>1 Year Reserved Instance</option>
                        <option>3 Year Reserved Instance</option>
                        <option>1 Year Reserved Instance with AHUB</option>
                        <option>3 Year Reserved Instance with AHUB</option>
                    </select>
                </div>
                <div class="form-group row col-12">
                    <label for="vmtotaldisksizegb">Hours on per dag</label>
                    <input type="number" class="form-control" id="pricetype">
                </div>
                <div class="form-group row col-12">
                    <label for="burstable" class="mr-1">Burstable</label>
                    <input type="checkbox" name="burstable" id="burstable" data-on-text="Yes"
                           data-off-text="No" checked data-bootstrap-switch>
                </div>
                <div class="form-group row col-12">
                    <label for="latency" class="mr-1">Latency Sensitive</label>
                    <input type="checkbox" name="latency" id="latency" data-on-text="Yes"
                           data-off-text="No" checked data-bootstrap-switch>
                </div>
                <div class="form-group row col-12">
                    <label for="latency" class="mr-1">Service Level Agreement</label>
                    <input type="checkbox" name="SLA" id="SLA" data-on-text="Yes" data-off-text="No"
                           checked data-bootstrap-switch>
                </div>
                <div class="form-group row col-12">
                    <label for="azbackup">Backup retention (months)</label>
                    <input type="number" class="form-control" id="azbackup" name="azbackup">
                </div>
                <div class="form-group row col-12">
                    <label for="dr" class="mr-1">Disaster Recovery</label>
                    <input type="checkbox" name="dr" id="dr" data-on-text="Yes" data-off-text="No"
                           checked data-bootstrap-switch>
                </div>
                <div class="form-group row col-12">
                    <label for="tempstoragegb">Temp storage need (GB)</label>
                    <input type="number" class="form-control" id="tempstoragegb" name="tempstoragegb">
                </div>
                <div class="row justify-content-between" style="margin-bottom:50px;">
                    <button type="button" class="btn btn-default ml-2">Close</button>
                    <button type="button" class="btn btn-primary mr-2" id="bulkSaveBtn">Save changes</button>
                </div>
            </form>
        </div>
    </div>
@endsection
