<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'content'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function image()
    {
        return $this->hasOne(Image::class);
    }

    //--------

    public function usersThatLike()
    {
        return $this->morphToMany(User::class, 'likeable')->withPivot('id');
    }

    public function isLiked()
    {
        return $this->usersThatLike()->where('user_id', Auth::user()->id)->exists();
    }

    public function countOfLikes()
    {
        return $this->usersThatLike()->count();
    }

    //--------

    public function usersThatBookmark()
    {
        return $this->morphToMany(User::class, 'bookmark')->withPivot('id');
    }

    public function isBookmarked()
    {
        return $this->usersThatBookmark()->where('user_id', Auth::user()->id)->exists();
    }
}
