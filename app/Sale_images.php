<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale_images extends Model
{
    protected $table = 'sales_images';

    protected $fillable = [
        'user_id','sales_id','images',
    ];
}
