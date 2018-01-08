<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $table = "modules";

    protected $fillable = ['name','idparent','type','active'];

    public function profiles()
    {
        return $this->belongsToMany('App\Profile')->withPivot('state')->withTimestamps();
    }

}
