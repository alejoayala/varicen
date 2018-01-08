<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chore extends Model
{
    protected $table = "chores";

    protected $fillable = ['title','employee_id','description','state','user_id','active','fecha_start','fecha_end'];

    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function scopeSearch($query,$filter,$dsearch)
    {
        if($filter == 1)
        {
            return $query->where('employee_id',$dsearch);   
        }else{
            return $query->where('user_id',$dsearch);
        }

    }      
}
