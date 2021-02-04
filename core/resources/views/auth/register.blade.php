@extends('layouts.master')
@section('style')
    <link rel="stylesheet" href="{{url('/')}}/assets/front/build/css/intlTelInput.css">
@stop

@section('content')
    <!-- contact us area start -->
    <section class="contact-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="section-title">
                        <h2>@lang('Sign up to Create New Account')</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 offset-md-3">
                    <div class="contact-from-wrapper">
                        <form action="{{ route('register') }}" method="post" >
                            @csrf
                            <div class="row">
                                @if(isset($ref_user))
                                    <div class="col-md-12">
                                        <div class="form-element">
                                            <div class="has-icon">
                                                <input type="text" style="background: #b6b9c1"  id="InputRef" value="{{$ref_user->name}}" disabled readonly required>
                                                <div class="the-icon">
                                                    <i class="fa fa-users"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" value="{{$ref_user->id}}" name="ref_id">
                                @endif


                                <div class="col-md-12">
                                    <div class="form-element">
                                        <div class="has-icon">
                                            <input type="text" name="name" value="{{old('name')}}" placeholder="@lang('Enter Your Name')" required>
                                            <div class="the-icon">
                                                <i class="fa fa-male"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-element">
                                        <div class="has-icon">
                                            <input type="email" name="email"  value="{{old('email')}}"  placeholder="@lang('Enter Your E-mail')" required>
                                            <div class="the-icon">
                                                <i class="fa fa-envelope"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" id="track" name="country_code" >
                                <div class="col-md-12">
                                    <div class="form-element">
                                        <div class="has-icon">
                                            <input type="tel" class="pranto-control" id="mobile"  name="mobile"  value="{{old('phone')}}" required>
                                            <div class="the-icon">
                                                <i class="fa fa-phone"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-element">
                                        <div class="has-icon">
                                            <input type="text" id="country" name="country" placeholder="@lang('Your Country')" required>
                                            <div class="the-icon">
                                                <i class="fa fa-globe"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-element">
                                        <div class="has-icon">
                                            <input type="text" name="username" value="{{old('username')}}" placeholder="@lang('Enter Your Username')" required>
                                            <div class="the-icon">
                                                <i class="fa fa-user"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-element">
                                        <div class="has-icon">
                                            <input type="password" name="password" placeholder="@lang('Enter Your Password')" required>
                                            <div class="the-icon">
                                                <i class="fa fa-lock"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-element">
                                        <div class="has-icon">
                                            <input type="password" name="password_confirmation" id="InputRetypepassword" placeholder="@lang('Re-type Password')" required>
                                            <div class="the-icon">
                                                <i class="fa fa-lock"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="col-md-6">
                                    <div class="form-group pull-left">
                                        <a href="{{ route('login') }}" class="forgetting-password">@lang('Already have an account?')</a>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <input type="submit" value="@lang('Sign Up')">
                                </div>

                            </div>
                            @if($general->social_login == 1)
                                <br>
                                <div class="row">

                                    <div class="col-md-6" style="margin-top: 20px">
                                        <a href="{{route('social.login', 'facebook')}}" class="btn btn-success btn-block" style="background:#4267b2; border: #4267b2;padding: 12px 0px 12px;" >@lang('Join With') <i class="fa fa-facebook"></i> </a>
                                    </div>

                                    <div class="col-md-6" style="margin-top: 20px">
                                        <a href="{{route('social.login', 'google')}}" class="btn btn-danger btn-block" style="padding: 12px 0px 12px;">@lang('Join With') <i class="fa fa-google"></i></a>
                                    </div>

                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact us area end -->
@endsection
@section('script')
    <script src="{{url('/')}}/assets/front/build/js/intlTelInput.js"></script>
    <script>
        $("#mobile").on("countrychange", function(e, countryData) {

            var data =  $(this).val('+' + countryData.dialCode);
            $('#track').val(data);
            var country = countryData.name;
            var country = country.split('(')[0];
            $('#country').val(country);
        });
        $("#mobile").intlTelInput({
            geoIpLookup: function(callback) {
                $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
                    var countryCode = (resp && resp.country) ? resp.country : "";
                    callback(countryCode);
                });
            },
            initialCountry: "auto",
            utilsScript: "{{url('/')}}/assets/front/build/js/utils.js"
        });
    </script>
@stop
