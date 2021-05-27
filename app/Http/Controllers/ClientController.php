<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function action(Request $request)
    {  
        
        $compt=0;

        if( $request->input('action')=='supp')
        { 
            $clients= client::all();
            foreach ($clients as $client) {

                if($request->input($client->id)){

                        $client->delete();
                        $compt++;
               }
              }
        
        }
        $request->session()->flash('msg', "Vous avez  supprimer $compt clients ");
        return back()->withInput();   
        
        
    }
  
  
    public function index()
    {
        return view('client.index', ['clients' => client::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('client.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client = client::create($request->all());


        $request->session()->flash('msg', "Vous avez  ajouter le client du code: $client->code ");
        return back()->withInput();   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(client $client)
    {
        return view('client.show', ['client' => $client]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(client $client)
    {
        
        return view('client.edit',['client'=>$client]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, client $client)
    {
        
        
        $client->code=$request->input('code');
        $client->Libelle=$request->input('Libelle');
        $client->etat=$request->input('etat');
        $client->type=$request->input('type');
        $client->codeLangueDoc=$request->input('codeLangueDoc');
        $client->codeLangueData=$request->input('codeLangueData');
        $client->numSiret=$request->input('numSiret');
        $client->contraDate=$request->input('contraDate');
        $client->regroupementLogique=$request->input('regroupementLogique');
        $client->expeditionPartielle=$request->input('expeditionPartielle');
        
        $client->save();
        $request->session()->flash('msg',"vous avez modifier les donnees du client du code : $client->code");
        return redirect()->route('client.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,client $client)
    {
        $client->delete();
        $request->session()->flash('msg', "vous avez supprimer le client du code:  $client->code");
        return redirect()->route('client.index');
    }
}