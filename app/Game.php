<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }
}
