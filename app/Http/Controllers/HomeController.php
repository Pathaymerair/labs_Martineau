<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\State;
use App\Comment;
use App\Post;
use App\Categorie;
use App\Tag;
use App\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states = State::with('comment', 'post', 'tag', 'categorie')->get();
      
        $comments = Comment::where('state_id', 1)->orderBy('created_at')->get();
        $posts = Post::where('state_id', 1)->orderBy('created_at')->get();
        $tags = Tag::where('state_id', 1)->orderBy('created_at')->get();
        $categories = categorie::where('state_id', 1)->orderBy('created_at')->get();
        return view('home', compact('states', 'comments', 'posts', 'tags', 'categories'));
    }
}
