<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\IconRequest;
use App\Icon;

class IconController extends Controller
{
    public function index(){
        $icons = Icon::all();
        return view('pages.icon', compact('icons'));
    }

    public function create(IconRequest $request){
        $icon = new Icon;
        $icon->svg = $request->svg;
        $icon->svgSlug = $request->svgSlug;
        $icon->save();
        return redirect()->back()->with('success', 'Icon created !');
    }

    public function edit($id){
        $icon = Icon::find($id);
        return view('pages.iconedit', compact('icon'));
    }
    public function update(IconRequest $request, $id){
        $icon = Icon::find($id);
        $icon->svg = $request->svg;
        $icon->svgSlug = $request->svgSlug;
        $icon->save();
        return redirect()->back()->with('success', 'Icon updated !');
    }

    public function destroy($id){
        $icon = Icon::find($id);
        $icon->delete();
        return redirect()->back()->with('ded', 'Icon deleted !');

    }
}
