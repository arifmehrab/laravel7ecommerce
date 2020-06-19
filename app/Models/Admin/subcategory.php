<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class subcategory extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id', 'subcategory_name', 'subcategory_slug',
    ];
}
