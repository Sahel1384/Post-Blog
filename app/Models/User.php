<?php

namespace App\Models;

use App\Models\like;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable

{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = [];

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function likes(){
        return $this->hasMany(like::class);
    }

    public function views(){
        return $this->hasMany(view::class);
    }

    public function comments(){
        return $this->hasMany(comment::class);
    }
}
