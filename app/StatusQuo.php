<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusQuo extends Model
{
    protected $table = "statusquo";

    protected $fillable = ['name','active'];

    public function quotes()
    {
        return $this->hasMany('App\Quote');
    }

}
