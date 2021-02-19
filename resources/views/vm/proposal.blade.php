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
        function accept_proposal(vmid) {
            alert(vmid);
        }
        function deny_proposal(vmid){
            alert(vmid);
        }
    </script>
    <div class="container-fluid" id="main">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header row">
                        <div class="col-10">
                            <h3 class="card-title">Virtual Machine Config Change Proposal</h3>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="max-height: 80%;">
                        <table id="proposalTable" class="table table-bordered table-striped" width="100%">
                            <thead>
                            <tr>
                                <th></th>
                                <th>VM Name</th>
                                <th>Nic Count</th>
                                <th>CPU Count</th>
                                <th>Proposed CPU Count</th>
                                <th>VM Disk Count</th>
                                <th>Proposed Disk Count</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($vms as $key=>$vm)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$vm->vmname}}</td>
                                    <td>{{$vm->vmniccount}}</td>
                                    <td>{{$vm->vmproccount}}</td>
                                    <td>{{$vm->pvmproccount}}</td>
                                    <td>{{$vm->vmdiskcount}}</td>
                                    <td>{{$vm->pvmdiskcount}}</td>
                                    <td style="width: 150px;">
                                        <button class="btn-primary" onclick="accept_proposal('{{$vm->vmid}}')">Accept</button> |
                                        <button class="btn-warning" onclick="deny_proposal('{{$vm->vmid}}')">Deny</button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection
