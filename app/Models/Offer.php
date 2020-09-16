<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    public $timestamps = false;

    public function voucher()
    {
      return $this->hasMany('App\Models\Voucher');
    }
}
