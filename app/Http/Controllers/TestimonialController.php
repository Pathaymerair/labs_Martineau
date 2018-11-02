<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testimonial;
use App\State;
use App\Client;
use App\Http\Requests\TestimonialRequest;

class TestimonialController extends Controller
{
    public function index(){
        $testimonials = Testimonial::all();
        $clients = Client::all();
        return view('pages.testimonials', compact('testimonials', 'clients'));
    }
    public function create(TestimonialRequest $request){
        $testimonial = new Testimonial;
        $testimonial->testiDesc = $request->testiDesc;
        $testimonial->client_id = $request->client_id;
        $testimonial->save();
        return redirect()->back()->with('success', 'Testimonial created !');
    }
    public function edit($id){
        $testimonial = Testimonial::find($id);
        return view('pages.testimonialsEdit', compact('testimonial'));
    }
    public function update(TestimonialRequest $request, $id){
        $testimonial = Testimonial::find($id);
        $testimonial->testiDesc = $request->testiDesc;
        $testimonial->client_id = $request->client_id;
        $testimonial->save();
        return redirect('/testimonials')->with('success', 'Testimonial updated !');
    }
    public function destroy($id){
        $testimonial = Testimonial::find($id);
        $testimonial->state_id = 3;
        $testimonial->save();
        return redirect()->back()->with('ded', 'Testimonial deleted !');
    }
}
