<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $q = request()->query('q');
        if($q) {
            $posts = Post::where('title', 'LIKE', "%{$q}%")->simplePaginate(2);
        } else {
            $posts = Post::simplePaginate(2);
        }

        return view('welcome')
            ->with('categories', Category::all())
            ->with('tags', Tag::all())
            ->with('posts', $posts);
    }
}
