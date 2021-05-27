<?php

namespace App\Http\Controllers;

use App\Models\Fournisseur;
use Illuminate\Http\Request;

class FournisseurController extends Controller 
{
    public function action(Request $request)
    {  
        
        $compt=0;

        if( $request->input('action')=='supp')
        { 
            $fournisseurs= fournisseur::all();
            foreach ($fournisseurs as $fournisseur) {

                if($request->input($fournisseur->id)){

                        $fournisseur->delete();
                        $compt++;
               }
              }
        
        }
        $request->session()->flash('msg', "Vous avez  supprimer $compt fournisseurs ");
        return back()->withInput();   
        
        
    }
  
  
    public function index()
    {
        return view('fournisseur.index', ['fournisseurs' => fournisseur::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('fournisseur.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fournisseur = fournisseur::create($request->all());


        $request->session()->flash('msg', "Vous avez  ajouter le fournisseur du code: $fournisseur->code ");
        return back()->withInput();   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function show(fournisseur $fournisseur)
    {
        return view('fournisseur.show', ['fournisseur' => $fournisseur]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function edit(fournisseur $fournisseur)
    {
        
        return view('fournisseur.edit',['fournisseur'=>$fournisseur]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, fournisseur $fournisseur)
    {
        
        
        $fournisseur->code=$request->input('code');
        $fournisseur->Libelle=$request->input('Libelle');
        $fournisseur->etat=$request->input('etat');
        $fournisseur->codeLangueDoc=$request->input('codeLangueDoc');
        $fournisseur->codeLangueData=$request->input('codeLangueData');
        $fournisseur->numSiret=$request->input('numSiret');
        $fournisseur->contraDate=$request->input('contraDate');
        
        $fournisseur->save();
        $request->session()->flash('msg',"vous avez modifier les donnees du fournisseur du code : $fournisseur->code");
        return redirect()->route('fournisseur.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,fournisseur $fournisseur)
    {
        $fournisseur->delete();
        $request->session()->flash('msg', "vous avez supprimer le fournisseur du code:  $fournisseur->code");
        return redirect()->route('fournisseur.index');
    }
}