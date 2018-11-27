<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    protected $dates = ['dob'];
    public function trades()
    {
      return $this->hasMany(Trade::class);
    }

    public function user()
    {
      return $this->belongsTo(User::class);
    }
}
