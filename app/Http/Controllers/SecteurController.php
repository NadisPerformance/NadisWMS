<?php

namespace App\Http\Controllers;

use App\Models\Secteur;
use App\Models\Emplacement;
use Illuminate\Http\Request;

class SecteurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function action(Request $request)
    {  
        
        $compt=0;
        $msge="";
        if( $request->input('action')=='supp')
        { 
            $secteurs= secteur::all();
            $emplacements= Emplacement::all();
            foreach ($secteurs as $secteur) {
                $v=0;
                if($request->input($secteur->id)){
                    foreach ($emplacements as $emplacement) {
                        if($emplacement->idSecteur==$secteur->id){
                          $v++;
                        }
                    }
                    if($v==0){
                        $secteur->delete();
                        $compt++;
                    }else{
                        $msge=$msge. $secteur->code.", ";
                    }  
                }
              }
        if($msge!="")
        $request->session()->flash('msge', "Vous pouvez pas supprimer les secteurs ont les code : [ $msge], elles ont des emplacements qui leur sont associés! ");
        $request->session()->flash('msg', "Vous avez  supprimer $compt secteurs ");
        
              return back()->withInput();   
        }
        
    }
  
  
    public function index()
    {
        return view('secteur.index', ['secteurs' => secteur::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('secteur.create');  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $secteur = secteur::create($request->all());


        $request->session()->flash('msg', "Vous avez  ajouter le secteur du code: $secteur->code ");
        return redirect()->route("secteur.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\secteur  $secteur
     * @return \Illuminate\Http\Response
     */
    public function show(secteur $secteur)
    {
        return view('secteur.show', ['secteur' => $secteur]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\secteur  $secteur
     * @return \Illuminate\Http\Response
     */
    public function edit(secteur $secteur)
    {
        
        return view('secteur.edit',['secteur'=>$secteur]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\secteur  $secteur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, secteur $secteur)
    {
        
        
        $secteur->code=$request->input('code');
        $secteur->etat=$request->input('etat');
        $secteur->Libelle=$request->input('Libelle');
        $secteur->type=$request->input('type');
        $secteur->save();
        $request->session()->flash('msg',"vous avez modifier les donnees du secteur du code : $secteur->code");
        return redirect()->route('secteur.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\secteur  $secteur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,secteur $secteur)
    {
        $emplacements= emplacement::all();
        $v=0;
        foreach ($emplacements as $emplacement) {
            if($emplacement->idSecteur==$secteur->id){
              $v++;
            }
        }
        if($v==0){
            $secteur->delete();
            $msge="vous avez supprimer le famille de support du code:  $secteur->code";
        }else{
            $msge="Vous pouvez pas supprimer cette famille de support car elle a des emplacements qui lui associés! ";
        } 
        $request->session()->flash('msg',$msge );
        return redirect()->route('secteur.index');
    }
}