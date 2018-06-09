<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $table = 'sales';

    protected $fillable = [
        'sale_tag','address','details', 'amount', 'location', 'contact', 'status', 'images',
    ];
}
