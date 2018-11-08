<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie;
use App\User;
use App\State;
use Auth;
use App\Http\Requests\CategorieRequest;

class CategorieController extends Controller
{
    public function index(){
        $categories = Categorie::all();
        $categories = Categorie::with('user')->paginate(10);
        return view('pages.categories', compact('categories'));
    }
    public function create(CategorieRequest $request){
        $categorie = new Categorie;
        $categorie->nameCatego = $request->nameCatego;
        $categorie->user_id = Auth::User()->id;
        if (Auth::user()->role_id == 1){
            $categorie->state_id = 2;
        }
        $categorie->save();
        return redirect()->back()->with('success', 'Categorie successfully created !');
    }

    public function edit($id){
        $categorie = Categorie::find($id);
        $states = State::all();
        return view('pages.categoEdit', compact('categorie', 'states'));
    }
    public function update(CategorieRequest $request, $id) {
        $categorie = Categorie::find($id);
        $categorie->nameCatego = $request->nameCatego;
        $categorie->state_id = $request->state_id;
        $categorie->save();
        return redirect('/categories')->with('updated', 'Categorie updated successfully !');

    }

    public function destroy($id){
        $categorie = Categorie::find($id);
        $categorie->state_id = 3;
        $categorie->save();
        return redirect('/categories')->with('ded', 'Categorie deleted !');
    }
}
