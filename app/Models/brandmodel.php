<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class brandmodel extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo('App\Models\productmodel');
        return $this->belongsTo('App\Models\brandmodel');
    }
    public function category()
    {
        return $this->belongsTo('App\Models\categorymodel','categoryid');
    }
}

