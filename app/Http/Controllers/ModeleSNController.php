<?php

namespace App\Http\Controllers;

use App\Models\ModeleSN;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ModeleSNController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function action(Request $request)
    {  
        $modeleSNs= modeleSN::all();
        $compt=0;
        
        if( $request->input('action')=='supp')
        { 
            foreach ($modeleSNs as $modeleSN) {
               
                if($request->input($modeleSN->id)){
                    
                   
                        $modeleSN->delete();
                        $compt++;
                    
                }
              }
        $request->session()->flash('msg', "Vous avez  supprimer $compt modéles de S\N ");
        }
        return back()->withInput();
    }
  
    public function index()
    {
        return view('modeleSN.index', ['modeleSNs' => modeleSN::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('modeleSN.create', [
        'articles' => DB::table('articles')->select('id', 'codeArticle')->get(),
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
        $modeleSN = modeleSN::create($request->all());


        $request->session()->flash('msg', "Vous avez  ajouter le modéle S/N d'id : $modeleSN->id ");
        return redirect()->route("modeleSN.create");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\modeleSN  $modeleSN
     * @return \Illuminate\Http\Response
     */
    public function show(modeleSN $modeleSN)
    {
        return view('modeleSN.show', ['modeleSN' => $modeleSN]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\modeleSN  $modeleSN
     * @return \Illuminate\Http\Response
     */
    public function edit(modeleSN $modeleSN)
    {
        
        return view('modeleSN.edit',['modeleSN'=>$modeleSN,
        'articles' => DB::table('articles')->select('id', 'codeArticle')->get(),
        ]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\modeleSN  $modeleSN
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, modeleSN $modeleSN)
    {
        
        $modeleSN->Libelle=$request->input('idArticle');
        $modeleSN->etat=$request->input('etat');
        $modeleSN->Libelle=$request->input('Libelle');
        $modeleSN->Libelle=$request->input('nbAttendus');
        $modeleSN->Libelle=$request->input('sequenceReleve');
        $modeleSN->Libelle=$request->input('regleSouplesse');
        $modeleSN->save();
        $request->session()->flash('msg',"vous avez modifier les donnees de le modéle S/N d'id: $modeleSN->id");
        return redirect()->route('modeleSN.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\modeleSN  $modeleSN
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,modeleSN $modeleSN)
    {
        $modeleSN->delete();
        $request->session()->flash('msg', "vous avez supprimer le modéle S/N d'id: $modeleSN->id");
        return redirect()->route('modeleSN.index');
    }
}
