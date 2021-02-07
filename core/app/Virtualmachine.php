<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Machinerequire;

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
    public function comments()
    {
        return $this->hasMany(Machinerequire::class);
    }
}
