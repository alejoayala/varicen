<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = "employees";

    protected $fillable = ['name','lastname','typedocument_id','dni','charge_id',
                          'profile_id','birthdate','sex','photo','enabled','access',
                          'ubigeo_id','address','email','telephone','cellphone',
                          'active'];

    public function typedocument()
    {
        return $this->belongsTo('App\TypeDocument');
    }

    public function charges()
    {
        return $this->hasMany('App\Charge');
    }

    public function profile()
    {
        return $this->belongsTo('App\Profile');
    }

    public function ubigeo()
    {
        return $this->belongsTo('App\Ubigeo');
    }

    // Personal que realiza la atencion --- Medicos
    public function attentions()
    {
        return $this->hasMany('App\Attention');
    }

    public function belldetails()
    {
        return $this->hasMany('App\BellDetail');
    }

    public function budgets()
    {
        return $this->hasMany('App\Budget');
    }

    public function chores()
    {
        return $this->hasMany('App\Chore');
    }

    public function medicalshifts()
    {
        return $this->hasMany('App\MedicalShift');
    }

    public function sales()
    {
        return $this->hasMany('App\Sale');
    }

    public function quotes()
    {
        return $this->hasMany('App\Quote');
    }
}