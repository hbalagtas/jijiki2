<?php

namespace Jijiki;

use Illuminate\Database\Eloquent\Model;

class Blocklist extends Model
{
    protected $fillable = ['keyword', 'created_at', 'updated_at'];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
