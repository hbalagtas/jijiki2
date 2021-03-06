<?php

namespace Jijiki;

use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    protected $fillable = ['user_id', 'name', 'feed', 'created_at', 'updated_at'];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function ads()
    {
    	return $this->hasMany(Ad::class);
    }
}
