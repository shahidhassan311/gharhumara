<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property_message extends Model
{
    protected $table = 'property_message';

    protected $fillable = [
        'name','email','contact','type','message','property_id'
    ];
}
