<?php

namespace App\Http\Controllers;

use App\Admin;
use App\User;
use App\Virtualmachine;

class VmwareController extends Controller
{
    public function require_classify()
    {
        $vm = Virtualmachine::all();
        $page_title = "Virtual Machine Requirement Classification";
        return view('user/require_classify', compact('page_title', 'vm'));
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
