<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bell extends Model
{
    protected $table = "bells";

    protected $fillable = ['dateini','datefin','hourini1_id','hourfin1_id','hourini2_id',
                          'hourfin2_id','ubigeo_id','description','employee_id','active'];

    public function hourini1()
    {
        return $this->belongsTo('App\Hour');
    }

    public function hourfin1()
    {
        return $this->belongsTo('App\Hour');
    }

    public function hourini2()
    {
        return $this->belongsTo('App\Hour');
    }

    public function hourfin2()
    {
        return $this->belongsTo('App\Hour');
    }

    public function ubigeo()
    {
        return $this->belongsTo('App\Ubigeo');
    }

    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }

    public function belldetails()
    {
        return $this->hasMany('App\BellDetail');
    }

}
