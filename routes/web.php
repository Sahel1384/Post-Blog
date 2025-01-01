<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\LayoutDesignController;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\PostCategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewController;
use App\Http\Middleware\UserLogin;
use Illuminate\Support\Facades\Route;

// Route::get('/welcome', function () {
//     return view('layout.index');
// })->name('welcome');

// Route::get('/home', function () {
//     return view('user.home');
// });


Route::view('/', 'user.sign_in');
Route::view('/sign_up', 'user.sign_up')->name('sign_up');
Route::view('/admin_sign_up', 'user.admin_sign_up')->name('admin_sign_up');
Route::view('/loginPage', 'user.sign_in')->name('loginPage');


Route::resource('/post_form', PostController::class)->middleware(UserLogin::class);
Route::resource('/post', PostCategoryController::class)->middleware(UserLogin::class);
Route::resource('/user_sign_up', UserController::class);

Route::post('/add_admin', [UserController::class, 'add_admin'])->name('add_admin');

Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/home_page', [UserController::class, 'home_page'])->name('home_page')->middleware(UserLogin::class);
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/myPost', [PostController::class, 'myPost'])->name('myPost');



// forget password process control

Route::get('/forgetPassword', [UserController::class, 'forgetPassword'])->name('forgetPassword');
Route::post('/forgetPasswordProcess', [UserController::class, 'forgetPasswordProcess'])->name('forgetPasswordProcess');

Route::get('/resetPassword/{token}', [UserController::class, 'resetPassword'])->name('resetPassword');
Route::post('/resetPasswordProcess', [UserController::class, 'resetPasswordProcess'])->name('resetPasswordProcess');

// profile setting
Route::get('/profileSetting', [UserController::class, 'profileSetting'])->name('profileSetting')->middleware(UserLogin::class);
Route::put('/profileSettingProcess/{id}', [UserController::class, 'profileSettingProcess'])->name('profileSettingProcess');


// account setting
Route::get('/accountSetting', [UserController::class, 'accountSetting'])->name('accountSetting')->middleware(UserLogin::class);



// password setting
Route::get('/passwordSetting', [UserController::class, 'passwordSetting'])->name('passwordSetting')->middleware(UserLogin::class);
Route::put('/passwordSettingProcess/{id}', [UserController::class, 'passwordSettingProcess'])->name('passwordSettingProcess');


// post update
Route::get('/post_update', [UserController::class, 'post_update'])->name('post_update');



// draft posts
Route::get('/draftPost', [PostController::class, 'draftPost'])->name('draftPost');
// publish posts
Route::get('/publishPost', [PostController::class, 'publishPost'])->name('publishPost');

// overview section route
Route::get('/overView', [UserController::class, 'overView'])->name('overView');

// computer categories
Route::get('/computerCate', [UserController::class, 'computerCate'])->name('computerCate');
// mobile categories
Route::get('/mobileCate', [UserController::class, 'mobileCate'])->name('mobileCate');
// sport categories
Route::get('/sportCate', [UserController::class, 'sportCate'])->name('sportCate');


// categories for Auth::id()
Route::get('/allCateAuth', [UserController::class, 'allCateAuth'])->name('allCateAuth');

// computerSingle categories
Route::get('/computerCateSingle', [UserController::class, 'computerCateSingle'])->name('computerCateSingle');
// mobileSingle categories
Route::get('/mobileCateSingle', [UserController::class, 'mobileCateSingle'])->name('mobileCateSingle');
// sportSingle categories
Route::get('/sportCateSingle', [UserController::class, 'sportCateSingle'])->name('sportCateSingle');


// increase views
// Route::get('/increaseViews/{id}', [PostController::class, 'increaseViews'])->name('increaseViews');

// // postLikes views
// Route::get('/postLikes/{id}', [PostController::class, 'postLikes'])->name('postLikes');


// like route 
Route::get('/likes/{id}', [LikesController::class, 'like'])->name('likes');

// view route 
Route::get('/views/{id}', [ViewController::class, 'view'])->name('views');

// comment route
Route::get('/comment/{id}', [CommentController::class, 'comment'])->name('comment');
Route::post('/commentProcess/{id}', [CommentController::class, 'commentProcess'])->name('commentProcess');
Route::get('/seeComment/{id}', [PostController::class, 'seeComment'])->name('seeComment');


// share route
Route::get('/share/{id}', [PostController::class, 'share'])->name('share');
Route::post('/shareProcess/{id}', [PostController::class, 'shareProcess'])->name('shareProcess');



// web.php
Route::post('/posts/{id}', [PostController::class, 'duplicatePost'])->name('posts.duplicate');


// settings login route
// Route::get('/settingLogin', [UserController::class, 'settingLogin'])->name('settingLogin');
Route::get('/settingSection/', [PostController::class, 'settingSection'])->name('settingSection')->middleware(UserLogin::class);


// search route
Route::get('searchData', [SearchController::class, 'searchData'])->name('searchData');


// admin route
Route::get('/adminDashboard', [UserController::class, 'adminDashboard'])->name('adminDashboard');

// layout desgin route
Route::get('/layoutSetting', [LayoutDesignController::class, 'layoutSetting'])->name('layoutSetting');
