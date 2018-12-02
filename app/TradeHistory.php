<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TradeHistory extends Model
{
  public function trade()
  {
    return $this->belongsTo(Trade::class);
  }

  public function client()
  {
    return $this->belongsTo(Client::class);
  }
}
