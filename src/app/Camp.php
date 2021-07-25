<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Camp extends Model
{
    protected $fillable = [
        'date', 'title', 'discription', 'location'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
