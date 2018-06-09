<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_data extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'name','email','contact', 'referral_id'
    ];
}
