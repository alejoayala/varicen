<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Charge extends Model
{
    protected $table = "charges";

    protected $fillable = ['name','active'];

    
}
