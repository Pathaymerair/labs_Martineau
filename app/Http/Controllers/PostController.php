<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Requests\PostUpRequest;
use App\Post;
use App\User;
use App\Title;
use App\Comment;
use App\ImageUser;
use App\Categorie;
use App\Tag;
use App\State;
use Auth;
use App\Instagram;
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

        $posts = Post::orderBy('id', 'desc')->paginate(10);
    
        $categories = Categorie::all();
        $tags = Tag::all();

        return view('pages.posts', compact('posts', 'users', 'categories', 'tags'));
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
        if (Auth::user()->role_id == 1){
            $post->state_id = 2;
        }    
        $post->titre = $request->titre;
        $post->body = $request->body;
     
        $post->save();

        $categories = $request->categorie_id;
        $post->categorie()->attach($categories);

        $tags = $request->tag_id;
        $post->tag()->attach($tags);

        return redirect()->back()->with('success', 'Post created !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
   
        $states = State::all();
        $categories = Categorie::all();
        $tags = Tag::all();
     
        return view('pages.postEdit', compact('post', 'states', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpRequest $request, $id)
    {
        $post = Post::find($id);
        
        if ($request->file('image')){

            $images= $request->file('image');
           
            $filename = time().$images->hashName();
    
            $resize = ImageIntervention::make($images);
            $resize->save('img/blog/'.$filename);

            $post->image = $filename;


        } else {
            $post->image = $post->image;
        }
        
       
       
        $post->titre = $request->titre;
        $post->body = $request->body;
        $post->state_id = $request->state_id;
        
        $post->save();

        $categories = $request->categorie_id;
        $post->categorie()->attach($categories);
        $post->categorie()->sync($categories);

        $tags = $request->tag_id;
        $post->tag()->attach($tags);
        $post->tag()->sync($tags);
    
    

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
