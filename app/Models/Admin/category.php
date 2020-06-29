<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_name', 'category_slug',
    ];
   

}
