<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    
    public function categoryView(Category $category)
    {
        $postsByCategory = $category->posts()->orderBy('created_at', 'desc')->paginate(12);
        return view('posts.category', compact('postsByCategory', 'category'));
    }

        
      public function search(Request $request)
    {
        $searched = $request->input('query');

        
        $posts = Post::search($searched)->orderBy('created_at', 'desc')->paginate(12);

        return view('posts.index', compact('posts', 'searched'));
    }
}