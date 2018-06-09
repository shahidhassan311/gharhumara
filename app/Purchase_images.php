<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase_images extends Model
{
    protected $table = 'purchase_images';

    protected $fillable = [
        'user_id','purchase_id','images',
    ];
}
