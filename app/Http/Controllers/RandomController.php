<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Random;
use ImageIntervention;
use App\Http\Requests\RandomRequest;
use softDeletes;
use Storage;
use App\Comment;
class RandomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $randoms = Random::all();
        return view('pages.imagesRandom', compact('randoms'));
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
    public function store(RandomRequest $request)
    {
        if ($request->file('image_id')){

            $images= $request->file('image_id');
              
            $filenamethumb = time().'thumb'.$images->hashName();
            $filename = time().$images->hashName();
            
            $resized = ImageIntervention::make($images)->resize(100, 100);
            $resized->save('img/randoms/thumb/'.$filenamethumb);
    
            $resize = ImageIntervention::make($images);
            $resize->save('img/randoms/nm/'.$filename);
            
            $random = new Random;
            $random->random = $filename;
            $random->randomThumb = $filenamethumb;
            $random->save();

            return redirect('/imagesRandom')->with('success', 'Image uploaded !');

        }  
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $comment = Comment::with('random')->get();
        $random = Random::find($id);
        // dd($random->comment->random);
    
        $random->delete();
        // Storage::delete(['img/randoms/thumb/'.$random->randomThumb, 'img/randoms/nm/'.$random->random]);
        return redirect()->back()->with('ded', 'image deleted !');
    }
}
