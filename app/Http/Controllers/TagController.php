<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TagRequest;
use App\Tag;
use App\State;
use Auth;

class TagController extends Controller
{
    public function index(){
        $tags = Tag::all();
        $tags = Tag::with('user')->paginate(10);
        return view('pages.tags', compact('tags'));
    }
    public function create(TagRequest $request){
        $tag = new Tag;
        $tag->nameTag = $request->nameTag;
        $tag->user_id = Auth::User()->id;
        if (Auth::user()->role_id == 1){
            $tag->state_id = 2;
        } 
        $tag->save();
        return redirect()->back()->with('success', 'Tag successfully created !');
    }

    public function edit($id){
        $tag = Tag::find($id);
        $states = State::all();
        return view('pages.tagEdit', compact('tag', 'states'));
    }
    public function update(TagRequest $request, $id) {
        $tag = Tag::find($id);
        $tag->nameTag = $request->nameTag;
        $tag->state_id = $request->state_id;
        $tag->save();
        return redirect('/tags')->with('updated', 'Tag updated successfully !');

    }

    public function destroy($id){
        $tag = Tag::find($id);
        $tag->state_id = 3;
        $tag->save();
        return redirect('/tags')->with('ded', 'Tag deleted !');
    }
}
