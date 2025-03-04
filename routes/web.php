<?php

use App\Models\Friends;
use Illuminate\Http\Request;
use Illuminate\Routing\RouteBinding;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FriendsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentsController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [PostController::class, 'getposts'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/Myposts', [PostController::class, 'show'])->name('posts.index');
Route::get('/posts/{post_id}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::patch('/posts/{post_id}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{post_id}', [PostController::class, 'destroy'])->name('posts.destroy');

Route::get('/users', [UserController::class, 'getAllUsers'])
->middleware(['auth', 'verified'])
->name('users');

Route::get('/users/{id}', [UserController::class, 'show']);

Route::get('/search', [UserController::class, 'search']);

require __DIR__.'/auth.php';

// email sender
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('status', 'verification-link-sent');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


// friends route:
Route::middleware(['auth', 'verified'])->group(function () {
    Route::post('/friends/send/{id}', [FriendsController::class, 'sendRequest']);
    Route::post('/friends/accept/{id}', [FriendsController::class, 'acceptRequest']);
    Route::post('/friends/refuse/{id}', [FriendsController::class, 'refuseRequest']);
});

Route::get('/requests', [FriendsController::class, 'showFriendRequests'])->name('Friends.requests')->middleware('auth');
Route::get('/Friends', [FriendsController::class, 'index'])->name('Friends.list')->middleware('auth');

// post route
Route::get('/Post/Create', [PostController::class, 'index'])->name('post.create');
Route::post('/post/store', [PostController::class, 'store'])->name('post.store');

// comments
Route::post('/posts/{post}/comments', [CommentsController::class, 'store'])->name('comments.store');

// likes
Route::post('/post/{id}/like', [LikeController::class, 'toggleLike'])->name('post.like');