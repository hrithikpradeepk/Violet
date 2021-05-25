<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cartmodel extends Model
{
    use HasFactory;

    public function product()
    {
        return $this->belongsTo('App\Models\productmodel','Productid');
    }
    
}

