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
    
    public function campImgs()
    {
        return $this->hasMany(CampImg::class);
    }

    public function like_users()
    {
            return $this->belongsToMany(User::class, 'likes', 'camp_id', 'user_id')->withTimestamps();
    }

    public function bookmark_users()
    {
            return $this->belongsToMany(User::class, 'likes', 'camp_id', 'user_id')->withTimestamps();
    }
}
