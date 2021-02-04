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
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Withdraw Id</th>
                            <th scope="col">Date</th>
                            <th scope="col">Payment Detail</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Charge</th>
                            <th scope="col">Payable Amount</th>
                            <th scope="col">Processing Time</th>
                            <th scope="col">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($trans as $data)
                            <tr>
                                <td>{{$data->withdraw_id}}</td>
                                <td scope="row">{{date('g:ia \o\n l jS F Y', strtotime($data->created_at))}}</td>
                                <td>{{$data->detail}}</td>
                                <td>{{$general->currency_sym}} {{$data->amount}}</td>
                                <td>{{$general->currency_sym}} {{$data->charge}}</td>
                                <td>{{$data->method_cur_amount}} {{$data->withdraw_method->currency}} - Via {{$data->withdraw_method->name}}</td>
                                <td>{{$data->processing_time}}</td>
                                <td>
                                    @if($data->status == 2)
                                        <label class="btn btn-danger">Reject</label>
                                    @elseif($data->status == 0)
                                        <label class="btn btn-warning">Pending</label>
                                    @elseif($data->status == 1)
                                        <label class="btn btn-success">Complete</label>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{$trans->links()}}
            </div>
        </div>
    </div>
@endsection
@section('script')

@stop
