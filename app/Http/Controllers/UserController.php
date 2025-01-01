<?php

namespace App\Http\Controllers;

use App\Mail\ResetPasswordMail;
use App\Models\Post;
use App\Models\User;
use App\Models\view;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{

    public function add_admin(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|mimes:png,jpg,webp,jpeg,gif|max:3000',
            'email' => 'required',
            'password' => 'required|confirmed',
            'db' => 'required',
            'check' => 'required',
            'user_role' => 'required',
        ]);
        $image_path = $request->image->store('user_img', 'public');

        $user = User::create([
            'name' => $request->name,
            'image' => $image_path,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'db' => $request->db,
            'gender' => $request->check,
            'user_role' => $request->user_role,
        ]);
        if($user){
            return redirect()->route('settingSection');
        }
    }

    // user setting method
    public function settingLogin()
    {
        if(Auth::check())
        {
            return view('user.settingLogin');
        }else{
            return redirect()->route('loginPage');
        }
    }
    // public function settingSection(Request $request)
    // {
    //     $user = User::withCount(['posts', 'likes', 'views'])
    //                         ->join('')
    //                         ->whereId(Auth::id())->paginate(2);
            
    //     return view('user.settingSection', compact('user'));
           
    // }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();
        // if($user->user_role == 'admin'){
        //     if(Auth::attempt($credentials)){
        //         return redirect()->route('adminDashboard');
        //     }else{
        //         return redirect()->route('loginPage');
        //     }
        // }else{
            if(Auth::attempt($credentials)){
                return redirect()->route('home_page');
            }else{
                return redirect()->route('loginPage');
            }
        // }
        
    }

    public function adminDashboard()
    {
        $user = User::whereHas('posts', function($query){
            $query->where('state', 'publish');
        })->with(['posts' => function($query){
            $query->withCount(['likes', 'views', 'comments', 'shares']);
        }])->get();

        return view('admin.adminDashboard', compact('user'));
    }

    public function home_page()
    {
        // if(Auth::check()){
        //     return redirect()->route('user_sign_up.index');
        // }else{
        //     return redirect()->route('login');
        // }

        return redirect()->route('user_sign_up.index');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('loginPage');
    }


    // forgetPassword methods
    public function forgetPassword()
    {
        return view('user.forgetPassword');
    }

    public function forgetPasswordProcess(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);
        
        $token = Str::random(60);
        DB::table('reset_password_tokens')->whereEmail($request->email)->delete();

        DB::table('reset_password_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
        ]);

        $user = User::where('email', $request->email)->first();
        $formData = [
            'token' => $token,
            'user' => $user,
            'MailSubject' => 'You have requested for reset password',
        ];
        
         Mail::to($request->email)->send(new ResetPasswordMail($formData));
        return redirect()->route('forgetPassword')->with('success', 'Please Check Your Email Inbox To Reset Password');
    }

    public function resetPassword($token)
    {
        
        $tokenExists = DB::table('reset_password_tokens')->where('token', $token)->first();
        if(!$tokenExists){
            return redirect()->route('forgetPassword')->with('error', 'Invalid Token');
        }else{
            return view('user.resetPasswordForm', ['token' => $token]);
        }
    }

    public function resetPasswordProcess(Request $request)
    {
        $request->validate([
            'new_password' => 'required|confirmed',
            'new_password_confirmation' => 'required',
        ]);

        $tokenObject = DB::table('reset_password_tokens')->where('token', $request->token)->first();

        if(!$tokenObject){
            return redirect()->route('forgetPassword')->with('error', 'Invalid Token');
        }

        $user = User::where('email',$tokenObject->email)->update([
            'password' => Hash::make($request->new_password),
        ]);

        // return ;

        // if($user){
            return redirect()->route('loginPage')->with('success', 'Your Password Changed Successfully');
        // }

    }


    // profile method
    public function profileSetting()
    {
        $user = User::where('id', Auth::id())->first();
        return view('user.user_profile_setting', compact('user'));
    }
    public function profileSettingProcess(Request $request, $id)
    {
        $user = User::find($id);
        $request->validate([
            'password' => 'required'
        ]);
        if(!Hash::check($request->password, $user->password)){
            return redirect()->route('profileSetting');
        }else{
            if($request->hasFile('photo')){
                $image_path = public_path('/storage/') . $user->image;
                if(file_exists($image_path)){
                    @unlink($image_path);
                }
    
                $path = $request->photo->store('user_img', 'public');
                $user->image = $path;
                $user->save();
                return redirect()->route('profileSetting')->with('success', 'You have successfully updated your profile image');
            }
        }
    }


    // account method
    public function accountSetting()
    {
        $user = User::where('id', Auth::id())->first();
        return view('user.user_account_setting', compact('user'));
    }


    // password change method
    public function passwordSetting()
    {
        return view('user.user_change_password');
    }


    public function passwordSettingProcess(Request $request, $id)
    {
        $user = User::find($id);
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed',
            'new_password_confirmation' => 'required',
        ]);
        

        if(!Hash::check($request->current_password, $user->password)){
            return redirect()->route('passwordSetting')->with('error', 'Invalid Current Password');
        }else{
            $user->update([
                'password' => Hash::make($request->new_password),
            ]);
            return redirect()->route('passwordSetting')->with('success', 'You have successfully changed your password');
        }
    }   

    // overview section method
    public function overView()
    {
        $user = User::whereHas('posts', function($query){
            $query->where('state', 'publish');
        })->with(['posts' => function($sql){
            $sql->withCount('likes', 'views', 'comments');
        }])->whereId(Auth::id())->get();
        
        if(Auth::check()){
            return view('user.overview', compact('user'));
        }else{
            return redirect()->route('loginPage');
        }
    }

    // computer categories
    public function computerCate()
    {
        $user = User::withWhereHas('posts', function($query){
            $query->select('posts.*', 'post_categories.category')
            ->join('post_categories', 'posts.category', '=', 'post_categories.id')
            ->where('post_categories.category', "Computer")
            ->where('state', 'publish')
            ->withCount(['comments', 'likes', 'shares', 'views']);
        })->get();
        return view('user.computerCategory', compact('user'));   
    }

    // mobileCate categories
    public function mobileCate()
    {
        $user = User::withWhereHas('posts', function($query){
            $query->select('posts.*', 'post_categories.category')
            ->join('post_categories', 'posts.category', '=', 'post_categories.id')
            ->where('post_categories.category', "Mobile")
            ->where('state', 'publish')
            ->withCount(['comments', 'likes', 'shares', 'views']);
        })->get();
        return view('user.mobileCategory', compact('user'));   
    }

    // sportCate categories
    public function sportCate()
    {
        $user = User::withWhereHas('posts', function($query){
            $query->select('posts.*', 'post_categories.category')
            ->join('post_categories', 'posts.category', '=', 'post_categories.id')
            ->where('post_categories.category', "Sport")
            ->where('state', 'publish')
            ->withCount(['comments', 'likes', 'shares', 'views']);
        })->get();
        return view('user.sportCategory', compact('user'));   
    }


    // all categories for Auth::id()
    public function allCateAuth()
    {
        $user = User::whereHas('posts', function($query){
            $query->where('state', 'publish');
        })->with(['posts' => function($query){
            $query->withCount(['likes', 'views', 'comments', 'shares']);
        }])->where('id', Auth::id())->get();
    }

    // computer categories for Auth::id()
    public function computerCateSingle()
    {
        $user = User::withWhereHas('posts', function($query){
            $query->select('posts.*', 'post_categories.category')
            ->join('post_categories', 'posts.category', '=', 'post_categories.id')
            ->where('post_categories.category', "Computer")
            ->where('state', 'publish')
            ->withCount(['comments', 'likes', 'shares', 'views']);
        })->where('id', Auth::id())->get();
        return view('user.computerCategorySingle', compact('user'));   
    }

    // mobileCate categories for Auth::id()
    public function mobileCateSingle()
    {
        $user = User::withWhereHas('posts', function($query){
            $query->select('posts.*', 'post_categories.category')
            ->join('post_categories', 'posts.category', '=', 'post_categories.id')
            ->where('post_categories.category', "Mobile")
            ->where('state', 'publish')
            ->withCount(['comments', 'likes', 'shares', 'views']);
        })->where('id', Auth::id())->get();
        return view('user.mobileCategorySingle', compact('user'));   
    }

    // sportCate categories for Auth::id()
    public function sportCateSingle()
    {

        $user = User::withwhereHas('posts', function($query){
            $query->select('posts.*', 'post_categories.category')
            ->join('post_categories', 'posts.category', '=', 'post_categories.id')
            ->where('post_categories.category', "Sport")
            ->where('state', 'publish')
            ->withCount(['views', 'likes', 'comments', 'shares']);
        })->where('id', Auth::id())->get();
        
        return view('user.sportCategorySingle', compact('user'));   
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::whereHas('posts', function($query){
            $query->where('state', 'publish');
        })->with(['posts' => function($query){
            $query->withCount(['likes', 'views', 'comments', 'shares']);
        }])->get();

        
        if(Auth::check()){
            return view('welcome', compact('user'));
        }else{
            return redirect()->route('loginPage');
        }
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
         $request->validate([
            'name' => 'required',
            'image' => 'required|mimes:png,jpg,webp,jpeg,gif|max:3000',
            'email' => 'required',
            'password' => 'required|confirmed',
            'db' => 'required',
            'check' => 'required',
        ]);
        $image_path = $request->image->store('user_img', 'public');

        $user = User::create([
            'name' => $request->name,
            'image' => $image_path,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'db' => $request->db,
            'gender' => $request->check,
        ]);
        if($user){
            return redirect()->route('loginPage');
            // return 'success';
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);

        $request->validate([
            'password' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'db' => 'required'
        ]);
        if(!Hash::check($request->password, $user->password)){
            return redirect()->route('accountSetting')->with('error', "Invalid Password");
        }else{
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'db' => $request->db,
            ]);
                return redirect()->route('accountSetting')->with('success', 'You have successfully updated your account');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }

     // search method
    // public function search(Request $request)
    // {
    //     $search = $request->search;

    //     $user = User::where('name', 'like', "%{$search}%")->get();

    //     $post = Post::where('title', 'like', "%{$search}%")->get();

    //     return view('user.searchResult', compact('user', 'post'));

        
    // }
 
}
