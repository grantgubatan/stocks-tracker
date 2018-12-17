<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TradeHistory extends Model
{
  protected $dates = ['buy_date', 'sell_date'];
  public function trade()
  {
    return $this->belongsTo(Trade::class);
  }

  public function client()
  {
    return $this->belongsTo(Client::class);
  }
}
