<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    // public function sluggable()
    // {
    //     return [
    //         'product_slug' => [
    //             'source' => 'product_name'
    //         ]
    //     ];
    // }

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';

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
    protected $fillable = [
        'product_name','product_slug','product_code','product_category','quantity','vendor','initial_stock','current_stock',
        'buying_price','selling_price','user_id','status','is_premium','product_description'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
