<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'postcategory_id', 'post_title_en', 'post_title_bn', 'post_details_en', 'post_details_bn', 'post_image',
    ];
    // Belongs To Postcategory.. 
    public function postcategory(){
        return $this->belongsTo(postcategory::class, 'postcategory_id', 'id');
    }
}
