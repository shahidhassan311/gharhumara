<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    protected $table = 'notification';

    protected $fillable = [
        'name','notification_url','status'
    ];
}
