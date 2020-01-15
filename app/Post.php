<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = [
        'title', 'decriptions', 'post_image', 'user_id', 'category_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
