<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function purchases()
    {
        return $this->belongsToMany('App\Purchase');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }
}
