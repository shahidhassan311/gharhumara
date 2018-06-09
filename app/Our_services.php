<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Our_services extends Model
{
    protected $table = 'our_services';

    protected $fillable = [
        'name','details','image'
    ];
}
