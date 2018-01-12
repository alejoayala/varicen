<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = "sales";

    protected $fillable = ['date_sale','budget_id','typetreatment_id','patient_id','cost','igv','totalprice','employee_id',
                          'cancelled','concluded','user_id','active'];

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

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function payments()
    {
        return $this->hasMany('App\Payment');
    }

    public function salesdetails()
    {
        return $this->hasMany('App\Saledetail');
    }    

    public function typetreatment()
    {
        return $this->belongsTo('App\TypeTreatment');
    }

    public function attentions()
    {
        return $this->hasMany('App\Attention');
    }
}
