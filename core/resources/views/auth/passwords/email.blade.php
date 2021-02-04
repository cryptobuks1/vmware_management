@extends('layouts.master')


@section('content')
    <section class="contact-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="section-title">
                        <h2>@lang('Forgot Password')</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 offset-md-3">
                    <div class="contact-from-wrapper">
                        <form action="{{ route('forget.password.user') }}" method="post" >
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-element">
                                        <div class="has-icon">
                                            <input type="email" name="email"  id="InputName" placeholder="@lang('E-mail')" required>
                                            <div class="the-icon">
                                                <i class="fa fa-envelope"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <input type="submit" value="@lang('Submit')">
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
