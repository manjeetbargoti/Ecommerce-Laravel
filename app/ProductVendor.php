<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductVendor extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'product_vendors';

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
    protected $fillable = ['name', 'business_name', 'status', 'description'];

    
}
