<?php

namespace App\Http\Controllers\Admin;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
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
        $this->middleware(['auth', 'is_admin']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $customers = Customer::all();
        return view('admin\user_manage', compact('customers'));
    }

    public function getusers()
    {
        $users = User::getuserlist();
        return json_encode(['data' => $users]);
    }

    public function save(Request $request)
    {

        $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255']
        ]);

        User::where('id', $request->user_id)->update([
            'name' => $request->username,
            'email' => $request->email,
            'customer_id' => $request->customer_id
        ]);

        $notification = array('message' => 'User Updated Successfully', 'alert-type' => 'success');

        return back()->with($notification);
    }

    public function delete(Request $request)
    {
        $user = User::find($request->user_id);
        $user->delete();
        $notification = array('message' => 'User Delete Successfully', 'alert-type' => 'success');
        return back()->with($notification);
    }
}
