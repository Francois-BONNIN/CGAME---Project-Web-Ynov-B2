<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function games()
    {
        return $this->belongsToMany('App\Game');
    }
}
