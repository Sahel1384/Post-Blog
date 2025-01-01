<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
