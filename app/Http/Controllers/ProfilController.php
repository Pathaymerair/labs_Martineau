<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfilRequest;
use App\Profil;
use App\User;
use App\ImageUser;
use App\Comment;
use App\Post;
use ImageIntervention;

class ProfilController extends Controller
{
    public function index($id)
    {
        $user = User::find($id);
        $profils = Profil::all();
        $imageUsers = ImageUser::all();
        $comments = Comment::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
        $posts = Post::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
        return view('pages.profil', compact('user', 'profil', 'imageUsers', 'comments', 'posts'));
    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('pages.profilEdit', compact('user', 'profil'));
    }
    public function update(ProfilRequest $request, $id)
    {
        $user = user::find($id);

        if ($request->file('image_id')){

            $images= $request->file('image_id');
              
            $filenamethumb = time().'thumb'.$images->hashName();
            $filename = time().$images->hashName();
            
            $resized = ImageIntervention::make($images)->resize(60, 60);
            $resized->save('img/team/thumb/'.$filenamethumb);
    
            $resize = ImageIntervention::make($images)->resize(360,448);
            $resize->save('img/team/imgnm/'.$filename);
            
            $image = new ImageUser;
            $image->imageUser = $filename;
            $image->imageUserThumbnail = $filenamethumb;
            $image->save();
            $user->image_id = $image->id;
        }         
        $user->profil->profilLastName = $request->profilLastName;
        $user->profil->profilFirstname = $request->profilFirstname;
        $user->profil->profilJob = $request->profilJob;
        $user->profil->profilDesc = $request->profilDesc;
        $user->profil->save();
        $user->save();
        return redirect('/users')->with('success', 'User Profil updated!');
    }


    
}
