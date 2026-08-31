<?php

use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\PostController;
use App\Livewire\PostCreate;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Auth;


Route::get('/', [PublicController::class, 'home'])->name('homepage');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);

Route::get('/add-post', PostCreate::class)->name('post.create')->middleware('auth');
Route::get('/posts', [PublicController::class, 'postsView'])->name('index');
Route::get('/posts/{category:name}', [PostController::class, 'categoryView'])->name('categoryView');
Route::get('/annuncio/{post}', [PublicController::class, 'postView'])->name('posts.show');


Route::get('/revisor/index', [RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');
Route::get('/ricerca', [PostController::class, 'search'])->name('posts.search');
Route::patch('/revisor/accept/{post}', [RevisorController::class, 'acceptPost'])->middleware('isRevisor')->name('revisor.accept');
Route::patch('/revisor/reject/{post}', [RevisorController::class, 'rejectPost'])->middleware('isRevisor')->name('revisor.reject');
Route::get('/revisor/request', [RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('become.revisor');
