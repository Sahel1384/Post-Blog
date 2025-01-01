<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchData(Request $request)
    {
        $searchResult = $request->search;

        $user = User::where('name', 'like', '%'.$searchResult.'%')
                    ->orWhere('email' , 'like', '%'.$searchResult.'%')
                    ->get();

        $post = Post::with('user')
                    ->where('title', 'like', '%' .$searchResult. '%')
                    ->orWhere('discription', 'like' , '%' .$searchResult. '%')
                    ->withCount(['views', 'likes', 'comments', 'shares'])
                    ->get();

        $merge = $user->merge($post);

        return view('search.searchResult', compact('merge'));
    }
}
