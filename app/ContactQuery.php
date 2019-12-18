<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactQuery extends Model
{
    protected $fillable = [
        'name','email','phone','query_message'
    ];
}
