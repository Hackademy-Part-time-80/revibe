<?php

namespace App\Http\Controllers;


use App\Models\Post;


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
// passa alla pagina dettaglio
    public function postView(Post $post)
    {
        return view('posts.show', compact('post'));
    }
}
