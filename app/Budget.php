<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    protected $table = "budgets";

    protected $fillable = ['patient_id','employee_id','cost','igv','totalprice','date','active'];

    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }

    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }

    public function budgetdetails()
    {
        return $this->hasMany('App\BudgetDetail');
    }

    public function sale()
    {
        return $this->hasOne('App\Sale');
    }

}
