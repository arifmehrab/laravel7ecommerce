<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id', 'subcategory_id', 'brand_id', 'product_name', 'product_code', 'product_quantity', 'product_details', 'product_color', 'product_size', 'selling_price', 'video_link', 'main_slider', 'hot_deal', 'best_rated', 'mid_slider', 'hot_new', 'trendy', 'image_one', 'image_two', 'image_three', 'status', 
    ];
    // Belongs To Category... 
    public function category() {
        return $this->belongsTo(category::class, 'category_id', 'id');
    }
    // Belongs To Brand... 
    public function brand() {
        return $this->belongsTo(brand::class, 'brand_id', 'id');
    }
    // Belongs Subcategory... 
    public function subcategory(){
        return $this->belongsTo(subcategory::class, 'subcategory_id', 'id');
    }
}
