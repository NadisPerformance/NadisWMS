<?php

namespace App\Http\Controllers;

use App\Models\LignePlanTransport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class LignePlanTransportController extends Controller
{
    public function action(Request $request)
    {  
        
        $compt=0;

        if( $request->input('action')=='supp')
        { 
            $lignePlanTransports= lignePlanTransport::all();
            foreach ($lignePlanTransports as $lignePlanTransport) {

                if($request->input($lignePlanTransport->id)){

                        $lignePlanTransport->delete();
                        $compt++;
               }
              }
        
        }
        $request->session()->flash('msg', "Vous avez  supprimer $compt lignes");
        return back()->withInput();   
        
        
    }
  
  
    public function index()
    {
        return view('lignePlanTransport.index', ['lignePlanTransports' => lignePlanTransport::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('lignePlanTransport.create', [
            'planTransports' => DB::table('plan_transports')->select('id', 'code')->get(),
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
        $lignePlanTransport = lignePlanTransport::create($request->all());


        $request->session()->flash('msg', "Vous avez  ajouter la ligne du zone: $lignePlanTransport->zone ");
        return back()->withInput();   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\lignePlanTransport  $lignePlanTransport
     * @return \Illuminate\Http\Response
     */
    public function show(lignePlanTransport $lignePlanTransport)
    {
        return view('lignePlanTransport.show', ['lignePlanTransport' => $lignePlanTransport]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\lignePlanTransport  $lignePlanTransport
     * @return \Illuminate\Http\Response
     */
    public function edit(lignePlanTransport $lignePlanTransport)
    {
        
        return view('lignePlanTransport.edit',['lignePlanTransport'=>$lignePlanTransport,
        'planTransports' => DB::table('plan_transports')->select('id', 'code')->get(),
        ]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\lignePlanTransport  $lignePlanTransport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, lignePlanTransport $lignePlanTransport)
    {
        
        
        $lignePlanTransport->idPlanTransporteur=$request->input('idPlanTransporteur');
        $lignePlanTransport->codePaye=$request->input('codePaye');
        $lignePlanTransport->codeDepartement=$request->input('codeDepartement');
        $lignePlanTransport->zone=$request->input('zone');
        $lignePlanTransport->codePostal=$request->input('codePostal');
        $lignePlanTransport->poidsMin=$request->input('poidsMin');
        $lignePlanTransport->poidsMax=$request->input('poidsMax');
        $lignePlanTransport->modeCalcul=$request->input('modeCalcul');
        $lignePlanTransport->nbColisMin=$request->input('nbColisMin');
        $lignePlanTransport->nbColisMax=$request->input('nbColisMax');
        $lignePlanTransport->tarif=$request->input('tarif');
        $lignePlanTransport->uniteCalcul=$request->input('uniteCalcul');
        $lignePlanTransport->arrondi=$request->input('arrondi');
        
        $lignePlanTransport->save();
        $request->session()->flash('msg',"vous avez modifier les donnees de la ligne de zone $lignePlanTransport->zone");
        return redirect()->route('lignePlanTransport.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\lignePlanTransport  $lignePlanTransport
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,lignePlanTransport $lignePlanTransport)
    {
        $lignePlanTransport->delete();
        $request->session()->flash('msg', "vous avez supprimer la ligne de zone  $lignePlanTransport->zone");
        return redirect()->route('lignePlanTransport.index');
    }
}