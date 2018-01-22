<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Belldetail extends Model
{
    protected $table = "bellsdetails";

    protected $fillable = ['bell_id','employee_id','active'];

    public function bell()
    {
        return $this->belongsTo('App\Bell');
    }

    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }

}
