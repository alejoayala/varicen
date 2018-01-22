<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    protected $table = "venues";

    protected $fillable = ['name','type'];

    public function patients()
    {
        return $this->hasMany('App\Patient');
    }
    
    public function bells()
    {
        return $this->hasMany('App\Bell');
    }    

}
