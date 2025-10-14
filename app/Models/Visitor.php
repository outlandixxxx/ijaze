<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $fillable = [
        'user_id',
        'ip_address',
        'user_agent',
        'visited_date',
    ];

    public $timestamps = true;
}
