<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attention extends Model
{
    protected $table = "attention";

    protected $fillable = ['employee_id','quote_id','sys','treatment','cie10_id','active'];

    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }

    public function quote()
    {
        return $this->hasOne('App\Quote');
    }

    public function cie10()
    {
        return $this->belongsTo('App\Cie10');
    }
}
