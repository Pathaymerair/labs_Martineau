<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Icon;
use App\State;
use App\Http\Requests\ServiceRequest;

class ServiceController extends Controller
{
    public function index(){
        $services = Service::all();
        $icons = Icon::all();
        return view('pages.servicesCreate', compact('services', 'icons'));
    }
    public function create(ServiceRequest $request){
        $service = new Service;
        $service->serviceTitre = $request->serviceTitre;
        $service->serviceDesc = $request->serviceDesc;
        $service->icon_id = $request->icon_id;
        $service->save();
        return redirect()->back()->with('success', 'service created !');
        }
    
    public function indexDeux(){
        $services = Service::all();
        $services = Service::with('icon')->get();
        // $icon = $services->icon()->get();
        return view('pages.services', compact('services', 'icons'));
        }
    
    public function edit($id){
        $service = Service::find($id);
        $states = State::all();
        $icons = Icon::all();
        return view('pages.serviceEdit', compact('service', 'icons', 'states'));
    }

    public function update(ServiceRequest $request, $id){
        $service = Service::find($id);
        $service->serviceTitre = $request->serviceTitre;
        $service->serviceDesc = $request->serviceDesc;
        $service->icon_id = $request->icon_id;
        $service->state_id = $request->state_id;
        $service->save();
        return redirect('/services')->with('success', 'service updated!');
        }

        public function archive($id){
            $service = Service::find($id);
            $service->state_id = 3;
            $service->save();
            return redirect()->back()->with('ded', 'service deleted !');
        }
}
