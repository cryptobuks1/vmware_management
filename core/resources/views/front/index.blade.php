@extends('layouts.master')

@section('content')
    <!-- header area start  -->
    <header class="header-area header-bg" style="background: url({{asset('assets/images/banner.png')}});width: 100%" id="home">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 col-sm-12">
                    <div class="left-content">
                        <h1 class="wow slideInDown">{{__($general->banner_title)}}</h1>
                        <p class="wow slideInUp">{{__($general->banner_sub_title)}}</p>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12">
                    <div class="right-content wow slideInLeft">

                            <div class="invest-box-wrapper">
                                <h3>{{__($plan->name)}}</h3>

                                <ul class="list-group">
                                    <li class="list-group-item"><img style="max-width: 180px" src="{{asset('assets/images/sto/'.$plan->image)}}"></li>
                                    <li class="list-group-item">
                                        <strong style="color: #fff">@lang('Time Left')</strong><br>
                                        <div id="clockdiv">

                                        @php
                                        $seconds = Carbon\Carbon::now()->diffInSeconds($plan->end_date);
                                        $day = $seconds/(24*3600);
                                        @endphp
                                            <div>
                                                <span class="days" data-days="{{$day}}"></span>
                                                <div class="smalltext">@lang('Days')</div>
                                            </div>
                                            <div>
                                                <span class="hours" data-hours="24"></span>
                                                <div class="smalltext">@lang('Hours')</div>
                                            </div>
                                            <div>
                                                <span class="minutes" data-minutes="60"></span>
                                                <div class="smalltext">@lang('Minutes')</div>
                                            </div>
                                            <div>
                                                <span class="seconds" data-seconds="60"></span>
                                                <div class="smalltext">@lang('Seconds')</div>
                                            </div>
                                        </div>

                                    </li>
                                    <li class="list-group-item">
                                        <strong style="color: #fff">@lang('Growth') {{$plan->grow}}% / {{$plan->times}} @lang('Hours')</strong>
                                    </li>
                                    <li class="list-group-item">
                                        <strong style="color: #fff"> @lang('Sold'): {{round(($plan->sold/$plan->amount)*100, 2)}}% </strong>
                                        <div class="progress" style="margin: 10px">
                                            <div class="progress-bar  progress-bar-striped progress-bar-animated" role="progressbar" style="width: {{round(($plan->sold/$plan->amount)*100, 2)}}%" aria-valuenow="{{round(($plan->sold/$plan->amount)*100, 2)}}" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <a class="pranto-anchor" href="">@lang('Buy Now')</a>
                                    </li>
                                </ul>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header area end  -->
    <!-- trusted source area start -->
    <div class="trusted-source-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="left-content">
                        <h6>@lang('We Accept')</h6>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="right-content">
                        <div class="brand-logo-carousel" id="logo-carousel-header">
                            @foreach($method as $data)
                            <div class="singl-brand-logo">
                                <img style="max-width: 160px" src="{{asset('assets/images/gateway/'.$data->id.'.jpg')}}" alt="">
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- trusted source area end -->

    <!-- double your coin start -->
    <section class="double-your-coin-area" id="service">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="section-title">
                        <h2>{{__($general->service_title)}}</h2>
                        <p>{{__($general->service_sub_title)}}</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-between">
                @foreach($service as $data)
                <div class="col-lg-6">
                    <div class="single-coin-box yellow wow  slideInLeft">
                        <div class="icon">
                            <i class="fa fa-{{$data->icon}}"></i>
                        </div>
                        <div class="content">
                            <h4>{{__($data->title)}}</h4>
                            <p>{{__($data->detail)}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- double your coin end -->

    <!-- deposit area start  -->
    <section class="deposit-area"  id="about">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 remove-col-padding">
                    <div class="total-deposit deposit-bg text-center">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="about-right-img">
                                        <img src="{{asset('assets/images/about.jpg')}}" alt="about right image">
                                        <div class="hover">
                                            <a href="{{$general->about_video_link}}" class="video-play-btn mfp-iframe">
                                                <i class="fa fa-play" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <h3 class="text-left">{{__($general->about_title)}}</h3>
                                    <p class="text-left">{{ __($general->about_detail) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- deposit area end -->

    <!-- why choose us area start -->
    <section class="why-us-area" id="affilate">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="section-title">
                        <h2>{{__($general->how_it_work_title)}}</h2>
                        <p>{{__($general->how_it_work_sub_title)}}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-xs-12">
                    <div class="right-content">
                        <div class="row">
                            @foreach($howitwork as $data)
                            <div class="col-lg-6 col-md-6">
                                <div class="singl-why-us-box yellow">
                                    <div class="icon">
                                        <i class="fa fa-{{$data->icon}}"></i>
                                    </div>
                                    <div class="content">
                                        <div class="header">
                                            <h4>{{__($data->title)}}</h4>
                                        </div>
                                        <p>{{__($data->detail)}}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- why choose us area end -->

    <!-- all transaction area start -->
    <div class="all-transation-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="section-title">
                        <h2>{{__($general->transaction_title)}}</h2>
                        <p>{{__($general->transaction_sub_title )}}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 ">
                    <div class="tab-navbar-area">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link yellow active" data-toggle="tab" href="#deposit">
                                    <h4>@lang('Deposit')
                                        <span class="number">{{\App\Deposit::whereStatus(1)->count()}}</span>
                                    </h4>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link red" data-toggle="tab" href="#payout-tab">
                                    <h4>@lang('Payout')
                                        <span class="number">{{\App\Withdraw::whereStatus(1)->count()}}</span>
                                    </h4>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content-area">
                        <div class="tab-content">
                            <div id="deposit" class="deposit tab-pane active ">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">@lang('Transaction Id')</th>
                                        <th scope="col">@lang('Name')</th>
                                        <th scope="col">@lang('Amount')</th>
                                        <th scope="col">@lang('Currency')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($latest_deposit as $data)
                                        <tr>
                                            <td>{{__($data->trx)}}</td>
                                            <td>{{$data->user->name}}</td>
                                            <td>{{$general->currency_sym}}{{$data->amount}}</td>
                                            <td>{{__($data->gateway->name)}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div id="payout-tab" class="payout tab-pane fade">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">@lang('Transaction Id')</th>
                                        <th scope="col">@lang('Name')</th>
                                        <th scope="col">@lang('Amount')</th>
                                        <th scope="col">@lang('Currency')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($latest_withdaw as $data)
                                        <tr>
                                            <td>{{$data->withdraw_id}}</td>
                                            <td>{{ $data->user->name}}</td>
                                            <td>{{$general->currency_sym}}{{$data->amount}}</td>
                                            <td>{{__($data->withdraw_method->name)}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- all transaction area end -->

    <!-- clients feedbacks area start -->
    <section class="clients-feedbacks-area" id="testimonial">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="section-title">
                        <h2>{{__($general->test_title)}}</h2>
                        <p>{{__($general->test_sub_title)}}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="testimonial-carousel" id="testimonial-carousel">
                        @foreach($test as $data)
                        <div class="single-testimonial-item">
                            <div class="content">
                                <p>{{__($data->comment)}}</p>
                                <h6> - {{__($data->name)}},<small>{{__($data->company)}}</small> </h6>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- clients feedbacks area end -->
    <!-- faq area start -->
    <section class="faq-area" id="faq">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="section-title">
                        <h2>{{__($general->faq_title)}}</h2>
                        <p>{{__($general->faq_sub_title)}}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($faq as $key => $data)
                    @if($key++ % 2)
                        <div class="col-lg-6">
                            <div id="accordion{{$data->id}}" class="accordion-wrapper">
                                <div class="card">
                                    <div class="card-header" id="headingOne{{$data->id}}">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne{{$data->id}}" aria-expanded="false" aria-controls="collapseOne">
                                                {{__($data->title)}}
                                            </button>
                                        </h5>
                                    </div>

                                    <div id="collapseOne{{$data->id}}" class="collapse" aria-labelledby="headingOne{{$data->id}}" data-parent="#accordion{{$data->id}}">
                                        <div class="card-body">
                                            {{__($data->description)}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-lg-6">
                            <div id="accordion_2{{$data->id}}" class="accordion-wrapper">
                                <div class="card">
                                    <div class="card-header" id="headingTwo_2{{$data->id}}">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo_2{{$data->id}}" aria-expanded="false" aria-controls="collapseTwo_2">
                                                {{__($data->title)}}
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseTwo_2{{$data->id}}" class="collapse" aria-labelledby="headingTwo_2{{$data->id}}" data-parent="#accordion_2{{$data->id}}">
                                        <div class="card-body">
                                            {{__($data->description)}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
    <!-- faq area end -->


    <!-- clients feedbacks area start -->
    <section class="clients-feedbacks-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="section-title">
                        <h2>{{__($general->team_title)}}</h2>
                        <p>{{__($general->team_sub_title)}}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="testimonial-carousel" id="team-carousel">
                        @foreach($team as $data)
                        <div class="single-testimonial-item">
                            <div class="thumb">
                                <img src="{{asset('assets/images/team/'.$data->image)}}" style="max-width: 120px" alt="testimonial images">
                            </div>
                            <div class="content" style="padding: 65px 40px 30px 40px;">
                                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout
                                    point of using many thinhs.</p>
                                <h6> - {{__($data->name)}}/<small>{{__($data->designation)}}</small></h6>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- clients feedbacks area end -->
    <div class="all-transation-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="section-title">
                        <h2>{{__($general->payment_title)}}</h2>
                        <p>{{__($general->payment_sub_title )}}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 ">
                    <div class="tab-content-area">
                        <div class="tab-content">
                            <div id="deposit" class="deposit tab-pane active ">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">@lang('Start Date')</th>
                                        <th scope="col">@lang('End Date')</th>
                                        <th scope="col">@lang('Quantity')</th>
                                        <th scope="col">@lang('Price')</th>
                                        <th scope="col">@lang('Sold')</th>
                                        <th scope="col">@lang('Status')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($calen)==0)
                                        <tr>
                                            <td colspan="6" class="text-center">@lang('No Data Available')</td>
                                        </tr>
                                    @endif
                                    @foreach($calen as $data)
                                        <tr>
                                            <td>{{$data->start_date}}</td>
                                            <td>{{$data->end_date}}</td>
                                            <td>{{$data->amount}}</td>
                                            <td>{{__($general->currency_sym)}}{{$data->price}}</td>
                                            <td>
                                                <div class="progress" style="margin: 10px">
                                                    <div class="progress-bar  progress-bar-striped progress-bar-animated" role="progressbar" style="width: {{round(($data->sold/$data->amount)*100, 2)}}%" aria-valuenow="{{round(($data->sold/$data->amount)*100, 2)}}" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <p class="text-center">{{round(($data->sold/$data->amount)*100, 2)}}%</p>
                                            </td>
                                            <td>
                                                @if($data->status == 2)
                                                    <span class="badge badge-danger">@lang('Completed')</span>
                                                @elseif($data->status == 0)
                                                    <span class="badge badge-warning">@lang('Upcoming')</span>
                                                @elseif($data->status == 1)
                                                    <span class="badge badge-primary">@lang('Running')</span>
                                                @endif

                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="road-map contact-area" id="map">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <div class="section-title">
                        <h2>{{__($general->referral_title)}}</h2>
                        <p>{{__($general->referral_sub_title)}}</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="road-map-wrapper">
                        <div class="timeline">
                            <div class="timeline-items">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="item">
                                            <div class="item-content">
                                                <div class="item-icon">
                                                </div>
                                                <div class="content">
                                                    <p class="paragraph">
                                                        {{__($general->static_number_1)}}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="author">
                                                <h4>
                                                    {{__($general->static_title_1)}}
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="item">
                                            <div class="item-content">
                                                <div class="item-icon">
                                                </div>
                                                <div class="content">
                                                    <p class="paragraph">
                                                        {{__($general->static_number_2)}}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="author">
                                                <h4>
                                                    {{__($general->static_title_2)}}
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="item">
                                            <div class="item-content">
                                                <div class="item-icon">
                                                </div>
                                                <div class="content">
                                                    <p class="paragraph">
                                                        {{__($general->static_number_3)}}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="author">
                                                <h4>
                                                    {{__($general->static_title_3)}}
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="item">
                                            <div class="item-content">
                                                <div class="item-icon">
                                                </div>
                                                <div class="content">
                                                    <p class="paragraph">
                                                        {{__($general->static_icon_2)}}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="author">
                                                <h4>
                                                    {{__($general->static_icon_1)}}
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!--end time line-->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- contact us area start -->
    <section class="contact-area" >
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="section-title">
                        <h2>@lang($general->newsletter_title)</h2>
                        <p>{{__($general->newsletter_sub_title)}}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact-from-wrapper" id="contact-form-wrapper">

                        <form @submit.prevent="subsribe" >
                            <div class="row">
                                <div class="col-lg-9 col-md-12">
                                    <div class="form-element">
                                        <div class="has-icon">
                                            <input type="email" v-model="newdata.subscribe_email" name="subscribe_email" placeholder="@lang('Enter your email...')">
                                            <div class="the-icon">
                                                <i class="fa fa-envelope"></i>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-3 col-md-12">
                                    <input type="submit" style="margin-top:0; display: block;width: 100%; border-radius: 5px;" value="@lang('Subscribe Now')">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact us area end -->
@stop
@section('script')
<script>
    var app = new Vue({
       el: '#app',
        data:{
          newdata:{
              subscribe_email: ''
          }
        },
        methods:{
            subsribe(){
                var input = this.newdata;
                axios.post('{{route('subscriber.store')}}', input).then(function (res) {
                    if (res.data.success == true){

                        $(document).ready(function () {
                            iziToast.success({
                                title: '{{__('Success!')}}',
                                message: res.data.message,
                            });

                        });

                        app.newdata.subscribe_email = '';
                    }else {
                        $(document).ready(function () {
                            iziToast.error({
                                title: '{{__('Error!')}}',
                                message: res.data.message,
                            });

                        });
                    }
                });
            }
        }
    });
</script>
<script>

    function getTimeRemaining(endtime) {
        var t = Date.parse(endtime) - Date.parse(new Date());
        var seconds = Math.floor((t / 1000) % 60);
        var minutes = Math.floor((t / 1000 / 60) % 60);
        var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
        var days = Math.floor(t / (1000 * 60 * 60 * 24));
        return {
            'total': t,
            'days': days,
            'hours': hours,
            'minutes': minutes,
            'seconds': seconds
        };
    }

    function initializeClock(id, endtime) {
        var clock = document.getElementById(id);
        var daysSpan = clock.querySelector('.days');
        var hoursSpan = clock.querySelector('.hours');
        var minutesSpan = clock.querySelector('.minutes');
        var secondsSpan = clock.querySelector('.seconds');

        function updateClock() {
            var t = getTimeRemaining(endtime);

            daysSpan.innerHTML = t.days;
            hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
            minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
            secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

            if (t.total <= 0) {
                clearInterval(timeinterval);
            }
        }

        updateClock();
        var timeinterval = setInterval(updateClock, 1000);
    }
    var dayData = $('#clockdiv').children().children('.days').data('days');
    var hourData = $('#clockdiv').children().children('.hours').data('hours');
    var minutesData = $('#clockdiv').children().children('.minutes').data('minutes');
    var secondsData = $('#clockdiv').children().children('.seconds').data('seconds');

    console.log(dayData+'--'+hourData+'--'+minutesData+'--'+secondsData);

    var deadline = new Date(Date.parse(new Date()) +  dayData * hourData * minutesData * secondsData  * 1000);
    initializeClock('clockdiv', deadline);

</script>
@stop
