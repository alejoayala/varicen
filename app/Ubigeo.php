<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ubigeo extends Model
{
    protected $table = "ubigeos";

    protected $fillable = ['coddpto','codprov','coddist','nombre'];

    public function patients()
    {
        return $this->hasMany('App\Patient');
    }

    public function employees()
    {
        return $this->hasMany('App\Employee');
    }

    public function bells()
    {
        return $this->hasMany('App\Bell');
    }

}
