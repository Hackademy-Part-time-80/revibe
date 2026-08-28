<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home()
    {
        $posts = Post::orderBy('created_at', 'desc')->take(6)->get();
        return view('homepage', compact('posts'));
    }

    public function postsView()
    {
        // riga20
        $posts = Post::orderBy('created_at', 'desc')->paginate(12);
        return view('posts.index', compact('posts'));
    }

    public function categoryView(Category $category)
    {
        // riga27 modificata
        $postsByCategory = $category->posts()->orderBy('created_at', 'desc')->paginate(12);
        return view('posts.category', compact('postsByCategory', 'category'));
    }

    public function postView(Post $post)
    {
        return view('posts.show', compact('post'));
    }
}