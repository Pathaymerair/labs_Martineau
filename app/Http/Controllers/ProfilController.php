<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfilRequest;
use App\Profil;
use App\User;
use App\ImageUser;
use ImageIntervention;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index($id)
    {
        $user = User::find($id);
        return view('pages.profil', compact('user', 'profil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ProfilRequest $request, $id)
    {
        // $user = user::find($id);
        // $profil = new Profil();
        // $profil->profilLastName = $request->profilLastName;
        // $profil->profilFirstname = $request->profilFirstname;
        // $profil->profilJob = $request->profilJob;
        // $profil->profilDesc = $request->profilDesc;
        // $profil->save();
        // $user->profil_id = $profil->id;
        // $user->save();
        
        // return redirect('/users')->with('success', 'User Profil updated!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfilRequest $request, $id)
    {

        $user = user::find($id);

        if ($request->file('image_id')){

            $images= $request->file('image_id');
              
            $filenamethumb = time().'thumb'.$images->hashName();
            $filename = time().$images->hashName();
            
            $resized = ImageIntervention::make($images)->resize(60, 60);
            $resized->save('img/team/thumb/'.$filenamethumb);
    
            $resize = ImageIntervention::make($images);
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    
}
