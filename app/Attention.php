<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attention extends Model
{
    protected $table = "attentions";

    protected $fillable = ['employee_id','quote_id','sys','exam','treatment','cie10_id','active'];

    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }

    public function quote()
    {
        //return $this->hasOne('App\Quote');
        return $this->belongsTo('App\Quote');
    }

    public function cie10()
    {
        return $this->belongsTo('App\Cie10');
    }
}
