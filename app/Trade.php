<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trade extends Model
{

  protected $dates = ['buy_date', 'due_date'];
  public function client()
  {
    return $this->belongsTo(Client::class);
  }
}
