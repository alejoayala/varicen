<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attention extends Model
{
    protected $table = "attentions";

    protected $fillable = ['date_attention','sale_id','employee_id','type','sys','exam','treatment','turn','cie10_id','active'];

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
