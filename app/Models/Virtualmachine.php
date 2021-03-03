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

    const CREATED_AT = 'createddatetime';
    const UPDATED_AT = 'modifieddatetime';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    public function machinerequire()
    {
        return $this->hasOne(Machinerequire::class, 'vmid');
    }

    static function getSizingData()
    {
        if (auth()->user()->is_admin == 1) {
            return DB::table('customer_vms')
                ->join('customer_vmreq', 'customer_vms.vmid', '=', 'customer_vmreq.vmid')
                ->join('customer_vmpricing', 'customer_vms.vmid', '=', 'customer_vmpricing.vmid')
                ->select('customer_vms.*', 'customer_vmreq.*', 'customer_vmpricing.armSkuName')
                ->where('customer_vmpricing.armSkuName', '<>', null)
                ->get();
        } else {
            return DB::table('customer_vms')
                ->join('customer_vmreq', 'customer_vms.vmid', '=', 'customer_vmreq.vmid')
                ->join('customer_vmpricing', 'customer_vms.vmid', '=', 'customer_vmpricing.vmid')
                ->select('customer_vms.*', 'customer_vmreq.*', 'customer_vmpricing.armSkuName')
                ->where('customer_vmpricing.armSkuName', '<>', null)
                ->where('customer_vms.customerid', auth()->user()->customer_id)
                ->get();
        }
    }
    static function getUnsupportedData()
    {
        if (auth()->user()->is_admin == 1) {
            return DB::table('customer_vms')
                ->join('customer_vmreq', 'customer_vms.vmid', '=', 'customer_vmreq.vmid')
                ->select('customer_vms.*', 'customer_vmreq.unsupportedreason')
                ->where('customer_vmreq.unsupportedreason', '<>', null)
                ->get();
        } else {
            return DB::table('customer_vms')
                ->join('customer_vmreq', 'customer_vms.vmid', '=', 'customer_vmreq.vmid')
                ->select('customer_vms.*', 'customer_vmreq.unsupportedreason')
                ->where('customer_vmreq.unsupportedreason', '<>', null)
                ->where('customer_vms.customerid', auth()->user()->customer_id)
                ->get();
        }
    }

    static function getProposalData()
    {
        if (auth()->user()->is_admin == 1) {
            return DB::table('customer_vms')
                ->join('customer_vmreq', 'customer_vms.vmid', '=', 'customer_vmreq.vmid')
                ->select('customer_vms.*', 'customer_vmreq.*')
                ->where('customer_vmreq.pnewsize', 1)
                ->get();
        } else {
            return DB::table('customer_vms')
                ->join('customer_vmreq', 'customer_vms.vmid', '=', 'customer_vmreq.vmid')
                ->select('customer_vms.*', 'customer_vmreq.*')
                ->where('customer_vms.customerid', auth()->user()->customer_id)
                ->where('customer_vmreq.pnewsize', 1)
                ->get();
        }
    }

    static function getTotalVmsCount()
    {
        if (auth()->user()->is_admin == 1) {
            return DB::table('customer_vms')
                ->get()->count();
        } else {
            return DB::table('customer_vms')
                ->where('customer_vms.customerid', auth()->user()->customer_id)
                ->get()->count();
        }
    }

    static function getTotalRequireCount()
    {
        if (auth()->user()->is_admin == 1) {
            return DB::table('customer_vms')
                ->join('customer_vmreq', 'customer_vms.vmid', '=', 'customer_vmreq.vmid')
                ->select('customer_vms.*', 'customer_vmreq.*')
                ->where('region', null)
                ->orWhere('hourson', null)
                ->orWhere('pricetype', null)
                ->orWhere('backupretdays', null)
                ->get()->count();
        } else {
            return DB::table('customer_vms')
                ->join('customer_vmreq', 'customer_vms.vmid', '=', 'customer_vmreq.vmid')
                ->select('customer_vms.*', 'customer_vmreq.*')
                ->where('customer_vms.customerid', auth()->user()->customer_id)
                ->orWhere(function($query){
                    $query->where('region', null);
                    $query->where('pricetype', null);
                    $query->where('hourson', null);
                    $query->where('backupretdays', null);
                })
                ->get()->count();
        }
    }

    static function getTotalRecognizeCount()
    {
        if (auth()->user()->is_admin == 1) {
            return DB::table('customer_vms')
                ->join('customer_vmreq', 'customer_vms.vmid', '=', 'customer_vmreq.vmid')
                ->select('customer_vms.*', 'customer_vmreq.*')
                ->where('region', null)
                ->orWhere('hourson', null)
                ->orWhere('pricetype', null)
                ->orWhere('backupretdays', null)
                ->orWhere('tempstoragegb', null)
                ->get()->count();
        } else {
            return DB::table('customer_vms')
                ->join('customer_vmreq', 'customer_vms.vmid', '=', 'customer_vmreq.vmid')
                ->select('customer_vms.*', 'customer_vmreq.*')
                ->where('customer_vms.customerid', auth()->user()->customer_id)
                ->orWhere(function($query){
                    $query->where('region', null);
                    $query->where('pricetype', null);
                    $query->where('hourson', null);
                    $query->where('backupretdays', null);
                    $query->where('tempstoragegb', null);
                })
                ->get()->count();
        }
    }

    static function getTotalProposedCount()
    {
        if (auth()->user()->is_admin == 1) {
            return DB::table('customer_vms')
                ->join('customer_vmreq', 'customer_vms.vmid', '=', 'customer_vmreq.vmid')
                ->select('customer_vms.*', 'customer_vmreq.*')
                ->where('pvmdiskcount', '<>', null)
                ->where('pvmproccount', '<>', null)
                ->get()->count();
        } else {
            return DB::table('customer_vms')
                ->join('customer_vmreq', 'customer_vms.vmid', '=', 'customer_vmreq.vmid')
                ->select('customer_vms.*', 'customer_vmreq.*')
                ->where('pvmdiskcount', '<>', null)
                ->where('pvmproccount', '<>', null)
                ->where('customer_vms.customerid', auth()->user()->customer_id)
                ->get()->count();
        }
    }
    static function getTotalDonotmigrateCount()
    {
        if (auth()->user()->is_admin == 1) {
            return DB::table('customer_vms')
                ->join('customer_vmreq', 'customer_vms.vmid', '=', 'customer_vmreq.vmid')
                ->select('customer_vms.*', 'customer_vmreq.*')
                ->where('donotmigrate', 1)
                ->get()->count();
        } else {
            return DB::table('customer_vms')
                ->join('customer_vmreq', 'customer_vms.vmid', '=', 'customer_vmreq.vmid')
                ->select('customer_vms.*', 'customer_vmreq.*')
                ->where('donotmigrate', 1)
                ->where('customer_vms.customerid', auth()->user()->customer_id)
                ->get()->count();
        }
    }
}
