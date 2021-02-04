@extends('admin.layout.master')
@section('css')

@stop
@section('body')
    <div class="row">


        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title ">Transactions Section</h3>
                <div class="tile-body">
                    <form role="form" method="POST" action="{{route('general.store')}}">
                        {{ csrf_field() }}
                        <div class="form-body">
                            <div class="form-group">
                                <label><strong>Title</strong></label>
                                <input type="text" name="transaction_title" class="form-control" value="{{$general->transaction_title}}">
                            </div>

                            <div class="form-group">
                                <label><strong>Sub-Title</strong></label>
                                <input type="text" name="transaction_sub_title" class="form-control" value="{{$general->transaction_sub_title}}">
                            </div>

                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary btn-block btn-lg">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title ">Road Map Section</h3>
                <div class="tile-body">
                    <form role="form" method="POST" action="{{route('general.store')}}">
                        {{ csrf_field() }}
                        <div class="form-body">
                            <div class="form-group">
                                <label><strong>Title</strong></label>
                                <input type="text" name="referral_title" class="form-control" value="{{$general->referral_title}}">
                            </div>

                            <div class="form-group">
                                <label><strong>Sub-Title</strong></label>
                                <input type="text" name="referral_sub_title" class="form-control" value="{{$general->referral_sub_title}}">
                            </div>

                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary btn-block btn-lg">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title ">STO Calender</h3>
                <div class="tile-body">
                    <form role="form" method="POST" action="{{route('general.store')}}">
                        {{ csrf_field() }}
                        <div class="form-body">
                            <div class="form-group">
                                <label><strong>Title</strong></label>
                                <input type="text" name="payment_title" class="form-control" value="{{$general->payment_title}}">
                            </div>

                            <div class="form-group">
                                <label><strong>Sub-Title</strong></label>
                                <input type="text" name="payment_sub_title" class="form-control" value="{{$general->payment_sub_title}}">
                            </div>

                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary btn-block btn-lg">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title ">Newsletter Section</h3>
                <div class="tile-body">
                    <form role="form" method="POST" action="{{route('general.store')}}">
                        {{ csrf_field() }}
                        <div class="form-body">
                            <div class="form-group">
                                <label><strong>Title</strong></label>
                                <input type="text" name="newsletter_title" class="form-control" value="{{$general->newsletter_title}}">
                            </div>

                            <div class="form-group">
                                <label><strong>Sub-Title</strong></label>
                                <input type="text" name="newsletter_sub_title" class="form-control" value="{{$general->newsletter_sub_title}}">
                            </div>

                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary btn-block btn-lg">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop
@section('script')

@stop
