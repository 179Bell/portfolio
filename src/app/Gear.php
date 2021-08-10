<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gear extends Model
{
    protected $fillable = [
        'name', 'comment', 'maker_name'
    ];
    
    public function gearImgs()
    {
        return $this->hasMany(GearImg::class);
    }

    public function gear()
    {
        return $this->belongsTo(Maker::class);
    }
}