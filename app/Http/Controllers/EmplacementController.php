<?php

namespace App\Http\Controllers;

use App\Models\Emplacement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class EmplacementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function action(Request $request)
    {  
        
        $compt=0;

        if( $request->input('action')=='supp')
        { 
            $emplacements= Emplacement::all();
            foreach ($emplacements as $emplacement) {

                if($request->input($emplacement->id)){

                        $emplacement->delete();
                        $compt++;
               }
              }
        
        }
        $request->session()->flash('msg', "Vous avez  supprimer $compt emplacements ");
        return back()->withInput();   
        
        
    }
  
  
    public function index()
    {
        return view('emplacement.index', ['emplacements' => emplacement::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('emplacement.create', [
        'magasins' => DB::table('magasins')->select('id', 'code')->get(),
        'secteurs' => DB::table('secteurs')->select('id', 'code')->get(),
        'familleSupports' => DB::table('famille_supports')->select('id', 'code')->get(),
        'id'=>$request->input('id')
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
        $emplacement = emplacement::create($request->all());


        $request->session()->flash('msg', "Vous avez  ajouter l'emplacement du code: $emplacement->code ");
        return back()->withInput();   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\emplacement  $emplacement
     * @return \Illuminate\Http\Response
     */
    public function show(emplacement $emplacement)
    {
        return view('emplacement.show', ['emplacement' => $emplacement]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\emplacement  $emplacement
     * @return \Illuminate\Http\Response
     */
    public function edit(emplacement $emplacement)
    {
        
        return view('emplacement.edit',['emplacement'=>$emplacement,
        'magasins' => DB::table('magasins')->select('id', 'code')->get(),
        'secteurs' => DB::table('secteurs')->select('id', 'code')->get(),
        'familleSupports' => DB::table('famille_supports')->select('id', 'code')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\emplacement  $emplacement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Emplacement $emplacement)
    {
        
        
        $emplacement->code=$request->input('code');
        $emplacement->etat=$request->input('etat');
        $emplacement->Libelle=$request->input('Libelle');
        $emplacement->type=$request->input('type');
        $emplacement->LibelleClient=$request->input('LibelleClient');
        $emplacement->idMagasin=$request->input('idMagasin');
        $emplacement->idSecteur=$request->input('idSecteur');
        $emplacement->idFamilleSupport=$request->input('idFamilleSupport');
        $emplacement->capacite=$request->input('capacite');
        if($request->input('estPicking')==NULL){
            $emplacement->estPicking=0;
           }else{
            $emplacement->estPicking=$request->input('estPicking');
           }
        $emplacement->usage=$request->input('usage');
        $emplacement->hauteur=$request->input('hauteur');
        $emplacement->largeur=$request->input('largeur');
        $emplacement->profondeur=$request->input('profondeur');
        $emplacement->poids=$request->input('poids');
        $emplacement->volume=$request->input('volume');
        $emplacement->save();
        $request->session()->flash('msg',"vous avez modifier les donnees de l'emplacement du code : $emplacement->code");
        return redirect()->route('emplacement.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\emplacement  $emplacement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,emplacement $emplacement)
    {
        $emplacement->delete();
        $request->session()->flash('msg', "vous avez supprimer l'emplacement du code:  $emplacement->code");
        return redirect()->route('emplacement.index');
    }
}