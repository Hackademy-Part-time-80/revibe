<?php

use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RevisorController;
use App\Livewire\PostCreate;
use Illuminate\Support\Facades\Auth;


Route::get('/', [PublicController::class, 'home'])->name('homepage');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);

Route::get('/add-post', PostCreate::class)->name('post.create')->middleware('auth');
Route::get('/posts', [PublicController::class, 'postsView'])->name('index');
Route::get('/posts/{category:name}', [PublicController::class, 'categoryView'])->name('categoryView');
Route::get('/annuncio/{post}', [PublicController::class, 'postView'])->name('posts.show');


Route::get('/revisor/index', [RevisorController::class, 'index'])->name('revisor.index');
