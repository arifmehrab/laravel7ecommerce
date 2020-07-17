<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\product;
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
    public function product()
    {
         return $this->belongsTo(product::class, 'product_id', 'id');
    }
}
