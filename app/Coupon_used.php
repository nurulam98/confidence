<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon_used extends Model
{
    //
    protected $table = 'coupon_used';
      protected $fillable = ['coupon'];
}
