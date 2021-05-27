<?php

namespace App\Http\Controllers;

use App\Models\Transporteur;
use Illuminate\Http\Request;

class TransporteurController extends Controller
{
    public function action(Request $request)
    {  
        
        $compt=0;

        if( $request->input('action')=='supp')
        { 
            $transporteurs= transporteur::all();
            foreach ($transporteurs as $transporteur) {

                if($request->input($transporteur->id)){

                        $transporteur->delete();
                        $compt++;
               }
              }
        
        }
        $request->session()->flash('msg', "Vous avez  supprimer $compt transporteurs ");
        return back()->withInput();   
        
        
    }
  
  
    public function index()
    {
        return view('transporteur.index', ['transporteurs' => transporteur::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('transporteur.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $transporteur = transporteur::create($request->all());


        $request->session()->flash('msg', "Vous avez  ajouter le transporteur du code: $transporteur->code ");
        return back()->withInput();   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\transporteur  $transporteur
     * @return \Illuminate\Http\Response
     */
    public function show(transporteur $transporteur)
    {
        return view('transporteur.show', ['transporteur' => $transporteur]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\transporteur  $transporteur
     * @return \Illuminate\Http\Response
     */
    public function edit(transporteur $transporteur)
    {
        
        return view('transporteur.edit',['transporteur'=>$transporteur]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\transporteur  $transporteur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, transporteur $transporteur)
    {
        
        
        $transporteur->code=$request->input('code');
        $transporteur->Libelle=$request->input('Libelle');
        $transporteur->etat=$request->input('etat');
        $transporteur->codeLangueDoc=$request->input('codeLangueDoc');
        $transporteur->codeLangueData=$request->input('codeLangueData');
        $transporteur->numSiret=$request->input('numSiret');
        if($request->input('mouvementReception')==null){
            $transporteur->mouvementReception=0;
        }else{
            $transporteur->mouvementReception=$request->input('mouvementReception');
        }
        if($request->input('mouvementExpedition')==null){
            $transporteur->mouvementExpedition=0;
        }else{
            $transporteur->mouvementExpedition=$request->input('mouvementExpedition');
        }
        if($request->input('mouvementInterne')==null){
            $transporteur->mouvementInterne=0;
        }else{
            $transporteur->mouvementInterne=$request->input('mouvementInterne');
        }
        
        $transporteur->save();
        $request->session()->flash('msg',"vous avez modifier les donnees du transporteur du code : $transporteur->code");
        return redirect()->route('transporteur.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\transporteur  $transporteur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,transporteur $transporteur)
    {
        $transporteur->delete();
        $request->session()->flash('msg', "vous avez supprimer le transporteur du code:  $transporteur->code");
        return redirect()->route('transporteur.index');
    }
}