@extends('layouts.master')

@section('style')

@stop
@section('content')



    <div class="all-transation-area pranto-trans-aria" style="padding-top: 50px">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="section-title">
                        <h2>{{__($pt)}}</h2>
                    </div>
                </div>
            </div>

            @if (Auth::user()->status != '1')
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-8">
                        <div class="section-title text-center">
                            <h2 style="color: #ff3221">@lang('Welcome '){{Auth::user()->name}}, @lang('You have to pay $'.$general->activation_fee.' for active your account')</h2>
                            <p>@lang($general->active_fee_subtitle)</p>
                        </div>
                    </div>
                </div>

                <div class="price">
                    <div class="container">

                        <div class="row">

                            <div class="col-xl-12 col-lg-12 wow pulse">

                                <div class="tab-content" id="myTabContent2">
                                    <div class="tab-pane fade show active" id="monthly" role="tabpanel" aria-labelledby="monthly-tab">
                                        <div class="row">
                                            @foreach($gates as $gate)
                                                <div class="col-xl-3 col-lg-3 col-md-6">
                                                    <div class="single-price special">
                                                        <div class="part-top">
                                                            <h3>@lang('Pay $'.$general->activation_fee.' via '){{__($gate->name)}}</h3>
                                                        </div>
                                                        <div class="part-bottom">
                                                            <ul>
                                                                <li class="list-group-item section-bg-1">
                                                                    <img src="{{asset('assets/images/gateway')}}/{{$gate->id}}.jpg" style="width:100%;"/>
                                                                </li>
                                                            </ul>
                                                            <a data-toggle="modal" style="width:100%;"  data-name="{{__($gate->name)}}" data-gate="{{$gate->id}}" class="depoButton" href="#depoModal">  @lang('Select')</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- price end -->

                <!-- Modal -->
                <div class="modal fade" id="depoModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content text-center">
                            <div class="modal-header">
                                <h5 class="modal-title" id="ModalLabel"></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{route('activation.fee.submit')}}" method="POST">
                                <div class="modal-body">
                                    @csrf
                                    <input type="hidden" name="gateway" id="gateWay"/>
                                    <h5> @lang('Confirm Payment?') </h5>

                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">@lang('Yes')</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('Close')</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


            @elseif(Auth::user()->emailv != '1')
                <div class="row justify-content-center">

                    <div class="col-xl-6 col-lg-6" style="margin-bottom: 10px">
                        <form class="contact-form" action="{{route('sendemailver')}}" method="post">
                            @csrf
                            <div class="row">


                                <div class="col-xl-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="InputName">@lang('Please verify your Email')<span class="requred">*</span></label>
                                        <input type="text" class="form-control" readonly value="{{Auth::user()->email}}" required>
                                    </div>
                                </div>

                                <div class="col-xl-12 col-lg-12">
                                    <div class="row d-flex">
                                        <div class="col-xl-12 col-lg-12">
                                            <button type="submit" style="width: 100%" class="login-button btn-contact"> @lang('Send Verification Code')</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </form>
                    </div>

                    <div class="col-xl-6 col-lg-6" style="margin-bottom: 10px">
                        <form class="contact-form" action="{{route('emailverify')}}" method="post">
                            @csrf
                            <div class="row">


                                <div class="col-xl-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="InputName">@lang('Verify Code')<span class="requred">*</span></label>
                                        <input type="text" class="form-control" name="code" id="InputName"  placeholder="@lang('Enter Verification Code')"  required>
                                    </div>
                                </div>

                                <div class="col-xl-12 col-lg-12">
                                    <div class="row d-flex">
                                        <div class="col-xl-12 col-lg-12">
                                            <button type="submit" style="width: 100%" class="login-button btn-contact"> @lang('Verify')</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </form>
                    </div>

                </div>

            @elseif(Auth::user()->smsv != '1')

                <div class="row justify-content-center">

                    <div class="col-xl-6 col-lg-6" style="margin-bottom: 10px">
                        <form class="contact-form" action="{{route('sendsmsver')}}" method="post">
                            @csrf
                            <div class="row">


                                <div class="col-xl-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="InputName">@lang('Please verify your Mobile')<span class="requred">*</span></label>
                                        <input type="text" class="form-control" readonly value="{{Auth::user()->mobile}}" required>
                                    </div>
                                </div>

                                <div class="col-xl-12 col-lg-12">
                                    <div class="row d-flex">
                                        <div class="col-xl-12 col-lg-12">
                                            <button type="submit" style="width: 100%" class="login-button btn-contact"> @lang('Send Verification Code')</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </form>
                    </div>

                    <div class="col-xl-6 col-lg-6" style="margin-bottom: 10px">
                        <form class="contact-form" action="{{route('smsverify')}}" method="post">
                            @csrf
                            <div class="row">


                                <div class="col-xl-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="InputName">@lang('Verify Code')<span class="requred">*</span></label>
                                        <input type="text" class="form-control" name="code" id="InputName"  placeholder="@lang('Enter Verification Code')"  required>
                                    </div>
                                </div>

                                <div class="col-xl-12 col-lg-12">
                                    <div class="row d-flex">
                                        <div class="col-xl-12 col-lg-12">
                                            <button type="submit" style="width: 100%" class="login-button btn-contact"> @lang('Verify')</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>

                    @elseif(Auth::user()->tfver != '1')
                <div class="row justify-content-center">
                        <div class="col-md-6 ">
                            <form class="contact-form" action="{{route('go2fa.verify') }}" method="post">
                                @csrf
                                <div class="row">


                                    <div class="col-xl-12 col-lg-12">
                                        <div class="form-group">
                                            <label for="InputName">@lang('Verify Google Authenticator Code')<span class="requred">*</span></label>
                                            <input type="text" class="form-control" name="code" id="InputName"  placeholder="@lang('Enter Verification Code')"  required>
                                        </div>
                                    </div>

                                    <div class="col-xl-12 col-lg-12">
                                        <div class="row d-flex">
                                            <div class="col-xl-12 col-lg-12">
                                                <button type="submit" style="width: 100%" class="login-button btn-contact"> @lang('Verify')</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </form>
                        </div>
                </div>

            @endif

        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $(document).on('click','.depoButton', function(){
                $('#ModalLabel').text($(this).data('name'));
                $('#gateWay').val($(this).data('gate'));

            });
        });
    </script>
@stop
