<section class="double-your-coin-area pranto-margin-bottom">
    <div class="container">
        <div class="row justify-content-between">

            <div class="col-lg-12">
                <div class="single-coin-box pranto-coin-box yellow wow slideInLeft">
                    <div class="content pranto-content">
                        <div class="account_details">
                            <div class="card_info">
                                <p  class="showbal">{{Auth::user()->name}} (<span class="color">{{'@'.Auth::user()->username}}</span>)</p>
                                @if(Auth::user()->ref_id != 0)
                                    <p class="showbal"> @lang('Referred By'): <span class="color">@php echo $ref = \App\User::find(Auth::user()->ref_id)->name @endphp</span></p>
                                    @else
                                    <p class="showbal">@lang('Referred By'): <span class="color">@lang('None')</span></p>
                                @endif
                            </div>
                            <div class="main_balance">
                                <p  class="showbal">@lang('Balance'): <span class="color"> {{round(Auth::user()->balance,4)}} {{__($general->currency_sym)}}</span></p>
                                <p  class="showbal">@lang('Total Purchase'): <span class="color"> {{ \App\Invest::whereUserId(Auth::user()->id)->sum('amount') }} @lang('STO')</span></p>
                            </div>
                            <div class="accounts_info">
                                <div class="accounts_balance">
                                    <p  class="showbal" onclick="location.href='{{route('withdraw.history')}}'" style="cursor: pointer;">{{__('Total Withdrawal')}}:  <span class="color">{{__($general->currency_sym)}}{{\App\Withdraw::whereUserId(Auth::id())->whereStatus(1)->sum('amount')}}</span></p>
                                    <p  class="showbal" onclick="location.href='{{url('/referral')}}'" style="cursor: pointer;">@lang('Total Referral'): <span class="color">{{ \App\User::where('ref_id', Auth::id())->count() }}</span></p>
                                    <p  class="showbal" onclick="location.href='{{url('referral/commission')}}'" style="cursor: pointer;">@lang('Total Referral Commission') : <span class="color">{{__($general->currency_sym)}}{{\App\Transection::whereUserId(Auth::id())->where('type', 11)->sum('amount')}}</span></p>
                                    <p  class="showbal" onclick="location.href='{{route('user.transaction')}}'" style="cursor: pointer;">@lang('Total Transaction') :  <span class="color">{{\App\Transection::whereUserId(Auth::id())->count()}}</span></p>



                                </div>

             
                            </div>
                             <div class="foot" style="width: 100%; margin-top:0px;">
                                 <div class="row">
                                     <div class="col-md-4">
                                         <button class="btn btn-primary btn-block" onclick="location.href='{{route('user.deposit')}}'" >@lang('Purchase STO')</button>
                                     </div>

                                     <div class="col-md-4">
                                         <button class="btn btn-primary btn-block" onclick="location.href='{{route('user.withdraw')}}'" >@lang('Withdraw Now')</button>
                                     </div>

                                     <div class="col-md-4">
                                         <button class="btn btn-primary btn-block" onclick="location.href='{{route('support.index.customer')}}'" >@lang('Support Ticket')</button>
                                     </div>
                                 </div>

                                </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <div class="section-title">
                    <h2>{{__($pt)}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

