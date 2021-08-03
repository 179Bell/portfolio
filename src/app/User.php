<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes; 

class User extends Authenticatable
{
    use Notifiable;
    use softdeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'bike', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function camps()
    {
        return $this->hasMany(Camp::class);
    }

    public function likes()
    {
        return $this->belongsToMany(Camp::class, 'likes', 'user_id', 'camp_id')->withTimestamps();
    }

    public function bookmarks()
    {
        return $this->belongsToMany(Camp::class, 'bookmarks', 'user_id', 'camp_id')->withTimestamps();
    }

    // いいねの有無を確認する
    public function is_like($campId)
    {
        return $this->likes()->where('camp_id', $campId)->exists();
    }

    //いいねをする
    public function like($campId)
    {
        $exist = $this->is_like($campId);

        if ($exist) {
            return false;
        } else {
            $this->likes()->attach($campId);
        }
    }
    //いいねを外す
    public function unlike($campId)
    {
        $exist = $this->is_like($campId);

        if ($exist) {
            $this->likes()->detach($campId);
            return true;
        } else {
            return false;
        }
    }
    
    // お気に入りの有無を確認する
    public function is_bookmark($campId)
    {
        return $this->bookmarks()->where('camp_id', $campId)->exists();
    }

    //お気に入りに登録
    public function bookmark($campId)
    {
        $exist = $this->is_bookmark($campId);

        if ($exist) {
            return false;
        } else {
            $this->bookmarks()->attach($campId);
        }
    }
    //お気に入りを外す
    public function unbookmark($campId)
    {
        $exist = $this->is_bookmark($campId);

        if ($exist) {
            $this->bookmarks()->detach($campId);
            return true;
        } else {
            return false;
        }
    }
}
