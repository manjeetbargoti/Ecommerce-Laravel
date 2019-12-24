<?php

namespace App;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class SupplierData extends Model
{

    use Notifiable,HasRoles;

    protected $fillable = [
        'business_name','description','city','state','country','category','user_id','license_number','website','trade_license_image','image'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
