<?php

use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Livewire\PostCreate;
use Illuminate\Support\Facades\Auth;

Route::get('/', [PublicController::class, 'home'])->name('homepage');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);

Route::get('/add-post', PostCreate::class)->name('post.create');
