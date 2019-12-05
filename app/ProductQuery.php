<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductQuery extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'product_queries';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'phone', 'query_message', 'product_id', 'product_type', 'status', 'terms'];

    
}
