<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ClientRequest;
use App\Client;
use App\State;
use ImageIntervention;

class ClientController extends Controller
{
    public function index(){
        $clients = Client::all();
        return view('pages.clients', compact('clients'));
    }
    public function create(ClientRequest $request){
        $client = new Client;
        $client->clientName = $request->clientName;
        $client->clientCompany = $request->clientCompany;
        if ($request->file('clientImg')){

            $images= $request->file('clientImg');
           
            $filename = time().$images->hashName();
    
            $resize = ImageIntervention::make($images)->resize(70,70);
            $resize->save('img/avatar/'.$filename);

            $client->clientImg = $filename;
        } 
        $client->save();
        return redirect()->back()->with('success', 'Client registered !');
    }

    public function update(ClientRequest $request, $id){
        $client = Client::find($id);
        $client->clientName = $request->clientName;
        $client->clientCompany = $request->clientCompany;
        if ($request->file('clientImg')){

            $images= $request->file('clientImg');
           
            $filename = time().$images->hashName();
    
            $resize = ImageIntervention::make($images)->resize(70,70);
            $resize->save('img/avatar/'.$filename);

            $client->clientImg = $filename;
        } else {
            $client->clientImg = $request->clientImg;
        }
        $client->state_id = $request->state_id;
        $client->save();
        return redirect('/clients')->with('success', 'Client updated !');
    }
    public function edit($id){
        $client = Client::find($id);
        $states = State::all();
        return view('pages.clientEdit', compact('client', 'states'));
    }
    public function destroy($id){
        $client = Client::find($id);
        $client->state_id = 3;
        $client->save();
        return redirect()->back()->with('ded', 'client deleted');
    }
}
