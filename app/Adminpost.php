<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adminpost extends Model
{
    //
    protected $fillable = [
        'title', 'decriptions', 'post_image', 'admin_id', 'category_id',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
