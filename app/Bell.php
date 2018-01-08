<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bell extends Model
{
    protected $table = "bells";

    protected $fillable = ['dateini','datefin','hourini1_id','hourfin1_id','hourini2_id',
                          'hourfin2_id','ubigeo_id','description','user_id','active'];

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

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function belldetails()
    {
        return $this->hasMany('App\BellDetail');
    }

}
