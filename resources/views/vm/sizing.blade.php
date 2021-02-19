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
    <div class="container-fluid" id="main">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header row">
                        <div class="col-10">
                            <h3 class="card-title">Virtual Machine Sizing</h3>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="max-height: 80%;">
                        <table id="sizingTable" class="table table-bordered table-striped" width="100%">
                            <thead>
                            <tr>
                                <th></th>
                                <th style="width: 150px;">VM Name</th>
                                <th>Nic Count</th>
                                <th>CPU Count</th>
                                <th>Disk Count</th>
                                <th>Disk Total Size</th>
                                <th>Burstable</th>
                                <th>Temp storage need(GB)</th>
                                <th>Azure VM Size</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($vms as $key=>$vm)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$vm->vmname}}</td>
                                    <td>{{$vm->vmniccount}}</td>
                                    <td>{{$vm->vmproccount}}</td>
                                    <td>{{$vm->vmdiskcount}}</td>
                                    <td>{{$vm->vmtotaldisksizegb}}</td>
                                    <td>{{($vm->burstable == 0) ? 'No' : 'Yes'}}</td>
                                    <td>{{$vm->tempstoragegb}}</td>
                                    <td>{{$vm->armSkuName}}</td>
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
