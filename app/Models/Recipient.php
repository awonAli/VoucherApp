<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipient extends Model
{
    public $timestamps = false;

    public function vouchers()
  {
    return $this->hasMany('App\Models\Voucher');
  }

}
