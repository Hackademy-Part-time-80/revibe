<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home()
    {
        $posts = Post::where('isAccepted', true)->orderBy('created_at', 'desc')->take(6)->get();
        return view('homepage', compact('posts'));
    }

    public function postsView()
    {
        $posts = Post::where('isAccepted', true)->orderBy('created_at', 'desc')->paginate(12);
        return view('posts.index', compact('posts'));
    }


    public function postView()
    {
        $posts = Post::all();
        return view('posts.show', compact('posts'));
    }
}
