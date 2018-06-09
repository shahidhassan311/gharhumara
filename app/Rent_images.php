<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rent_images extends Model
{
    protected $table = 'rent_images';

    protected $fillable = [
        'user_id','rent_id','images',
    ];
}
