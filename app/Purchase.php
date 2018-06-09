<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $table = 'purchase';

    protected $fillable = [
        'purchase_tag','address','details', 'amount', 'location', 'contact', 'status', 'images',
    ];
}
