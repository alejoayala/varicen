<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Charge extends Model
{
    protected $table = "charges";

    protected $fillable = ['name','active'];

    public function employees()
    {
        return $this->hasMany('App\Employee');
    }    
    
}
