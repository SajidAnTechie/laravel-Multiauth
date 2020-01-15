<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public function adminposts()
    {
        return $this->belongsToMany(Adminpost::class);
    }
}
