@extends('layouts.master')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/custom.css')}}">
@stop
@section('content')
    @include('layouts.balance_show')

    <section class="faq-area pranto-trans-aria" >
        <div class="container">

            <div class="row">


                @foreach($all_plan as $key => $data)
                    <div class="col-md-4">
                        <div class='wrapper grid-container grid-x grid-margin-x align-top align-justify'>
                            <div class='package small-12 medium-4 cell'>
                                <div class='package-name'>{{__($data->name)}}</div><hr>
                                <div class='package-name'>
                                    <img style="max-width: 180px" src="{{asset('assets/images/sto/'.$data->image)}}">
                                </div><hr>
                                <div class='package-price scale'>@lang('Price') :{{__($general->currency_sym)}}{{__($data->price)}}</div>
                                <div class='package-trial'>@lang('Available') : {{$data->amount - $data->sold}}</div>
                                <hr>
                                <ul class="package-list">

                                    <li>
                                        <strong>@lang('Start Date') : {{$data->start_date}}</strong>
                                    </li>

                                    <li>
                                        <strong>@lang('End Date') : {{$data->end_date}}</strong>
                                    </li>

                                    <li>
                                        <strong>@lang('Total Amount To Sell') : {{$data->amount}}</strong>
                                    </li>

                                    <li>
                                        <strong>@lang('Grow') : {{__($data->grow)}}%</strong>/ @lang('Every') {{$data->times}} @lang('Hours')
                                    </li>

                                </ul>
                                <div class="select">
                                    @if($data->status == 1)
                                        <a class="button primary scale pranto-anchor-plan" href="{{route('user.deposit')}}">@lang('Running') <img style="width: 30px;" src="{{asset('assets/images/coming.gif')}}"></a>
                                    @elseif($data->status == 2)
                                        <a class="button primary scale pranto-anchor-plan" style="color: #fff;" >@lang('Complete')</a>
                                    @else
                                        <a class="button primary scale pranto-anchor-plan" style="color: #fff;" disabled="">@lang('Up coming') <img style="width: 30px;" src="{{asset('assets/images/load.gif')}}"></a>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection

@section('script')


@stop

