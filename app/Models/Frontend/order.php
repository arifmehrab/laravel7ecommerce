<?php

namespace App\Models\Frontend;
use App\User;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    // belongs to user.. 
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
