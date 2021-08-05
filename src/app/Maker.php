<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maker extends Model
{
    public function gears()
    {
        return $this->hasMany(Gear::class);
    }
}
