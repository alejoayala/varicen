<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeDocument extends Model
{
    protected $table = "typedocuments";

    protected $fillable = ['name','type','active'];

    public function employees()
    {
        return $this->hasMany('App\Employee');
    }

    public function patients()
    {
        return $this->hasMany('App\Patient');
    }

}
