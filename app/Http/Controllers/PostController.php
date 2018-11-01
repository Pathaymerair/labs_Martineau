<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Post;
use App\User;
use App\Title;
use App\Comment;
use App\ImageUser;
use App\Categorie;
use Auth;
use ImageIntervention;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('user')->get();
        
        // dd($posts);
        // $posts = User::find('user_id')->posts;
        // $posts = $user->posts;
        // $posts = User::find($id)->users()->get();
        // $posts = User::find(1);
        // $user = User::all();
        $posts = Post::all();
        // $post = Post::find(1);
        // $users = Post::find(1)->users;
        // $users = User::find(1)->get();
        // $user = User::find($id);
        return view('pages.posts', compact('posts', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $user = Auth::User();

        $post = new Post;
        
        if ($request->file('image')){

            $images= $request->file('image');
           
            $filename = time().$images->hashName();
    
            $resize = ImageIntervention::make($images);
            $resize->save('img/blog/'.$filename);

            $post->image = $filename;


        }
        $post->user_id = Auth::User()->id;
     
        $post->date = $request->date;
        $post->month = $request->month;
        $post->titre = $request->titre;
        $post->body = $request->body;
     
        $post->save();
        return redirect()->back()->with('success', 'Post created !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $categories = Categorie::all();
        $titles = Title::all();
        $imageUsers = ImageUser::all();
        $comments = Comment::with('post')->get();
        return view('blogPost', compact('post', 'titles', 'comments', 'imagesUsers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('pages.postEdit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $post = Post::find($id);
        if ($request->file('image')){

            $images= $request->file('image');
           
            $filename = time().$images->hashName();
    
            $resize = ImageIntervention::make($images);
            $resize->save('img/blog/'.$filename);

            $post->image = $filename;


        }
        
        $post->date = $request->date;
        $post->month = $request->month;
        $post->titre = $request->titre;
        $post->body = $request->body;
        $post->save();
        return redirect('/posts')->with('success', 'Post updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->state_id = 3;
        $post->save();
        return redirect()->back()->with('success', 'Post deleted !');
    }
}
