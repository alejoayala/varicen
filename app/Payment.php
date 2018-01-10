<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = "payments";

    protected $fillable = ['date_payment','salesdetail_id','rode','user_id','active'];

    public function sale()
    {
        return $this->belongsTo('App\Sale');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
