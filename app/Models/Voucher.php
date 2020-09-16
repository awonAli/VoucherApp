<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
public $timestamps = false;

  public function recipient()
  {
    return $this->belongsTo('App\Models\Recipient');
  }
  public function offer()
  {
    return $this->belongsTo('App\Models\Offer');
  }
}
