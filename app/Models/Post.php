<?php

namespace App\Models;

use App\Models\like;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function postCategory(){
        return $this->hasMany(PostCategory::class);
    }

    // public function postLike(){
    //     return $this->belongsToMany(User::class, 'likes');
    // }
    // public function increaseView(){
    //     return $this->belongsToMany(User::class, 'views');
    // }

    public function likes(){
        return $this->hasMany(like::class);
    }

    public function views(){
        return $this->hasMany(view::class);
    }

    public function comments(){
        return $this->hasMany(comment::class);
    }

    public function shares(){
        return $this->hasMany(share::class);
    }


}
