<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'camp_id', 'user_name', 'comment',
    ];

    public function camp()
    {
        return $this->belongsTo(Camp::class);
    }
}
