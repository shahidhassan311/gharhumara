<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin_sales extends Model
{
    protected $fillable = [
        'sale_tag','address','details', 'amount', 'location', 'contact', 'status', 'images',
    ];
}
