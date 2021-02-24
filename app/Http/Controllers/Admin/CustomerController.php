<?php

namespace App\Http\Controllers\Admin;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
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
        $customers = Customer::all();
        return view('admin\customer_manage', compact('customers'));
    }

    public function save(Request $request){

        $request->validate([
            'customername' => ['required', 'string', 'max:255'],
            'currency' => ['required', 'string', 'max:255'],
        ]);

        Customer::create([
            'customerid' => mt_rand(1, 999999),
            'customername' => $request->customername,
            'currency' => $request->currency
        ]);

        $notification =  array('message' => 'Customer Add Successfully', 'alert-type' => 'success');

        return back()->with($notification);
    }

    public function delete(Request $request){
        $customer = Customer::find($request->customerid);
        $customer->delete();
        $notification =  array('message' => 'Customer Delete Successfully', 'alert-type' => 'success');
        return back()->with($notification);
    }
}
