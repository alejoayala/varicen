<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = "company";

    protected $fillable = ['name','business_name','RUC','address','telephone','email','logo_img'];

}
