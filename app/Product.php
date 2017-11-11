<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";

    protected $fillable = ['name','price','active'];

    public function budgetdetails()
    {
        return $this->hasMany('App\Product');
    }

    public function salesdetails()
    {
        return $this->hasMany('App\SaleDetail');
    }
}
