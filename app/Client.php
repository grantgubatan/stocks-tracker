<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    protected $dates = ['dob', 'secondary_dob'];
    public function trades()
    {
      return $this->hasMany(Trade::class);
    }

    public function trade_histories()
    {
      return $this->hasMany(TradeHistory::class);
    }

    public function user()
    {
      return $this->belongsTo(User::class);
    }
}
