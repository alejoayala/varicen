<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }   
    
    public function exchangerates()
    {
        return $this->hasMany('App\ExchangeRate');
    }   
    
    public function chores()
    {
        return $this->hasMany('App\Chore');
    }    

    public function sales()
    {
        return $this->hasMany('App\Sale');
    }

    public function payments()
    {
        return $this->hasMany('App\Payment');
    }
}
