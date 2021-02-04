@extends('admin.layout.master')

@section('body')
    <div class="row">
        <div class="col-md-12">
            @if (count($errors) > 0)
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong class="col-md-12"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Alert!</strong>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            <div class="tile">
                <div class="tile-body">


                    <form role="form" method="POST" action="{{route('general.store')}}">
                        {{ csrf_field() }}

                        <div class="row">

                            <div class="col-md-6 card">
                                <div class="card-header text-center">

                                    <h4>Road Map Content 1</h4>

                                </div>
                                <div class="card-body">

                                    <div class="form-group">
                                        <strong>Title:</strong>
                                        <input type="text" class="form-control" name="static_title_1" value="{{$general->static_title_1}}">
                                    </div>

                                    <div class="form-group">
                                        <strong>Detail:</strong>
                                        <input class="form-control" type="text" value="{{$general->static_number_1}}" name="static_number_1">
                                    </div>

                                </div>
                            </div>


                            <div class="col-md-6 card">
                                <div class="card-header text-center">

                                    <h4>Road Map Content 2</h4>

                                </div>
                                <div class="card-body">

                                    <div class="form-group">
                                        <strong>Title:</strong>
                                        <input type="text" class="form-control" name="static_title_2" value="{{$general->static_title_2}}">
                                    </div>

                                    <div class="form-group">
                                        <strong>Detail:</strong>
                                        <input class="form-control" type="text" value="{{$general->static_number_2}}" name="static_number_2">
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-6 card">
                                <div class="card-header text-center">

                                    <h4>Road Map Content 3</h4>

                                </div>
                                <div class="card-body">

                                    <div class="form-group">
                                        <strong>Title:</strong>
                                        <input class="form-control" type="text" name="static_title_3" value="{{$general->static_title_3}}">
                                    </div>

                                    <div class="form-group">
                                        <strong>Detail:</strong>
                                        <input class="form-control" type="text" value="{{$general->static_number_3}}" name="static_number_3">
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-6 card">
                                <div class="card-header text-center">

                                    <h4>Road Map Content 4</h4>

                                </div>
                                <div class="card-body">

                                    <div class="form-group">
                                        <strong>Title:</strong>
                                        <input class="form-control" type="text"  name="static_icon_1" value="{{$general->static_icon_1}}">
                                    </div>

                                    <div class="form-group">
                                        <strong>Detail:</strong>
                                        <input class="form-control" type="text" name="static_icon_2" value="{{$general->static_icon_2}}">
                                    </div>


                                </div>
                            </div>


                        </div>

                        <div class="row">
                            <div class="form-actions right col-md-12">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Update</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@stop

