<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categorymodel extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo('App\Models\productmodel');
    }
}
