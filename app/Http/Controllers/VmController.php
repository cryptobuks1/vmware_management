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
        return view('vm\requirement_classify');
    }

    public function getRequireData()
    {
        if(auth()->user()->is_admin == 1){
            return DB::table('customer_vms')
                ->join('customer_vmreq', 'customer_vms.vmid', '=', 'customer_vmreq.vmid')
                ->select('customer_vms.*', 'customer_vmreq.*')
                ->get();
        }else{
            return DB::table('customer_vms')
                ->join('customer_vmreq', 'customer_vms.vmid', '=', 'customer_vmreq.vmid')
                ->select('customer_vms.*', 'customer_vmreq.*')
                ->where('customer_vms.customerid', auth()->user()->customer_id)
                ->get();
        }
    }

    public function getvmreqdata(Request $request)
    {
        if(auth()->user()->is_admin == 1) {
            $vmdata = DB::table('customer_vms')
                ->join('customer_vmreq', 'customer_vms.vmid', '=', 'customer_vmreq.vmid')
                ->select('customer_vms.*', 'customer_vmreq.*')
                ->get();
        }else{
            $vmdata = DB::table('customer_vms')
                ->join('customer_vmreq', 'customer_vms.vmid', '=', 'customer_vmreq.vmid')
                ->select('customer_vms.*', 'customer_vmreq.*')
                ->where('customer_vms.customerid', auth()->user()->customer_id)
                ->get();
        }
        $retData = array('data' => $vmdata);
        return json_encode($retData);
    }

    public function donotmigrate(Request $request)
    {
        $vmid = $request->post('vmid');
        Machinerequire::where('vmid', $vmid)->update(['donotmigrate' => 1]);
        return $vmid;
    }

    public function editvmreqdata(Request $request)
    {
        $data = $request->data;

        foreach ($data as $key => $row) {
            Machinerequire::where('vmid', $key)->update($row);
        }
        if(auth()->user()->is_admin == 1) {
            $vmdata = DB::table('customer_vms')
                ->join('customer_vmreq', 'customer_vms.vmid', '=', 'customer_vmreq.vmid')
                ->select('customer_vms.*', 'customer_vmreq.*')
                ->get();
        }else{
            $vmdata = DB::table('customer_vms')
                ->join('customer_vmreq', 'customer_vms.vmid', '=', 'customer_vmreq.vmid')
                ->select('customer_vms.*', 'customer_vmreq.*')
                ->where('customer_vms.customerid', auth()->user()->customer_id)
                ->get();
        }
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
        $reqData = [];
        if ($request->region != '') {
            $reqData['region'] = $request->region;
        }
        if ($request->pricetype != '') {
            $reqData['pricetype'] = $request->pricetype;
        }
        if ($request->burstable != '') {
            $reqData['burstable'] = $request->burstable;
        }
        if ($request->latency != '') {
            $reqData['latency'] = $request->latency;
        }
        if ($request->SLA != '') {
            $reqData['SLA'] = $request->SLA;
        }
        if ($request->dr != '') {
            $reqData['dr'] = $request->dr;
        }
        if ($request->azbackup != '') {
            $reqData['azbackup'] = $request->azbackup;
        }
        if ($request->tempstoragegb != '') {
            $reqData['tempstoragegb'] = $request->tempstoragegb;
        }
        foreach ($vmIds as $vmid) {
            Machinerequire::where('vmid', $vmid)->update($reqData);
        }
        $notification = array('message' => 'Requirement Updated Successfully', 'alert-type' => 'success');
        return back()->with($notification);
    }

    public function sizing()
    {
        $vms = Virtualmachine::getSizingData();
        return view('vm\sizing', compact('vms'));
    }

    public function change_proposal()
    {
        return view('vm\proposal');
    }

    public function get_proposal()
    {
        $vms = Virtualmachine::getProposalData();

        return json_encode(array('data' => $vms));
    }

    public function accept_proposal(Request $request)
    {
        $vmid = $request->post('vmid');

        $proposal = Machinerequire::where('vmid', $vmid)->first();
        if ($proposal->pvmdiskcount && $proposal->pvmproccount) {
            Virtualmachine::where('vmid', $vmid)->update([
                'vmdiskcount' => $proposal->pvmdiskcount,
                'vmproccount' => $proposal->pvmproccount,
            ]);
        }
        return $vmid;

    }

    public function deny_proposal(Request $request)
    {
        $vmid = $request->post('vmid');

        Machinerequire::where('vmid', $vmid)->update([
            'pnewsize' => 0
        ]);

        return $vmid;
    }
}
