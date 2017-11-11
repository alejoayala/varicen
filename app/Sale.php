<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = "sales";

    protected $fillable = ['budget_id','patient_id','cost','igv','total_price','employee_id',
                          'state','active'];

    public function budget()
    {
        return $this->belongsTo('App\Budget');
    }

    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }

    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }

    public function payments()
    {
        return $this->hasMany('App\Payment');
    }

    public function salesdetails()
    {
        return $this->hasMany('App\SaleDetail');
    }    
}
