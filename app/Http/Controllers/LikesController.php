<?php

namespace App\Http\Controllers;

use App\Models\like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikesController extends Controller
{
    public function like($id){
        // $post = Post::findOrFail($id);
        // $user = Auth::user();

        $likeExists = like::where('post_id', $id)->where('user_id', Auth::id())->first();
        if($likeExists){
            $likeExists->delete();
            return back();
        }else{
            like::create([
                'post_id'=>$id,
                'user_id'=>Auth::id(),
            ]);
            return back();
        }
    }
}
