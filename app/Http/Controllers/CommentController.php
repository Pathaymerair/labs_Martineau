<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Comment;
use App\User;
use App\Post;
use App\Random;
use App\State;
use Auth;

class CommentController extends Controller
{
    public function create(CommentRequest $request, $id){
        $post = Post::find($id);
        // $post = Post::with('comment')->get();
        // $post = Post::findOrFail($request->post_id);
        // dd($post);
        $comment = new Comment;
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->subject = $request->subject;
        $comment->msg = $request->msg;
        if (Auth::User()){
            $comment->user_id = Auth::User()->id;
        }
        $comment->random_id = Random::inRandomOrder()->first()->id;
        $comment->post_id = $post->id;
        
        $comment->save();
        return redirect()->back()->with('success', 'Comment Uploaded !');


    }

    public function destroy($id){
        $comment = Comment::find($id);
        $comment->state_id = 3;
        $comment->save();
        return redirect()->back();
    }

    public function index(){
        $comments = Comment::all();
        $comments = Comment::with('user')->orderBy('id', 'desc')->get();
        $comments = Comment::with('post')->orderBy('id', 'desc')->get();
    
        return view('pages.comment', compact('comments'));
    }

    public function edit($id){
        $comment = Comment::find($id);
        $states = State::all();
        return view('pages.commentEdit', compact('comment', 'states'));
    }

    public function update(CommentRequest $request, $id){
        $comment = Comment::find($id);
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->subject = $request->subject;
        $comment->msg = $request->msg;
        $comment->state_id = $request->state_id;
        $comment->save();
        return redirect('/comments')->with('success', 'Comment updated !');
    }
}
