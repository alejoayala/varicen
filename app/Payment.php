<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = "payments";

    protected $fillable = ['datescheduled','datepayment','sale_id','rode','employee_id','active'];

    public function sale()
    {
        return $this->belongsTo('App\Sale');
    }

    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }

}
