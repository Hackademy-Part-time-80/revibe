<?php

namespace App\Http\Controllers;

use App\Mail\BecomeRevisor;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RevisorController extends Controller
{
    public function index()
    {
        $postToCheck = Post::whereNull('isAccepted')->where('user_id', '!=', Auth::id())->first();
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

    public function becomeRevisor()
    {
        Mail::to('admin@revibe.it')->send(new BecomeRevisor(Auth::user()));
        return redirect()->route('homepage')->with('message', 'La tua richiesta è stata inviata');
    }
}
