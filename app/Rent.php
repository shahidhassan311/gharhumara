<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    protected $table = 'rent';

    protected $fillable = [
        'rent_tag','address','details','rent_amount', 'advanced_amount', 'location', 'contact', 'status', 'images',
    ];
}
