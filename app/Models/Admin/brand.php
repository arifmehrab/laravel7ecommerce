<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class brand extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'brand_name', 'brand_logo',
    ];
}
