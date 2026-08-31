<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class RevisorController extends Controller
{
    public function index()
    {
        $postToCheck = Post::where('isAccepted', null)->first();
        return view('revisor.index', compact('postToCheck'));
    }
}
