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

    public function acceptPost(Post $post)
    {
        $post->setAccepted(true);
        return redirect()->back()->with('message', 'Hai accettato l\'annuncio');
    }

    public function rejectPost(Post $post)
    {
        $post->setAccepted(false);
        return redirect()->back()->with('message', 'Hai rifiutato l\'annuncio');
    }
}
