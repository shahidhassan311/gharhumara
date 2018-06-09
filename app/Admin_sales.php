<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin_sales extends Model
{
    protected $table = 'admin_sales';

    protected $fillable = [
        'sale_id','sale_tag','address','details', 'amount', 'location', 'contact', 'status', 'images',
    ];
}
