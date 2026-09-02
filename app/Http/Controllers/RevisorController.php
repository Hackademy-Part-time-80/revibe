<?php

namespace App\Http\Controllers;

use App\Mail\BecomeRevisor;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

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

    public function applicationRevisor()
    {
        return view('mail.application-revisor');
    }


    public function becomeRevisor()
    {
        
        try {
            Mail::to('admin@revibe.it')->send(new BecomeRevisor(Auth::user()));
            
        return redirect()->route('homepage')->with('message', 'La tua richiesta è stata inviata');
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
        
    }

    public function makeRevisor(User $user)
    {
        Artisan::call('app:make-user-revisor', ['email' => $user->email]);
        return redirect()->back();    
    }
}
