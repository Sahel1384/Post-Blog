<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = [];

    public function posts(){
        return $this->belongsTo(Post::class);
    }
}
