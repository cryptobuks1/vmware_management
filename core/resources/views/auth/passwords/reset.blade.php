@extends('layouts.master')


@section('content')

    <section class="contact-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="section-title">
                        <h2>@lang('Reset Password')</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 offset-md-3">
                    <div class="contact-from-wrapper">
                        <form action="{{ route('reset.passw') }}" method="post" >
                            @csrf
                            <input type="hidden" name="token" value="{{ $reset->token }}">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-element">
                                        <div class="has-icon">
                                            <input type="password"  name="email" value="{{ $reset->email }}" class="form-control" disabled required>
                                            <div class="the-icon">
                                                <i class="fa fa-lock"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-element">
                                        <div class="has-icon">
                                            <input type="password" name="password" placeholder="@lang('New Password')" required>
                                            <div class="the-icon">
                                                <i class="fa fa-lock"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="form-element">
                                        <div class="has-icon">
                                            <input type="password" name="password_confirmation" class="form-control"  placeholder="@lang('Confirm Password')" required>
                                            <div class="the-icon">
                                                <i class="fa fa-lock"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <input type="submit" value="@lang('Reset')">
                                </div>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')

@stop
