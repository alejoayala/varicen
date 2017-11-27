<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Affection extends Model
{
    protected $table = "affections";

    protected $fillable = ['name','abrev','active'];

    public function patients()
    {
      return $this->belongsToMany('App\Patient');
    }
}
