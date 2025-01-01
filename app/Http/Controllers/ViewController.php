<?php

namespace App\Http\Controllers;

use App\Models\view;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewController extends Controller
{
    public function view($id){
        $exists = view::where('post_id', $id)->where('user_id', Auth::id())->first();
        if($exists){
            $exists->delete();
            return back();
        }else{
            view::create([
                'post_id' => $id,
                'user_id' => Auth::id(),
            ]);
            return back();

        }
    }
}
