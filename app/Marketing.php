<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marketing extends Model
{
    protected $table = 'marketing';

    protected $fillable = [
        'name', 'email', 'contact', 'dfb'
    ];
}
