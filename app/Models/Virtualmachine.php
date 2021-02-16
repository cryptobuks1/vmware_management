<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Machinerequire;

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
}
