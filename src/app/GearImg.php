<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GearImg extends Model
{
    protected $fillable = [
        'img_path',
    ];

    public function gear()
    {
        return $this->belongsTo(Camp::class);
    }
}
