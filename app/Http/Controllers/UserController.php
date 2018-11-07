<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserEditRequest;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;
use App\Profil;
use App\ImageUser;
use App\Post;
use App\Comment;
use ImageIntervention;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $roles = Role::all();
        $profils = Profil::all();
        $imageUsers = ImageUser::all();
        return view('pages.users', compact('users', 'roles', 'profils', 'imageUsers'));
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
    public function store(UserRequest $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role_id;
        // $user->password = $request->bcrypt('password');
        $user->password = Hash::make($request->password);
        $user->save();
        $profil = new Profil;
        $profil->user_id = $user->id;
        $profil->save();
        return redirect('/users')->with('success', 'User created successfully !');

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
        $user = User::find($id);
        $roles = Role::all();
        return view('pages.userEdit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {
        
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role_id;
        $user->save();
        return redirect('/users')->with('success', 'User updated successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $imageUser = ImageUser::all();
        $user = User::find($id);
        if($user->profil){
            $user->profil->delete();
            if ($user->imageUser){
                Storage::delete(['img/team/thumb/'.$user->imageUser->imageUserThumbnail, 'img/team/imgnm/'.$user->imageUser->imageUser]);
            }
        }
        $post = Post::where('user_id', $user->id)->get();
     
        if ($user->post){
            $user->post->state_id = 3;
        }

        if ($user->comment){
            $user->comment->state_id = 3;
        }
        
        
        $user->delete();
        return redirect()->back()->with('ded', 'User removed successfully !');
    }
    public function random(){
        $users = User::all();
        
        if ($user->imageUser){
            $user = $user->random()->get();
        } else {
            $user = $user->random();
        }
        
    
       
        return redirect('/');
    }
}
