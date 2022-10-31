<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
/*
    Important
*/
Route::resource('posts', PostController::class)->middleware('auth');

Route::post('comments/{postid}', [CommentController::class,'store'])->name('comments.store')->middleware('auth');
// Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
})->name('auth.github');


Route::get('/auth/callback', function () {
    $githubUser = Socialite::driver('github')->user();
    $user = User::with('post')->where('email', $githubUser->email)->first();
    if($user) {
        $user->update([
            'name' => $githubUser->name,
        ]);
    } else {
        $user = User::create([
            'email' => $githubUser->email,
            'name' => $githubUser->name,
        ]);

    }
 
    Auth::login($user);
 
    return redirect('/posts');
    // dd($user);
    // $user->token
});


Route::get('/auth/google/redirect', function () {
    return Socialite::driver('google')->redirect();
})->name('auth.google');

Route::get('/auth/google/callback', function () {
    $googleUser = Socialite::driver('google')->user();
    $user = User::with('post')->where('email', $googleUser->email)->first();
    if($user) {
        $user->update([
            'name' => $googleUser->name,
        ]);
    } else {
        $user = User::create([
            'email' => $googleUser->email,
            'name' => $googleUser->name,
        ]);

    }
 
    Auth::login($user);
 
    return redirect('/posts');
    // dd($user);
    // $user->token
});