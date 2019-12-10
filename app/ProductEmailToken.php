<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductEmailToken extends Model
{
    protected $fillable = [
        'product_id','email','token'
    ];
}
