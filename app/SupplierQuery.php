<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupplierQuery extends Model
{
    //
    protected $fillable = [
        'name','email','phone','location','supplier_id','query_message','status'
    ];
}
