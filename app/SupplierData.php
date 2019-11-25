<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupplierData extends Model
{
    protected $fillable = [
        'business_name','city','state','country','category','user_id'
    ];
}
