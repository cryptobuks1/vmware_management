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
                            <h3 class="card-title">Unsupported VMs</h3>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="max-height: 80%;">
                        <table id="unsupportedTable" class="table table-bordered table-striped" width="100%">
                            <thead>
                            <tr>
                                <th width="50px"></th>
                                <th width="150px">VM Name</th>
                                <th>Unsupported Reason</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($vms as $key=>$vm)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$vm->vmname}}</td>
                                    <td>{{$vm->unsupportedreason}}</td>
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
