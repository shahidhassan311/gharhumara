<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Home_listing_images extends Model
{
    protected $table = 'home_listing_images';

    protected $fillable = [
        'home_listing_id','images'
    ];
}
