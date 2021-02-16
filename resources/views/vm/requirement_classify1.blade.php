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
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <h3 class="card-title col-2">Virtual Machine List</h3>
                            <div class="card-tools col-8">
                                <div class="input-group input-group-sm" style="width: 200px;">
                                    <input type="text" name="table_search" class="form-control float-right"
                                           placeholder="Search">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-tools col">
                                <button type="button" style="width: 100px;" class="btn btn-block btn-info btn-sm"
                                        data-toggle="modal" data-target="#modal-lg">Add User
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" style="height: 70vh;">
                        <table class="table table-head-fixed text-nowrap">
                            <thead>
                            <tr>
                                <th></th>
                                <th> No</th>
                                <th>VM Name</th>
                                <th>Nic Count</th>
                                <th>CPU Count</th>
                                <th>Disk Count</th>
                                <th>Disk Total Size</th>
                                <th>Region</th>
{{--                                <th>Billing Model</th>--}}
{{--                                <th>Hours on per dag</th>--}}
{{--                                <th>Burstable</th>--}}
{{--                                <th>Latency Sensitive</th>--}}
{{--                                <th>Service Level Agreement</th>--}}
{{--                                <th>Backup retension(months)</th>--}}
{{--                                <th>Disaster Recovery</th>--}}
{{--                                <th>Temp storage need(GB)</th>--}}
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($vms as $key => $data)
                                <tr @if($key%2 == 0) class="odd" @else class="even" @endif>
                                    <td>
                                        <button type="button" class="btn btn-block btn-success btn-sm">
                                            <i class="fas fa-edit"></i>Edit
                                        </button>
                                    </td>
                                    <td>{{$key+1}}</td>
                                    <td>{{$data->vmname}}</td>
                                    <td>{{$data->hvclustername}}</td>
                                    <td><b>{{$data->vmoperatingsystem}}</b></td>
                                    <td>{{ $data->vmniccount}}</td>
                                    <td>{{ $data->vmproccount}}</td>
                                    <td>{{ $data->vmdiskcount}}</td>
                                    <td>{{ $data->vmtotaldisksizegb}}</td>
                                    {{--                                <td>{{ $data->region}}</td>--}}
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
    <div class="modal fade" id="modal-lg" aria-hidden="true">
        <form role="form" name="addUserForm" method="post" action="{{route('users.save')}}" novalidate="novalidate">
            @csrf
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add User</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="username">User Name</label>
                                <input type="text" class="form-control" name="username" placeholder="Enter Full Name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" name="email" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="confirmed">Confirmed Password</label>
                                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirmed Password">
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
