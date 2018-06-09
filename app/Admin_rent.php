<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin_rent extends Model
{
    protected $table = 'admin_rent';

    protected $fillable = [
        'rent_tag','address','details','rent_amount', 'advanced_amount', 'location', 'contact', 'status', 'images',
    ];
}
