<?php

namespace App\Http\Controllers;

use App\Models\PlanTransport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PlanTransportController extends Controller
{
    public function action(Request $request)
    {  
        
        $compt=0;

        if( $request->input('action')=='supp')
        { 
            $planTransports= planTransport::all();
            foreach ($planTransports as $planTransport) {

                if($request->input($planTransport->id)){

                        $planTransport->delete();
                        $compt++;
               }
              }
        
        }
        $request->session()->flash('msg', "Vous avez  supprimer $compt plans de transport ");
        return back()->withInput();   
        
        
    }
  
  
    public function index()
    {
        return view('planTransport.index', ['planTransports' => planTransport::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('planTransport.create', [
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
        $planTransport = planTransport::create($request->all());


        $request->session()->flash('msg', "Vous avez  ajouter le plan de transport du code: $planTransport->code ");
        return back()->withInput();   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\planTransport  $planTransport
     * @return \Illuminate\Http\Response
     */
    public function show(planTransport $planTransport)
    {
        return view('planTransport.show', ['planTransport' => $planTransport]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\planTransport  $planTransport
     * @return \Illuminate\Http\Response
     */
    public function edit(planTransport $planTransport)
    {
        
        return view('planTransport.edit',['planTransport'=>$planTransport,
        'transporteurs' => DB::table('transporteurs')->select('id', 'code')->get(),
        ]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\planTransport  $planTransport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, planTransport $planTransport)
    {
        
        
        $planTransport->code=$request->input('code');
        $planTransport->idTransporteur=$request->input('idTransporteur');
        $planTransport->type=$request->input('type');
        $planTransport->Libelle=$request->input('Libelle');
        $planTransport->pays=$request->input('pays');
        $planTransport->etat=$request->input('etat');
        $planTransport->modeRecherche=$request->input('modeRecherche');
        $planTransport->modeCalcul=$request->input('modeCalcul');
        $planTransport->taxeGazole=$request->input('taxeGazole');
        $planTransport->taxeSurete=$request->input('taxeSurete');
        $planTransport->ecotaxe=$request->input('ecotaxe');
        $planTransport->dateDebutValidite=$request->input('dateDebutValidite');
        $planTransport->dateFinValidite=$request->input('dateFinValidite');
        
        $planTransport->save();
        $request->session()->flash('msg',"vous avez modifier les donnees du plan de transport du code : $planTransport->code");
        return redirect()->route('planTransport.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\planTransport  $planTransport
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,planTransport $planTransport)
    {
        $planTransport->delete();
        $request->session()->flash('msg', "vous avez supprimer le plan de transport du code:  $planTransport->code");
        return redirect()->route('planTransport.index');
    }
}