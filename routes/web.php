<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use App\Livewire\PostCreate;
use Illuminate\Support\Facades\Route;

// Route Home
Route::get('/', [PublicController::class, 'welcome'])->name('welcome');
Route::get('/home', [PublicController::class, 'home'])->name('homepage');

// Autenticazione
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);

// Navigazione Post
Route::get('/posts', [PublicController::class, 'postsView'])->name('index');
Route::get('/posts/{category:name}', [PostController::class, 'categoryView'])->name('categoryView');
Route::get('/annuncio/{post}', [PublicController::class, 'postView'])->name('posts.show');
Route::get('/ricerca', [PostController::class, 'search'])->name('posts.search');

// Crud post
Route::get('/add-post', PostCreate::class)->name('post.create')->middleware('auth');

// Navigazione e logica revisore
Route::get('/revisor/index', [RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');
Route::patch('/revisor/accept/{post}', [RevisorController::class, 'acceptPost'])->middleware('isRevisor')->name('revisor.accept');
Route::patch('/revisor/reject/{post}', [RevisorController::class, 'rejectPost'])->middleware('isRevisor')->name('revisor.reject');
Route::get('/revisor/application', [RevisorController::class, 'applicationRevisor'])->middleware('auth')->name('application.revisor');
Route::post('/revisor/request', [RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('become.revisor');
Route::get('/make/revisor/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');
// undo revisione extra
Route::patch('/revisor/undo', [RevisorController::class, 'undo'])->middleware('isRevisor')->name('revisor.undo');
