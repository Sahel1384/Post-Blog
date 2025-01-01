<?php

namespace App\Http\Controllers;

use App\Models\comment;
use App\Models\Post;
use App\Models\view;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function comment($id){
        $post = Post::find($id);
        return view('user.comment',compact('post'));
    }

    public function commentProcess(Request $request, $id){
        
            comment::create([
                'post_id' => $id,
                'user_id' => Auth::id(),
                'comment' => $request->texteara,
            ]);
            // return back();
            return redirect()->route('user_sign_up.index');
        }
}
