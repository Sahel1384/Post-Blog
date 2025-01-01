<?php

namespace App\Http\Controllers;

use App\Models\comment;
use App\Models\like;
use App\Models\Post;
use App\Models\User;
use App\Models\PostCategory;
use App\Models\share;
use App\Models\view;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function settingSection()
    {
        $user = Post::with(['likes', 'views', 'comments', 'user'])
        ->join('post_categories', 'posts.category', '=', 'post_categories.id')
        ->select('posts.*', 'post_categories.category')
        ->where('user_id' , Auth::id())->withCount(['views', 'comments', 'likes','shares'])
        ->paginate(3);
        // Users Posts
        $postCount = Post::where('user_id', Auth::id())->count();
        $likeCount = like::where('user_id', Auth::id())->count();
        $viewCount = view::where('user_id', Auth::id())->count();


        // Admin info

        $allUsers = User::where('user_role', 'user')->count();
        $allPosts = Post::count();
        $allCategory = PostCategory::count();
        $allUsersInfo = User::with('posts')->where('user_role', 'user')->withCount(['posts'])->get();

        // only admins data
        $allAdminsInfo = User::with('posts')->where('user_role', 'admin')->withCount(['posts'])->get();

        
        return view('user.settingSection', compact(['user', 'postCount', 'likeCount', 'viewCount','allUsers','allPosts','allCategory','allUsersInfo','allAdminsInfo']));
           
    }
     // settings method
    //  public function settings($id){
    //     $post = Post::get();
    //     return view('user.settings', compact('post'));
    // }

    // // post views
    // public function increaseViews($id)
    // {
    //     $post = Post::findOrFail($id);

    //     if(Auth::check() && !$post->increaseView->contains(Auth::id())){
    //         $post->increment('views');
    //         $post->increaseView()->attach(Auth::id());
    //     }   
    //     return redirect()->route('user_sign_up.index');
    //     // return 'success';
    // }

    // // post likes
    // public function postLikes($id)
    // {
    //     $post = Post::findOrFail($id);
        
    //     // like the post
    //     if(Auth::check() && !$post->postLike->contains(Auth::id())){
    //         $post->increment('likes');
    //         $post->postLike()->attach(Auth::id());
    //     }
    //     // dislike the post
    //     else{
    //         $post->decrement('likes');
    //         $post->postLike()->detach(Auth::id());
    //     }
    //     return redirect()->route('user_sign_up.index');
    // }

    // public function duplicatePost($id)
    // {
    //     $post = Post::findOrFail($id);

    //     $newPost = $post->replicate();

    //     $newPost->title = $post->title . ' (Copy)';
    //     $newPost->user_id = Auth::id();

    //     $newPost->save();

    //     return redirect()->back()->with('success', 'Post duplicated successfully!');
    // }


    public function share($id)
    {
        $post = Post::select('posts.*', 'post_categories.category')
                ->join('post_categories', 'posts.category' , '=' ,'post_categories.id')
                ->where('posts.id', $id)
                ->first();

        $postCategory = PostCategory::all();
        return view('user.share', compact('post', 'postCategory'));

    }

    public function shareProcess(Request $request, $id)
    {
        $post = Post::find($id);

        $path = $request->image->store('post_images', 'public');

        $post::create([
            'title' => $request->title,
            'discription' => $request->discription,
            'date' => $request->date,
            'category' => $request->category,
            'state' => $request->state,
            'image' => $path,
            'user_id' => Auth::id(),
        ]);

        share::create([
            'post_id' => $post->id,
            'user_id' => Auth::id()
        ]);

        return redirect()->route('user_sign_up.index');
    }

    public function seeComment($id){
        $posts = Post::with(['user','comments.user'])->find($id);
        $comments = $posts->comments;
        return view('user.seeComments', compact('posts', 'comments'));

    }

    // }

    public function myPost()
    {
        $posts = Post::select('posts.*', 'post_categories.category')
                    ->join('post_categories', 'posts.category', '=', 'post_categories.id')
                    ->where('posts.user_id', Auth::id())
                    ->paginate(3); 

                    return view('user.myPost', compact('posts'));

    }
    

    // draft and published methods
    public function draftPost(){

        $posts = Post::select('posts.*', 'post_categories.category')
                        ->join('post_categories', 'posts.category', '=', 'post_categories.id')
                        ->whereState('Draft')
                        ->where('posts.user_id', Auth::id())
                        ->paginate(3);
        return view('user.user_draft_posts', compact('posts'));

    }

    public function publishPost(){
        $posts = Post::select('posts.*', 'post_categories.category')
                ->join('post_categories', 'posts.category', '=' ,'post_categories.id')
                ->where('posts.user_id', Auth::id())
                ->where('state','Publish')
                ->paginate(3);

                return view('user.user_publish_posts', compact('posts'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return Post::find(1);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post = $request->validate([
            'title' => 'required|max:20',
            'discription' => 'required|max:150',
            'date' => 'required',
            'category' => 'required',
            'state' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg,gif,webp|max:3000'
        ]);

        $image_path = $request->image->store('post_images', 'public');

        Post::create([
            'title' => $request->title,
            'discription' => $request->discription,
            'date' => $request->date,
            'category' => $request->category,
            'state' => $request->state,
            'image' => $image_path,
            'user_id' => Auth::id(),
        ]);
        return redirect()->route('myPost');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {   
        // $postSingle = Post::whereId($id)->first();
        // return view('user.post_single_show', compact('postSingle'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::select('posts.*', 'post_categories.category')
                ->join('post_categories', 'posts.category' , '=' ,'post_categories.id')
                ->where('posts.id', $id)
                ->first();

        $postCategory = PostCategory::all();
        return view('user.post_update', compact('post', 'postCategory'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::find($id);
        // $request->validate([
        //     'title' => 'required',
        //     'discription' => 'discription',
        //     'date' => 'date',
        //     'image' => 'mimes:png,jpg, jpeg.webp,gif'
        // ]);

        if($request->hasFile('image')){
            $image_old = public_path('/storage/') . $post->image;
            if(file_exists($image_old)){
                @unlink($image_old);
            }
            $path = $request->image->store('post_images', 'public');
            $post->image = $path;
            $post->save();
        }

        $post->title = $request->title;
        $post->discription = $request->discription;
        $post->date = $request->date;
        $post->category = $request->category;
        $post->state = $request->state;
        $post->save(); 
        return redirect()->route('myPost');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Post::destroy($id);
        return back();
    }

}
