<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Virtualmachine;
use App\Models\Machinerequire;
use Illuminate\Support\Facades\Hash;
use DB;


class VmController extends Controller
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
        $vms = $this->getRequireData();
        return view('vm\requirement_classify', compact('vms'));
    }

    public function save(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        User::create([
            'id' => mt_rand(1, 10000),
            'name' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $notification = array('message' => 'User Add Successfully', 'alert-type' => 'success');

        return back()->with($notification);
    }

    public function delete(Request $request)
    {
        $user = User::find($request->user_id);
        $user->delete();
        $notification = array('message' => 'User Delete Successfully', 'alert-type' => 'success');
        return back()->with($notification);
    }

    public function getRequireData()
    {
        return DB::table('customer_vms')
            ->join('customer_vmreq', 'customer_vms.vmid', '=', 'customer_vmreq.vmid')
            ->select('customer_vms.*', 'customer_vmreq.*')
            ->get();
    }

    public function getvmreqdata(Request $request)
    {
        $vmdata = DB::table('customer_vms')
            ->join('customer_vmreq', 'customer_vms.vmid', '=', 'customer_vmreq.vmid')
            ->select('customer_vms.*', 'customer_vmreq.*')
            ->get();
        $retData = array('data' => $vmdata);
        return json_encode($retData);
    }

    public function editvmreqdata(Request $request)
    {
        $data = $request->data;

        foreach ($data as $key => $row) {
            Machinerequire::where('vmid', $key)->update($row);
        }

        $vmdata = DB::table('customer_vms')
            ->join('customer_vmreq', 'customer_vms.vmid', '=', 'customer_vmreq.vmid')
            ->select('customer_vms.*', 'customer_vmreq.*')
            ->get();
        $retData = array('data' => $vmdata);
        return json_encode($retData);
    }

    public function getvmdata(Request $request)
    {
        $vmid = $request->id;
        $vmdata = DB::table('customer_vms')
            ->join('customer_vmreq', 'customer_vms.vmid', '=', 'customer_vmreq.vmid')
            ->select('customer_vms.*', 'customer_vmreq.*')
            ->where('customer_vms.vmid', $vmid)
            ->get();
        return json_encode($vmdata[0]);
    }

    public function editreq(Request $request)
    {
        $vmIds = $request->vmids;
        $reqData = array(
            'azbackup' => $request->azbackup,
            'tempstoragegb' => $request->tempstoragegb,
        );
        if ($request->exists('region')) {
            $reqData['region'] = $request->region;
        } else {
            $reqData['region'] = '';
        }
        if ($request->exists('pricetype')) {
            $reqData['pricetype'] = $request->pricetype;
        }
        if ($request->exists('burstable')) {
            $reqData['burstable'] = 1;
        } else {
            $reqData['burstable'] = 0;
        }
        if ($request->exists('latency')) {
            $reqData['latency'] = 1;
        } else {
            $reqData['latency'] = 0;
        }
        if ($request->exists('SLA')) {
            $reqData['SLA'] = 1;
        } else {
            $reqData['SLA'] = 0;
        }
        if ($request->exists('dr')) {
            $reqData['dr'] = 1;
        } else {
            $reqData['dr'] = 0;
        }
        foreach ($vmIds as $vmid) {
            Machinerequire::where('vmid', $vmid)->update($reqData);
        }
        $notification = array('message' => 'Requirement Updated Successfully', 'alert-type' => 'success');
        return back()->with($notification);
    }
}
