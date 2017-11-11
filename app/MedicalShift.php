<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicalShift extends Model
{
    protected $table = "medicalshifts";

    protected $fillable = ['employee_id','day','hourini1_id','hourfin1_id','hourini2_id',
                          'hourfin2_id','active'];

    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }

    public function hourini1()
    {
        return $this->belongsTo('App\Hour');
    }

    public function hourfin1()
    {
        return $this->belongsTo('App\Hour');
    }

    public function hourini2()
    {
        return $this->belongsTo('App\Hour');
    }

    public function hourfin2()
    {
        return $this->belongsTo('App\Hour');
    }
}
