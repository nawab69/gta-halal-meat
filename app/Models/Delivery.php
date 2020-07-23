<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $guarded = [];

    public function order(){
        return $this->belongsTo(Order::class,'order_id');
    }
}
