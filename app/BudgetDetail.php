<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BudgetDetail extends Model
{
    protected $table = "budgetdetails";

    protected $fillable = ['budget_id','product_id','quantity','price','active'];

    public function budget()
    {
        return $this->belongsTo('App\Budget');
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
