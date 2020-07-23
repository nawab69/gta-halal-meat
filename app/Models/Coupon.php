<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $guarded = [];

    public function discound($total){
        if($this->type=='fixed'){
            return $this->value;

        }
        else if($this->type=='percent')
        {
            return ($this->percent /100)*$total;
        }
        else {
            return 0;
        }
    }
}
