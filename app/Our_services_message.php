<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Our_services_message extends Model
{
    protected $table = 'our_services_message';

    protected $fillable = [
        'name','email','type','message'
    ];
}
