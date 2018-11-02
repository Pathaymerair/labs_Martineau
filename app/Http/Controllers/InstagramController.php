<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Instagram;
use App\Http\Requests\InstaRequest;
use ImageIntervention;
use App\State;

class InstagramController extends Controller
{
    public function index(){
        $instas = Instagram::all();
        return view('pages.instas', compact('instas'));
    }
    public function create(InstaRequest $request){
        $insta = new Instagram;
        if ($request->file('instaImg')){

            $images= $request->file('instaImg');
              
            $filenamethumb = time().'thumb'.$images->hashName();
            $filename = time().$images->hashName();
            
            $resized = ImageIntervention::make($images)->resize(113, 111);
            $resized->save('img/instagram/thumb/'.$filenamethumb);
    
            $resize = ImageIntervention::make($images);
            $resize->save('img/instagram/nm/'.$filename);
            
            $insta->instaImg = $filename;
            $insta->instaThumb = $filenamethumb;
        }  
        $insta->save();
        return redirect()->back()->with('success', 'image added !');
    }
    public function edit($id){
        $insta = Instagram::find($id);
        return view('pages.instaEdit', compact('insta'));
    }
    public function update(InstaRequest $request, $id){
        $insta = Instagram::find($id);
        if ($request->file('instaImg')){

            $images= $request->file('instaImg');
              
            $filenamethumb = time().'thumb'.$images->hashName();
            $filename = time().$images->hashName();
            
            $resized = ImageIntervention::make($images)->resize(113, 111);
            $resized->save('img/instagram/thumb/'.$filenamethumb);
    
            $resize = ImageIntervention::make($images);
            $resize->save('img/instagram/nm/'.$filename);
            
            $insta->instaImg = $filename;
            $insta->instaThumb = $filenamethumb;
        } 
        $insta->save();
        return redirect('/insta')->with('up', 'image updated !');
    }
    public function destroy($id){
        $insta = Instagram::find($id);
        $insta->state_id = 3;
        $insta->save();
        return redirect()->back()->with('ded', 'Image deleted !');
    }
}
