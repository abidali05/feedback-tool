<?php

use App\Livewire\Auth\Register;
use App\Livewire\Comment\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Livewire\Feedback\FeedbackList;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/',FeedbackList::class)->name('posts.create');
Route::get('comments/{feedback_id}',Comment::class)->name('comments.index');
Route::get('/post/update',FeedbackList::class)->name('posts.edit');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
