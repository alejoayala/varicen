<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catchment extends Model
{
    protected $table = "catchment";

    protected $fillable = ['name'];

    public function patients()
    {
        return $this->hasMany('App\Patient');
    }
}
