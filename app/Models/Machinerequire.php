<?php

namespace App\Models;

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

    const CREATED_AT = 'createddatetime';
    const UPDATED_AT = 'modifieddatetime';
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    public function virtualmachine()
    {
        return $this->belongsTo(Virtualmachine::class, 'vmid');
    }


}
