<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saledetail extends Model
{
    protected $table = "salesdetails";

    protected $fillable = ['product_id','sale_id','quantity','price','active'];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function sale()
    {
        return $this->belongsTo('App\Sale');
    }

    public function payments()
    {
        return $this->hasMany('App\Payment');
    }

}
