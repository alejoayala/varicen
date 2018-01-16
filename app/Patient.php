<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table = "patients";

    protected $fillable = ['id','numberhistory','name','lastname','patient','typedocument_id','dni','sex','photo',
                          'birthdate','catchment_id','ubigeo_id','venue_id','address','email',
                          'telephone','cellphone','observations','active'];

    public function typedocument()
    {
        return $this->belongsTo('App\TypeDocument');
    }

    public function catchment()
    {
        return $this->belongsTo('App\Catchment');
    }

    public function ubigeo()
    {
        return $this->belongsTo('App\Ubigeo');
    }

    public function venue()
    {
        return $this->belongsTo('App\Venue');
    }    

    public function affections()
    {
        return $this->belongsToMany('App\Affection')->withPivot('state')->withTimestamps();
    }

    public function budgets()
    {
        return $this->hasMany('App\Budget');
    }

    public function sales()
    {
        return $this->hasMany('App\Sale');
    }

    public function quotes()
    {
        return $this->hasMany('App\Quote');
    }

    public function scopeSearch($query,$patient_name)
    {
        return $query->where('patient','LIKE',"%$patient_name%");
    }
}
