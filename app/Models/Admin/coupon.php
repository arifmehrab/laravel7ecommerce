<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class coupon extends Model
{
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'coupon', 'discount','status',
    ];
}
