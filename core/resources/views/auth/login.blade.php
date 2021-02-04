@extends('layouts.master')

@section('content')
    <!-- contact us area start -->
    <section class="contact-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="section-title">
                        <h2>@lang('Login On Your Account')</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 offset-md-3">
                    <div class="contact-from-wrapper">
                        <form action="{{ route('login') }}" method="post" >
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-element">
                                        <div class="has-icon">
                                            <input type="text" name="username" placeholder="@lang('Enter Username')" required>
                                            <div class="the-icon">
                                                <i class="fa fa-user"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-element">
                                        <div class="has-icon">
                                            <input type="password" name="password" placeholder="@lang('Enter Your Password')">
                                            <div class="the-icon">
                                                <i class="fa fa-lock"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"  name="remember" id="remember">
                                            <label class="form-check-label" for="remember">
                                                @lang('Keep me logged in')
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group pull-right">
                                        <a href="{{ route('password.request') }}" class="forgetting-password">@lang('Forgot Password?')</a>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <input type="submit" value="@lang('Sign In')">
                                </div>

                            </div>
{{--                            @if($general->social_login == 1)--}}
                                <br>
{{--                                <div class="row">--}}

{{--                                    <div class="col-md-6" style="margin-top: 20px">--}}
{{--                                        <a href="{{route('social.login', 'facebook')}}" class="btn btn-success btn-block" style="background:#4267b2; border: #4267b2;padding: 12px 0px 12px;" >@lang('Join With') <i class="fa fa-facebook"></i> </a>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-md-6" style="margin-top: 20px">--}}
{{--                                        <a href="{{route('social.login', 'google')}}" class="btn btn-danger btn-block" style="padding: 12px 0px 12px;">@lang('Join With') <i class="fa fa-google"></i></a>--}}
{{--                                    </div>--}}

{{--                                </div>--}}
{{--                            @endif--}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact us area end -->
@endsection
@section('script')

@stop
