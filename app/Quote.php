<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $table = "quotes";

    protected $fillable = ['datequotes','hourini','hourfin','patient_id','employee_id','statusquo_id',
                          'medic_id','typetreatment_id','duracion','active'];

    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }

    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }

    public function statusquo()
    {
        return $this->belongsTo('App\StatusQuo');
    }

    public function medic()
    {
        return $this->belongsTo('App\Employee');
    }

    public function typetreatment()
    {
        return $this->belongsTo('App\TypeTreatment');
    }
}
