<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    protected $fillable = [
        'firstName','lastName','email','address','phoneNumber', 'password','districtName'
    ];
}
