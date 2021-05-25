<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class productmodel extends Model
{
    use HasFactory;
    public function category()
    {
        return $this->belongsTo('App\Models\categorymodel','categoryid');
    }

    public function brand()
    {
        return $this->belongsTo('App\Models\brandmodel','brandid');
    }
}