<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = "profiles";

    protected $fillable = ['name','active'];

    public function employees()
    {
        return $this->hasMany('App\Employee');
    }

    public function modules()
    {
        return $this->belongsToMany('App\Module')->withPivot('state')->withTimestamps();
    }

}
