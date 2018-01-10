<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeTreatment extends Model
{
    protected $table = "typetreatments";

    protected $fillable = ['name','active'];

    public function quotes()
    {
        return $this->hasMany('App\Quote');
    }

    public function sales()
    {
        return $this->hasMany('App\Sale');
    }

}
