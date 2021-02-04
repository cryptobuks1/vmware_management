<?php

namespace App\Http\Controllers;

use App\Deposit;
use App\Epin;
use App\Gateway;
use App\GeneralSettings;
use App\Invest;
use App\Lib\GoogleAuthenticator;
use App\Plan;
use App\TimeSetting;
use App\Transection;
use App\User;
use App\Withdraw;
use App\WithdrawMethod;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','ckstatus']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pt = "User Dashboard";
        $total_deposit = Deposit::whereUserId(Auth::id())->whereStatus(1);
        $total_withdraw = Withdraw::whereUserId(Auth::id())->whereStatus(1);
        $total_trans = Transection::whereUserId(Auth::id());
        $total_ref_com = Transection::whereUserId(Auth::id())->where('type', 11);
        $total_ref = User::where('ref_id', Auth::id());
        $all_plan = Plan::where('status', '!=', 2)->orderBy('status', 'DESC')->get();
        return view('home',compact('pt', 'total_deposit', 'total_withdraw','total_trans', 'total_ref', 'total_ref_com', 'all_plan'));
    }


    public function indexTrans()
    {
        $pt = "Transaction Detail";
            $trans = Transection::where('user_id', Auth::id())->latest()->paginate(15);
            return view('user.tarns',compact('pt', 'trans'));
    }

    public function refComIndex()
    {
        $pt = " Referral Commission History";
            $trans = Transection::where('user_id', Auth::id())->latest()->where('type', 11)->paginate(15);
            return view('user.com_history',compact('pt', 'trans'));
    }

    public function indexWithdraw()
    {
        $pt = "Withdraw Now";
        $trans = WithdrawMethod::where('status', 1)->get();
        return view('user.withdraw.withdraw',compact('pt', 'trans'));
    }

    public function previewWithdraw(Request $request)
    {
        $this->validate($request, [
            'gateway' =>'required',
            'amount' => 'required|numeric|min:1'
        ]);

        $amount = $request->amount;
        $with_method = WithdrawMethod::find($request->gateway);

        if ($request->amount <= Auth::user()->balance && $request->amount >= $with_method->min_amo && $request->amount <= $with_method->max_amo)
        {
            $pt = "Confirm Withdraw";
            return view('user.withdraw.withdraw_preview', compact('pt','with_method', 'amount'));
        }else{
            return redirect()->back()->with('alert', 'Invalid Amount');
        }

    }

    public function storeWithdraw(Request $request, $id)
    {
        $this->validate($request,[
            'amount' => 'required',
            'detail' => 'required',
        ]);

        $with_method = WithdrawMethod::findOrFail($id);
        $charge = $with_method->chargefx + ($request->amount*$with_method->chargepc)/100;
        $payble_amount = $request->amount - $charge;
        $in_method_cur = $payble_amount / $with_method->rate;
        $user = User::find(Auth::user()->id);

        if ($request->amount <= $user->balance && $request->amount >= $with_method->min_amo && $request->amount <= $with_method->max_amo){
            Withdraw::create([
                'amount' => $request->amount,
                'charge' => round($charge,4),
                'method_id' => $with_method->id,
                'processing_time' => $with_method->processing_day,
                'detail' => $request->detail,
                'withdraw_id' => 'WD-'.rand(),
                'user_id' => $user->id,
                'method_cur_amount' => round($in_method_cur,4),
                'status' => 0,
            ]);

            $new_balance = $user->balance - $request->amount;
            $user->balance = round($new_balance,4);
            $user->save();

            Transection::create([
                'user_id' => $user->id,
                'des' => 'Withdraw Via '.$with_method->name,
                'amount' => '-'.$request->amount,
                'balance' => round($new_balance,4)
            ]);

            $general = GeneralSettings::first();
            $message ='Welcome! Your Withdraw request is success, Please wait for processing days.Your Withdraw amount : '.$request->amount.$general->currency.' Your current balance is '.$new_balance.$general->currency.' .';

            send_email($user['email'],$user['name'], 'Successfully Withdraw' , $message);
            send_sms( $user['mobile'], $message);

            return redirect('/withdraw')->with('message', 'Withdraw Request Success, Wait for processing day');
        }else{
            return redirect()->back()->with('alert', 'Invalid Amount');
        }



    }

    public function historyWithdraw()
    {
        $pt = "Withdraw History";
        $trans = Withdraw::where('user_id', Auth::id())->latest()->paginate(15);
        return view('user.withdraw.history',compact('pt', 'trans'));
    }

    public function accountIndex()
    {
        $pt = "Account Settings";
        return view('user.profile',compact('pt'));
    }

    public function accountUpdate(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'country' => 'required',
            'mobile' => 'required',
        ]);

        $input['name'] = $request->name;
        $input['email'] = $request->email;
        $input['mobile'] = $request->mobile;
        $input['country'] = $request->country;

        User::whereId(Auth::id())->update($input);
        return back()->with('message', 'Update Successfully');
    }

    public function deposit()
    {
        $pt = 'Deposit Methods';
        $gates = Gateway::where('status',1)->get();
        $ico = Plan::where('status', 1)->first();
        $deposit = Deposit::where('user_id', Auth::id())->orderBy('id','DESC')->where('status',1)->paginate(15);
        return view('user.deposit', compact('pt','gates','deposit', 'ico'));
    }

    public function depositHistory()
    {
        $data['pt'] = 'Purchase History';
        $data['deposit'] = Deposit::where('user_id', Auth::id())->orderBy('id','DESC')->where('status',1)->paginate(15);
        return view('user.deposit_history', $data);
    }

    public function depositDataInsert(Request $request)
    {
        $this->validate($request,['amount' => 'required|numeric','gateway' => 'required']);

        if($request->amount<=0)
        {
            return back()->with('alert', 'Invalid Amount');
        }
        else{
            $gate = Gateway::findOrFail($request->gateway);
            if(isset($gate)){
                $sto = Plan::where('status', 1)->first();
                $av = $sto->amount - $sto->sold;

                if ($request->amount > $av){
                    return back()->with('alert', 'Currently Stock Out.');
                }

                if (Carbon::parse($sto->end_date) < Carbon::today()){
                    return back()->with('alert', 'Limit Over.');
                }

                $price = $request->amount * $sto->price;
                $charge = $gate->fixed_charge + ($price*$gate->percent_charge/100);
                $usdamo = ($price + $charge)/$gate->rate;

                $depo['user_id'] = Auth::id();
                $depo['gateway_id'] = $gate->id;
                $depo['amount'] = $request->amount;
                $depo['price'] = $price;
                $depo['plan_id'] = $sto->id;
                $depo['charge'] = $charge;
                $depo['usd_amo'] = round($usdamo,2);
                $depo['btc_amo'] = 0;
                $depo['btc_wallet'] = "";
                $depo['trx'] = str_random(16);
                $depo['try'] = 0;
                $depo['status'] = 0;
                Deposit::create($depo);

                Session::put('Track', $depo['trx']);

                return redirect()->route('deposit.preview');
            }
            else
            {
                return back()->with('alert', 'Please Select Deposit gateway');
            }
        }

    }

    public function depositPreview()
    {
        $track = Session::get('Track');

        session()->forget('pranto');
        $data = Deposit::where('status',0)->where('trx',$track)->first();
        $pt = 'Deposit Preview';

        return view('user.payment.preview',compact('pt','data'));
    }

    public function indexPlan()
    {
        $pt = 'Investment Plans';
        $gates = Plan::where('status',1)->get();
        return view('user.plan', compact('pt','gates'));
    }

    public function buyPlan(Request $request)
    {
        $vali = Validator::make($request->all(), [
            'amount' => 'required|numeric|min:0',
            'plan_id' => 'required',
            'wallet_type' => 'required',
        ]);

        if ($vali->fails()) {
            return response()->json(['success' => false, 'message' => $vali->errors()->first()]);
        }

        $gnl = GeneralSettings::first();
        $plan = Plan::find($request->plan_id);
        $time_name = TimeSetting::where('time', $plan->times)->first();
        $user = User::find(Auth::id());
        $now = Carbon::now();

        if ($request->wallet_type == 1)
        {
            $wallet_bal = $user->balance;
        }else{
            $wallet_bal = $user->interest_balance;
        }


        if ($request->amount > $wallet_bal)
        {
            return response()->json(['success' => false, 'message' => 'Insufficient Balance']);
        }

        //start
        if ($plan->interest_status == 1)
        {
            $interest_amount = ($request->amount*$plan->interest)/100;
        }else{
            $interest_amount = $plan->interest;
        }

        if ($plan->lifetime_status == 1)
        {
            $period = '-1';
        }else{
            $period = $plan->repeat_time;
        }
        //end

        if ($plan->fixed_amount == 0)
        {

            if ($plan->minimum <= $request->amount && $plan->maximum >= $request->amount)
            {



                $pranto['user_id'] = $user->id;
                $pranto['plan_id'] = $plan->id;
                $pranto['amount'] = $request->amount;
                $pranto['interest'] = $interest_amount;
                $pranto['period'] = $period;
                $pranto['time_name'] = $time_name->name;
                $pranto['hours'] = $plan->times;
                $pranto['next_time'] = Carbon::parse($now)->addHours($plan->times);
                $pranto['status'] = 1;
                $pranto['capital_status'] = $plan->capital_back_status;
                $a = Invest::create($pranto);


                levelCommision($user->id, $request->amount);


                if ($request->wallet_type == 1)
                {
                    $new_balance = $user->balance - $request->amount;
                    $user->balance = $new_balance;
                }else{
                    $new_balance = $user->interest_balance - $request->amount;
                    $user->interest_balance = $new_balance;
                }

                Transection::create([
                    'trxid' => 'TRX-'.rand(1000,9999),
                    'user_id' => $user->id,
                    'des' => 'Purchased '.$plan->name,
                    'amount' => '-'.$request->amount,
                    'balance' => round($new_balance,4)
                ]);




                $message = "Congratulation, Successfully Invest complete. You invest ".$request->amount.' '.$gnl->currency.' And you will get '.
                    $interest_amount.' '.$gnl->currency. ' interest.';
                send_email($user->email, $user->name, 'Invest Complete', $message);
                send_sms($user->mobile, $message);

                $user->save();

                Session::flash('success','Package Purchased Successfully Complete');
                return $a;
            }

            return response()->json(['success' => false, 'message' => 'Invalid Amount']);

        }else{
            if ($plan->fixed_amount == $request->amount) {


                $data['user_id'] = $user->id;
                $data['plan_id'] = $plan->id;
                $data['amount'] = $request->amount;
                $data['interest'] = $interest_amount;
                $data['period'] = $period;
                $data['time_name'] = $time_name->name;
                $data['hours'] = $plan->times;
                $data['next_time'] = Carbon::parse($now)->addHours($plan->times);
                $data['status'] = 1;
                $data['capital_status'] = $plan->capital_back_status;
                $a = Invest::create($data);

                if ($request->wallet_type == 1)
                {
                    $new_balance = $user->balance - $request->amount;
                    $user->balance = $new_balance;
                }else{
                    $new_balance = $user->interest_balance - $request->amount;
                    $user->interest_balance = $new_balance;
                }


                Transection::create([
                    'trxid' => 'TRX-'.rand(1000,9999),
                    'user_id' => $user->id,
                    'des' => 'Purchased '.$plan->name,
                    'amount' => '-'.$request->amount,
                    'balance' => round($new_balance,4)
                ]);

                $message = "Congratulation, Successfully Invest complete. You invest ".$request->amount.' '.$gnl->currency.' And you will get '.
                    $interest_amount.' '.$gnl->currency. ' interest.';
                send_email($user->email, $user->name, 'Invest Complete', $message);
                send_sms($user->mobile, $message);

                $user->save();
                Session::flash('success','Package Purchased Successfully Complete');
                return $a;
            }
            return response()->json(['success' => false, 'message' => 'Something Went Wrong']);
        }


    }

    public function interestLog()
    {
        $pt = 'Interest Log';
        $trans = Invest::where('user_id', Auth::id())->latest()->paginate(15);
        return view('user.interest_log', compact('pt','trans'));
    }

    public function indexTransfer()
    {
        $pt = 'STO Transfer';
        $plan = Invest::whereUserId(Auth::id())->get();
        return view('user.balance_tranfer', compact('pt', 'plan'));
    }

    public function findSto(Request $request)
    {
        $in = Invest::whereId($request->id)->where('user_id', Auth::id())->first();
        if ($in){
            return response()->json([
                'success' => true,
                'wallet_name' => $in->plan->name,
                'balance' => $in->amount,
            ]);
        }else{
            return response()->json([
                'success' => false,
                'message' => __('Something Went Wrong'),
            ]);
        }
    }

    public function balTransfer(Request $request)
    {
        $this->validate($request,[
            'wallet_id' => 'required',
            'username' => 'required',
            'amount' => 'required|numeric|min:1',
        ]);

        $gnl = GeneralSettings::first();



        $user = User::findOrFail(Auth::id());
        $invest = Invest::find($request->wallet_id);
        $trans_user = User::where('username', $request->username)->orwhere('email', $request->username)->first();

        if ($trans_user == ''){
            return back()->with('alert', 'Username Not Found');
        }

        if ($trans_user->username == $user->username){
            return back()->with('alert', 'Balance Transfer Not Possible In Your Own Account');
        }



        if ($invest->amount >= $request->amount){

            $n = $invest->amount - $request->amount;
            $invest->amount = $n;
            $invest->save();

            $tlog['user_id'] = $user->id;
            $tlog['amount'] = $request->amount;
            $tlog['balance'] = $user->balance;
            $tlog['des'] = 'STO send to '.$trans_user->name;
            $tlog['trxid'] = str_random(16);
            Transection::create($tlog);

            $plan = Plan::find($invest->plan_id);
            $pranto['user_id'] = $trans_user->id;
            $pranto['plan_id'] = $invest->plan_id;
            $pranto['amount'] = $request->amount;
            $pranto['time_name'] = $invest->time_name;
            $pranto['hours'] = $plan->times;
            $pranto['next_time'] = Carbon::parse(Carbon::now())->addHours($plan->times);
            $pranto['status'] = 1;
            Invest::create($pranto);


            $tlog['user_id'] = $trans_user->id;
            $tlog['amount'] = $request->amount;
            $tlog['balance'] = $trans_user->balance;
            $tlog['des'] = 'STO received from '.$user->name;
            $tlog['trxid'] = str_random(16);
            Transection::create($tlog);

            $message = "Balance received successfully. You got ".$request->amount." from ".$user->name;
            send_email($trans_user->email, $trans_user->name, 'STO Received', $message);
            send_sms($trans_user->mobile, $message);

            $message = "STO transferred successfully complete, You send ".$request->amount." to ".$trans_user->name.".";
            send_email($user->email, $user->name, 'STO Transfer', $message);
            send_sms($user->mobile, $message);


            return back()->with('message', 'Balance Transferred Successfully');


        }else{
            return back()->with('alert', 'Insufficient Balance');
        }


    }

    public function searchUser(Request $request)
    {
        $trans_user = User::where('id', '!=', Auth::id())->where('username', $request->username)->orwhere('email', $request->username)->count();

        if ($trans_user == 1)
        {
            return response()->json(['success' => true, 'message' => 'Correct User']);
        }else{
            return response()->json(['success' => false, 'message' => 'User Not Found']);
        }

    }

    public function twoFactorIndex()
    {
        $pt = '2FA Security';
        $gnl = GeneralSettings::first();
        $ga = new GoogleAuthenticator();
        $secret = $ga->createSecret();

        $qrCodeUrl = $ga->getQRCodeGoogleUrl(Auth::user()->username.'@'.$gnl->sitename, $secret);
        $prevcode = Auth::user()->secretcode;
        $prevqr = $ga->getQRCodeGoogleUrl(Auth::user()->username.'@'.$gnl->sitename, $prevcode);

        return view('user.two_factor', compact('secret','qrCodeUrl','prevcode','prevqr', 'pt'));
    }

    public function disable2fa(Request $request)
    {
        $this->validate($request,[
            'code' => 'required',
        ]);

        $user = User::find(Auth::id());
        $ga = new GoogleAuthenticator();

        $secret = $user->secretcode;
        $oneCode = $ga->getCode($secret);
        $userCode = $request->code;

        if ($oneCode == $userCode)
        {
            $user = User::find(Auth::id());
            $user['tauth'] = 0;
            $user['tfver'] = 1;
            $user['secretcode'] = '0';
            $user->save();

            $message =  'Google Two Factor Authentication Disabled Successfully';
            send_email($user['email'], 'Google 2FA' ,$user['first_name'], $message);



            $sms =  'Google Two Factor Authentication Disabled Successfully';
            send_sms($user->mobile, $sms);

            return back()->with('message', 'Two Factor Authenticator Disable Successfully');
        }
        else
        {
            return back()->with('alert', 'Wrong Verification Code');
        }

    }

    public function create2fa(Request $request)
    {
        $user = User::find(Auth::id());
        $this->validate($request,[
            'key' => 'required',
            'code' => 'required',
        ]);

        $ga = new GoogleAuthenticator();

        $secret = $request->key;
        $oneCode = $ga->getCode($secret);
        $userCode = $request->code;
        if ($oneCode == $userCode)
        {
            $user['secretcode'] = $request->key;
            $user['tauth'] = 1;
            $user['tfver'] = 1;
            $user->save();

            $message ='Google Two Factor Authentication Enabled Successfully';
            send_email($user['email'], 'Google 2FA' ,$user['first_name'], $message);


            $sms =  'Google Two Factor Authentication Enabled Successfully';
            send_sms($user->mobile, $sms);

            return back()->with('message', 'Google Authenticator Enabeled Successfully');
        }
        else
        {
            return back()->with('alert', 'Wrong Verification Code');
        }

    }

    public function checkTwoFactor(Request $request)
    {
        $user = User::find(Auth::id());

        $this->validate($request,[
            'code' => 'required',
        ]);

        $ga = new GoogleAuthenticator();
        $secret = $user->secretcode;
        $oneCode = $ga->getCode($secret);
        $userCode = $request->code;

        if ($oneCode == $userCode) {
            return response()->json(['success' => true, 'message' => "ok"]);
        } else {
            return response()->json(['success' => false, 'message' => "Wrong Verification Code"]);
        }

    }


    public function passwordChange(Request $request)
    {
        $this->validate($request,[
            'passwordold' =>'required',
            'password' => 'required|min:5|confirmed'
        ]);

        try {
            $c_password = User::find($request->id)->password;
            $c_id = User::find($request->id)->id;
            $user = User::findOrFail($c_id);

            if(Hash::check($request->passwordold, $c_password)){

                $password = Hash::make($request->password);
                $user->password = $password;
                $user->save();

                return redirect()->back()->with('message','Password Change Successfully.');
            }else{
                session()->flash('alert', 'Password Not Match');
                Session::flash('type', 'warning');
                return redirect()->back();
            }
        }catch (\PDOException $e) {
            session()->flash('message', 'Some Problem Occurs, Please Try Again!');
            Session::flash('type', 'warning');
            return redirect()->back();
        }

    }



    public function pinRecharge()
    {
        $pt = 'Recharege Wallet With E-PIN ';
        return view('user.pinRecharge', compact('pt'));
    }


    public function pinRechargePost(Request $request)
    {
        $this->validate($request,[
            'pin' => 'required'
        ]);

        $pin = Epin::where('pin', $request->pin)->first();

        if ($pin == '')
        {
            return redirect()->back()->with('alert','Wrong Pin.');
        }
        if ($pin->status == 2)
        {
            return redirect()->back()->with('alert','Already Used.');
        }
        if ($pin->status == 1)
        {
            $pin->status = 2;
            $pin->user_id = Auth::id();
            $pin->save();

            $user = User::find(Auth::id());
            $new_balance = $user->balance + $pin->amount;
            $user->balance = $new_balance;
            $user->save();

            $tlog['user_id'] = $user->id;
            $tlog['amount'] = $pin->amount;
            $tlog['balance'] = $user->balance;
            $tlog['des'] = 'E-Pin Recharge';
            $tlog['trxid'] = str_random(16);
            Transection::create($tlog);
            return redirect()->back()->with('success','Balance Added Successfully.');
        }

    }

    public function depositBankPranto()
    {
        $track = Session::get('Track');
        if ($track != ''){
            $data = Deposit::where('trx', $track)->orderBy('id', 'DESC')->first();
            $method = Gateway::find($data->gateway_id);
            $pt = "Purchase Now";
            return view('user.bank_deposite', compact('method','data','pt'));
        }

        return redirect('home')->with('alert', 'Session Expired Please Try Again');


    }

    public function depositBankSubmit(Request $request)
    {
        $this->validate($request,[
            'detail' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg',
        ]);
        $track = Session::get('Track');
        $data = Deposit::find($request->data_id);
        $data_one = Deposit::where('trx', $track)->orderBy('id', 'DESC')->first();
        if ($data->trx == $data_one->trx){

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = time() . '.' . 'jpg';
                $location = 'assets/images/deposit_prove/'. $filename;
                Image::make($image)->save($location);
                $data->image = $filename;
            }
            $data->detail = $request->detail;
            $data->save();


            return redirect('/home')->with('success', 'Submitted Successfully, Wait for confirmation');
        }
        return redirect()->back()->with('alert', 'Wrong Try');
    }

    public function refMy()
    {
        $pt = "My Referral";
        return view('user.my_referral', compact('pt'));
    }





}
