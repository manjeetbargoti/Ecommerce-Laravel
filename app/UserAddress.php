<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    protected $fillable = [
        'name','phone','address1','country','state','city','zipcode','user_id'
    ];
}
