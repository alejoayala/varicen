<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cie10 extends Model
{
    protected $table = "cie10";

    protected $fillable = ['code','name','active'];

    public function attentions()
    {
        return $this->hasMany('App\Attention');
    }
}
