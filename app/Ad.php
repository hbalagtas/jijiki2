<?php

namespace Jijiki;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $fillable = ['feed_id', 'name', 'title', 'description', 'location', 'preview', 'link', 'price', 'emailed', 'created_at', 'updated_at'];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function feed()
    {
    	return $this->belongsTo(Feed::class);
    }
}
