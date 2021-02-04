@extends('admin.layout.master')
@section('css')

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
@stop
@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <i class="icon fa fa-users"></i> Users Statistics
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-3">
                            <a href="{{url('admin/active/users')}}" style="text-decoration: none">
                                <div class="widget-small primary"><i class="icon fa fa-user-circle-o fa-3x"></i>
                                    <div class="info">
                                        <h4>Total Active Users</h4>
                                        <p><b>{{\App\User::where('status',1)->count()}}</b></p>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-3">
                            <a href="{{url('admin/deactive/users')}}" style="text-decoration: none">
                                <div class="widget-small danger"><i class="icon fa fa-user-times fa-3x"></i>
                                    <div class="info">
                                        <h4>Total Deactive Users</h4>
                                        <p><b>{{\App\User::where('status',0)->count()}}</b></p>
                                    </div>
                                </div>
                            </a>
                        </div>


                        <div class="col-md-3">
                            <a href="{{route('total.email.verified')}}" style="text-decoration: none">
                                <div class="widget-small info"><i class="icon fa fa-envelope fa-3x"></i>
                                    <div class="info">
                                        <h4>Total Email Unverified User</h4>
                                        <p><b>{{\App\User::where('emailv', 0)->count()}}</b></p>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-3">
                            <a href="{{route('total.sms.verified')}}" style="text-decoration: none">
                                <div class="widget-small warning"><i class="icon fa fa-phone fa-3x"></i>
                                    <div class="info">
                                        <h4>Total Sms Unverified User</h4>
                                        <p><b>{{\App\User::where('smsv', 0)->count()}}</b></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('script')

@stop
