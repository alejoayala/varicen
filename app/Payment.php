<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = "payments";

    protected $fillable = ['date_payment','saledetail_id','attention_id','rode','user_id','active'];

    public function saledetail()
    {
        return $this->belongsTo('App\SaleDetail');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function attention()
    {
        return $this->belongsTo('App\Attention');
    }

}
