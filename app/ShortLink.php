<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShortLink extends Model
{
    protected $table = 'short_links';

    protected $fillable = [
        'short_link', 'original_link', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
