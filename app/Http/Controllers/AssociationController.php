<?php

namespace App\Http\Controllers;

use App\Models\Association;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AssociationController extends Controller
{
    public function action(Request $request)
    {  
        
        $compt=0;

        if( $request->input('action')=='supp')
        { 
            $associations= association::all();
            foreach ($associations as $association) {

                if($request->input($association->id)){

                        $association->delete();
                        $compt++;
               }
              }
        
        }
        $request->session()->flash('msg', "Vous avez  supprimer $compt associations ");
        return back()->withInput();   
        
        
    }
  
  
    public function index()
    {
        return view('association.index', ['associations' => association::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('association.create', [
            'societes' => DB::table('societes')->select('id')->get(),
            'transporteurs' => DB::table('transporteurs')->select('id', 'code')->get(),
            ]); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $association = association::create($request->all());


        $request->session()->flash('msg', "Vous avez  ajouter la association du prestation: $association->prestation ");
        return back()->withInput();   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\association  $association
     * @return \Illuminate\Http\Response
     */
    public function show(association $association)
    {
        return view('association.show', ['association' => $association]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\association  $association
     * @return \Illuminate\Http\Response
     */
    public function edit(association $association)
    {
        
        return view('association.edit',['association'=>$association,
        'societes' => DB::table('societes')->select('id')->get(),
        'transporteurs' => DB::table('transporteurs')->select('id', 'code')->get(),
        ]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\association  $association
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, association $association)
    {
        
        
        $association->idSociete=$request->input('idSociete');
        $association->idTransporteur=$request->input('idTransporteur');
        $association->type=$request->input('type');
        $association->prestation=$request->input('prestation');
        $association->numCompte=$request->input('numCompte');
        $association->plageColis=$request->input('plageColis');
        $association->codeInterne=$request->input('codeInterne');

        if($request->input('palettisation')==null){
            $association->palettisation=0;
        }else{
            $association->palettisation=$request->input('palettisation');
        }
        if($request->input('echangeEDI')==null){
            $association->echangeEDI=0;
        }else{
            $association->echangeEDI=$request->input('echangeEDI');
        }
        if($request->input('impressionCN23')==null){
            $association->impressionCN23=0;
        }else{
            $association->impressionCN23=$request->input('impressionCN23');
        }
        if($request->input('transporteurParDefaut')==null){
            $association->transporteurParDefaut=0;
        }else{
            $association->transporteurParDefaut=$request->input('transporteurParDefaut');
        }
        if($request->input('transporteurOptimiser')==null){
            $association->transporteurOptimiser=0;
        }else{
            $association->transporteurOptimiser=$request->input('transporteurOptimiser');
        }
        
        $association->save();
        $request->session()->flash('msg',"vous avez modifier les donnees de la association du prestation : $association->prestation");
        return redirect()->route('association.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\association  $association
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,association $association)
    {
        $association->delete();
        $request->session()->flash('msg', "vous avez supprimer la association du prestation:  $association->prestation");
        return redirect()->route('association.index');
    }
}