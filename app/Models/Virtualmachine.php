<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Machinerequire;
use DB;

class Virtualmachine extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'customer_vms';
    protected $guarded = ['vmid'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    public function machinerequire()
    {
        return $this->hasOne(Machinerequire::class, 'vmid');
    }

    static function getSizingData(){
        return DB::table('customer_vms')
            ->join('customer_vmreq', 'customer_vms.vmid', '=', 'customer_vmreq.vmid')
            ->join('customer_vmpricing', 'customer_vms.vmid', '=', 'customer_vmpricing.vmid')
            ->select('customer_vms.*', 'customer_vmreq.*', 'customer_vmpricing.armSkuName')
            ->get();
    }
    static function getProposalData(){
        return DB::table('customer_vms')
            ->join('customer_vmreq', 'customer_vms.vmid', '=', 'customer_vmreq.vmid')
            ->select('customer_vms.*', 'customer_vmreq.*')
            ->get();
    }
}
