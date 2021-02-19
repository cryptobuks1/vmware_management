<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all();
        return view('admin\user_manage', compact('users'));
    }

    public function save(Request $request){
        $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

//        User::create([
//            'id' => mt_rand(1, 10000),
//            'name' => $request->username,
//            'email' => $request->email,
//            'password' => Hash::make($request->password),
//        ]);

        $email = $request->get('email');
        $data = ([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
//            'username' => $request->get('name'),
        ]);
        Mail::to($email)->send(new WelcomeMail($data));

        $notification =  array('message' => 'User Add Successfully', 'alert-type' => 'success');

        return back()->with($notification);
    }

    public function delete(Request $request){
        $user = User::find($request->user_id);
        $user->delete();
        $notification =  array('message' => 'User Delete Successfully', 'alert-type' => 'success');
        return back()->with($notification);
    }
}
