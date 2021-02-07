@extends('user.layout.master')

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">

                <div class="row">

                    <div class="col-md-6">
                        <form class="form-inline" method="get" action="{{route('user.search.email')}}">
                            <div class="form-group  mb-2">
                                <label class="sr-only">Email Address</label>
                                <input type="email" class="form-control" name="email" placeholder="Email Address">
                            </div>

                            <button type="submit" class="btn btn-primary mb-2">Search</button>
                        </form>

                    </div>


                    <div class="col-md-6">
                        <form class="form-inline" method="get" action="{{route('user.search.username')}}">
                            <div class="form-group mb-2">
                                <label class="sr-only">Username</label>
                                <input type="text" class="form-control" name="username" placeholder="Username">
                            </div>

                            <button type="submit" class="btn btn-primary mb-2">Search</button>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">

            @if (count($errors) > 0)
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong class="col-md-12"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                                Alert!</strong>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            <div class="tile">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th> No</th>
                            <th>VM Name</th>
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
                            <th> Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($vm as $key => $data)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$data->vmname}}</td>
                                <td>{{$data->hvclustername}}</td>
                                <td><b>{{$data->vmoperatingsystem}}</b></td>
                                <td>{{ $data->vmniccount}}</td>
                                <td>{{ $data->vmproccount}}</td>
                                <td>{{ $data->vmdiskcount}}</td>
                                <td>{{ $data->vmtotaldisksizegb}}</td>
{{--                                <td>{{ $data->region}}</td>--}}
                                <td>
                                    <a class="btn btn-primary" href="{{route('user.view', $data->vmid)}}"><i
                                            class="fa fa-desktop"></i> View Detail</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
{{--                {{$user->links()}}--}}
            </div>
        </div>
    </div>
@endsection
@section('script')

@stop
