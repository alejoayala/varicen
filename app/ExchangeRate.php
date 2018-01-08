<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExchangeRate extends Model
{
    protected $table = "exchangerates";

    protected $fillable = ['fecha','valor','user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
  
  
}
