<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Machinerequire extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'customer_vmreq';
    protected $guarded = ['vmid'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}
