<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carousel;
use App\Http\Requests\CarouselRequest;
use ImageIntervention;

class CarouselController extends Controller
{
    public function index(){
        $carousels = Carousel::all();
        return view('pages.carousel', compact('carousels'));
    }
    public function create(CarouselRequest $request){
        $carou = new Carousel;
        if ($request->file('carouImg')){

            $images= $request->file('carouImg');
              
            $filenamethumb = time().'thumb'.$images->hashName();
            $filename = time().$images->hashName();
            
            $resized = ImageIntervention::make($images)->resize(60, 60);
            $resized->save('img/carousel/thumb/'.$filenamethumb);
    
            $resize = ImageIntervention::make($images);
            $resize->save('img/carousel/nm/'.$filename);
            
            $carou->carouImg = $filename;
            $carou->carouThumb = $filenamethumb;
        }  
        $carou->save();
        return redirect()->back()->with('success', 'image added !');
    }
    public function edit($id){
        $carou = Carousel::find($id);
        return view('pages.carouEdit', compact('carou'));
    }
    public function update(CarouselRequest $request, $id){
        $carou = Carousel::find($id);
        if ($request->file('carouImg')){

            $images= $request->file('carouImg');
              
            $filenamethumb = time().'thumb'.$images->hashName();
            $filename = time().$images->hashName();
            
            $resized = ImageIntervention::make($images)->resize(60, 60);
            $resized->save('img/carousel/thumb/'.$filenamethumb);
    
            $resize = ImageIntervention::make($images);
            $resize->save('img/carousel/nm/'.$filename);
            
            $carou->carouImg = $filename;
            $carou->carouThumb = $filenamethumb;
        } 
        $carou->save();
        return redirect('/carousels')->with('up', 'image updated !');
    }
    public function destroy($id){
        $carou = Carousel::find($id);
        $carou->delete();
        return redirect()->back()->with('ded', 'Image deleted !');
    }

}
