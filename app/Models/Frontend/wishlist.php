<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class wishlist extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'product_id',
    ];
}
