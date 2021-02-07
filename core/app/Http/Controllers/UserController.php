<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Courier;
use App\Customer;
use App\Deposit;
use App\Epin;
use App\Gateway;
use App\GeneralSettings;
use App\Invest;
use App\Invoice;
use App\Jobs\SendEmail;
use App\Plan;
use App\Product;
use App\Purchase;
use App\Referral;
use App\SoldProduct;
use App\Stock;
use App\Subscriber;
use App\TimeSetting;
use App\Transection;
use App\User;
use App\Withdraw;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use File;

class UserController extends Controller
{
    public function dashboard()
    {
        $page_title = "User Dashboard";


        return view('user.home', compact('page_title'));
    }

    public function changePassword()
    {

        $data['page_title'] = "Change Password";
        return view('user.change_password',$data);
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:5',
            'password_confirmation' => 'required|same:new_password',
        ]);

        $user = Auth::guard('admin')->user();

        $oldPassword = $request->old_password;
        $password = $request->new_password;
        $passwordConf = $request->password_confirmation;

        if (!Hash::check($oldPassword, $user->password) || $password != $passwordConf) {
            $notification =  array('message' => 'Password Do not match !!', 'alert-type' => 'error');
            return back()->with($notification);
        }elseif (Hash::check($oldPassword, $user->password) && $password == $passwordConf)
        {
            $user->password = bcrypt($password);
            $user->save();
            $notification =  array('message' => 'Password Changed Successfully !!', 'alert-type' => 'success');
            return back()->with($notification);
        }
    }


    public function profile()
    {
        $data['user'] = Auth::user();
        $data['page_title'] = "Profile Settings";
        return view('user.profile',$data);
    }

    public function updateProfile(Request $request)
    {
        $data = User::find($request->id);
        $request->validate([
            'name' => 'required|max:20',
            'email' => 'required|max:50|unique:admins,email,'.$data->id,
            'mobile' => 'required',
        ]);


        $in = Input::except('_method','_token');
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time().'.jpg';
            $location = 'assets/images/user/' . $filename;
            Image::make($image)->resize(300,300)->save($location);
            $path = './assets/images/user/';
            File::delete($path.$data->image);
            $in['image'] = $filename;
        }
        print_r($data->fill($in));exit;
        $data->fill($in)->save();

        $notification =  array('message' => 'Profile Update Successfully', 'alert-type' => 'success');
        return back()->with($notification);
    }
}
