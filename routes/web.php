<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;

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

Route::get('/', [BaseController::class, 'index'])->name('home');
Route::get('/about-us', [BaseController::class, 'about'])->name('about-us');

Route::get('/contact-us', [ContactController::class, 'contact'])->name('contact-us');
Route::post('/contact-us/send', [ContactController::class, 'send'])->name('contact-us.send');

Route::get('/my-profile', [UserController::class, 'profile'])->name('my-profile');
Route::put('/my-profile', [UserController::class, 'update_profile'])->name('my-profile-update');

Route::post('/comment', [CommentController::class, 'store'])->name('comment.store');
Route::delete('/comment/{comment}', [CommentController::class, 'destroy'])->name('comment.destroy');

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/user/{id}/posts', [PostController::class, 'user_posts'])->name('user_posts');
Route::resource('/post', PostController::class);


Route::get('/admin/dashboard', [HomeController::class, 'dashboard'])->name('admin.dashboard');

Route::middleware(['loggedIn'])->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login.index');
    Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
});



