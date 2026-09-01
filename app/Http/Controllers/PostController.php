<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function categoryView(Category $category)
    {
        $postsByCategory = $category->posts()->where('isAccepted', true)->orderBy('created_at', 'desc')->paginate(12);
        return view('posts.category', compact('postsByCategory', 'category'));
    }


    public function search(Request $request)
    {
        $searched = $request->input('query');
        if (!$searched) {
            return redirect()->back();
        }

        // Inizializza la ricerca di base
        $query = Post::search($searched);

        // Paginazione e ordine decrescente (Scout ordina per rilevanza di default)
        $posts = $query->orderBy('created_at', 'desc')->paginate(12);
        $posts = Post::search($searched)->where('isAccepted', true)->orderBy('created_at', 'desc')->paginate(12);

        return view('posts.index', compact('posts', 'searched'));
    }
}
