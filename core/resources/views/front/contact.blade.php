@extends('layouts.master')

@section('content')
    <!-- contact us area start -->
    <section class="contact-area" id="contact">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="section-title">
                        <h2>@lang('Contact Us')</h2>
                        <p>@lang('Contact Us For Support, How can we help you?')</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact-from-wrapper" id="contact-form-wrapper">

                        <form action="{{route('send.mail.contact')}}" method="post" >
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-element">
                                        <div class="has-icon">
                                            <input type="text" name="name" placeholder="@lang('Enter Your Name')">
                                            <div class="the-icon">
                                                <i class="fa fa-user"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-element">
                                        <div class="has-icon">
                                            <input type="email" name="email" placeholder="@lang('Enter Your E-mail Address')">
                                            <div class="the-icon">
                                                <i class="fa fa-envelope"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-element">
                                        <div class="has-icon textarea">
                                            <textarea rows="9" cols="30" name="message" placeholder="@lang('Enter Your Message')"></textarea>
                                            <div class="the-icon">
                                                <i class="fa fa-pencil-alt"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="submit" value="@lang('Submit now')">
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
