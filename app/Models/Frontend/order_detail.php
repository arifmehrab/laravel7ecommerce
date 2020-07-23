<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\product;
class order_detail extends Model
{
    // belongs to product.. 
    public function product(){
        return $this->belongsTo(product::class, 'product_id',  'id');
    }
}
