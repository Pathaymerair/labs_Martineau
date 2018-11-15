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
            if (Auth::user()->role_id == 1){
                $comment->user_id = Auth::User()->id;
                $comment->state_id = 2;
            }
        }
        $comment->random_id = Random::inRandomOrder()->first()->id;
        $comment->post_id = $post->id;
        
        $comment->save();
        return redirect()->back()->with('success', 'Comment Uploaded ! Now waiting for approval !');


    }

    public function destroy($id){
        $comment = Comment::find($id);
        $comment->state_id = 3;
        $comment->save();
        return redirect()->back();
    }

    public function index(){
        $comments = Comment::orderBy('id', 'desc')->paginate(10);
        
       
    
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

    public function answer($id){
    $comment = Comment::find($id);
    return view('pages.commentAnswer', compact('comment'));
    // $com = new Comment;
    // $com->post_id = $comment->post_id;
    }

    public function comAnswer(Request $request, $id){
        $comment = Comment::find($id);
        $com = new Comment;
        $com->post_id = $comment->post_id;
        $com->name = $request->name;
        $com->email = $request->email;
        $com->subject = $request->subject;
        $com->msg = $request->msg;
        if (Auth::User()){
            $com->user_id = Auth::User()->id;
        }
        $com->random_id = Random::inRandomOrder()->first()->id;

        
        $com->save();
        return redirect('/comments')->with('success', 'Answer created! Waiting for approval !');
    }
}
