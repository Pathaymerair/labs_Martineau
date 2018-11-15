<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Title;
use App\Icon;
use App\Service;
use App\Project;
use App\Testimonial;
use ImageIntervention;
use App\User;
use App\ImageUser;
use App\Role;
use App\Instagram;
use App\Tag;
use App\Categorie;
use App\Post;
use App\Comment;
use Storage;
use App\Carousel;

class EditSiteController extends Controller
{
    public function edit(){
        $titles = Title::all();
        $carousels = Carousel::all();
        $users = User::where('state_id', 2)->get();
        $userAdmin = User::where('role_id', 1)->get();
        $imageUsers = ImageUser::all();
        do {
            $user = $users->random();
            $userDeux = $users->random();
        } while (!$user->imageUser && !$userDeux->imageUser && $userDeux != $user);

        return view('pages.sitePartUn', compact('titles', 'users', 'user', 'userDeux', 'userAdmin', 'carousels'));
    }

    public function logo(Request $request, $id){
        $titles = Title::find($id);
        if ($request->file('logo')){

            $images= $request->file('logo');
              
            $filenamethumb = time().'thumb'.$images->hashName();
            $filename = time().$images->hashName();
            
            $resized = ImageIntervention::make($images)->resize(120, 40);
            $resized->save('img/logos/thumb/'.$filenamethumb);
    
            $resize = ImageIntervention::make($images)->resize(510,150);
            $resize->save('img/logos/nm/'.$filename);
            
          
            $title->bigLogo = $filename;
            $title->logo = $filenamethumb;
      
        }
        $title->save();
        return redirect('/editSiteUn')->with('success', 'Content updated !');
    }
}
