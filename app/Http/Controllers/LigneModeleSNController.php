<?php

namespace App\Http\Controllers;

use App\Models\LigneModeleSN;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LigneModeleSNController extends Controller
{
    public function action(Request $request)
    {  
        $ligneModeleSNs= ligneModeleSN::all();
        $compt=0;

        if( $request->input('action')=='supp')
        { 
            foreach ($ligneModeleSNs as $ligneModeleSN) {
    
                if($request->input($ligneModeleSN->id)){
                    
                        $ligneModeleSN->delete();
                        $compt++;
                      
                }
              }
      $request->session()->flash('msg', "Vous avez  supprimer $compt lignes modélesation de S\N ");
        }
        return back()->withInput();
    }
  
    public function index()
    {
        return view('ligneModeleSN.index', ['ligneModeleSNs' => ligneModeleSN::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('ligneModeleSN.create', [
        'familleSNs' => DB::table('famille_s_n_s')->select('id', 'code')->get(),
        'modeleSNs' => DB::table('modele_s_n_s')->select('id')->get(),
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
        $ligneModeleSN = ligneModeleSN::create($request->all());


        $request->session()->flash('msg', "Vous avez  ajouter la ligne modélesation de S\N  n° : $ligneModeleSN->nombre ");
        return redirect()->route("ligneModeleSN.create");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ligneModeleSN  $ligneModeleSN
     * @return \Illuminate\Http\Response
     */
    public function show(ligneModeleSN $ligneModeleSN)
    {
        return view('ligneModeleSN.show', ['ligneModeleSN' => $ligneModeleSN]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ligneModeleSN  $ligneModeleSN
     * @return \Illuminate\Http\Response
     */
    public function edit(ligneModeleSN $ligneModeleSN)
    {
        
        return view('ligneModeleSN.edit',['ligneModeleSN'=>$ligneModeleSN,
        'familleSNs' => DB::table('famille_s_n_s')->select('id', 'code')->get(),
        'ModeleSNs' => DB::table('modele_s_n_s')->select('id')->get(),
        ]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ligneModeleSN  $ligneModeleSN
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ligneModeleSN $ligneModeleSN)
    {
        
        $ligneModeleSN->idFamilleSN=$request->input('idFamilleSN');
        $ligneModeleSN->idModeleSN=$request->input('idModeleSN');
        $ligneModeleSN->nombre=$request->input('nombre');
   
        $ligneModeleSN->save();
        $request->session()->flash('msg',"vous avez modifier les donnees de la ligne modélesation de S\N n° : $ligneModeleSN->nombre ");
        return redirect()->route('ligneModeleSN.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ligneModeleSN  $ligneModeleSN
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,ligneModeleSN $ligneModeleSN)
    {
        $ligneModeleSN->delete();
        $request->session()->flash('msg', "vous avez supprimer la ligne modélesation S\N  n° :  $ligneModeleSN->nombre ");
        return redirect()->route('ligneModeleSN.index');
    }

}
