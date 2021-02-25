<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'customers';
    protected $guarded = ['customerid'];

    const CREATED_AT = null;
    const UPDATED_AT = null;

    protected $fillable = [
        'customerid',
        'customername',
        'currency'
    ];
}
