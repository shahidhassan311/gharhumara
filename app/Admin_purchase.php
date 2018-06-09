<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin_purchase extends Model
{
    protected $table = 'admin_purchase';

    protected $fillable = [
        'purchase_tag','address','details', 'amount', 'location', 'contact', 'status', 'images',
    ];
}
