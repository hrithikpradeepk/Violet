<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ordermodel extends Model
{
    use HasFactory;
    public function customer()
    {
        return $this->belongsTo('App\Models\registermodel','Customerid');
    }
    public function product()
    {
        return $this->belongsTo('App\Models\productmodel','Productid');
    }
}
