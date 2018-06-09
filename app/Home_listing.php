<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Home_listing extends Model
{
    protected $table = 'home_listing';

    protected $fillable = [
        'tag','property_name','property_area','property_floor','no_of_bedrooms','no_of_bathrooms','address','details', 'amount', 'location', 'contact', 'status', 'images',
    ];
}
