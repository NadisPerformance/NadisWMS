<?php

namespace App\Http\Controllers;

use App\Models\ModelePreparation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ModelePreparationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modelePreparation.index', ['modelePreparations' => modelePreparation::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('modelePreparation.create', [
        'conditionnementLogistiques' => DB::table('conditionnement_logistiques')->select('id', 'code')->get(),
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
        $modelePreparation = modelePreparation::create($request->all());


        $request->session()->flash('msg', "Vous avez  ajouter le code à Barre de value : $modelePreparation->value ");
        return redirect()->route("modelePreparation.create");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\modelePreparation  $modelePreparation
     * @return \Illuminate\Http\Response
     */
    public function show(modelePreparation $modelePreparation)
    {
        return view('modelePreparation.show', ['modelePreparation' => $modelePreparation]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\modelePreparation  $modelePreparation
     * @return \Illuminate\Http\Response
     */
    public function edit(modelePreparation $modelePreparation)
    {
        
        return view('modelePreparation.edit',['modelePreparation'=>$modelePreparation,
        'conditionnementLogistiques' => DB::table('conditionnement_logistiques')->select('id', 'code')->get(),
        ]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\modelePreparation  $modelePreparation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, modelePreparation $modelePreparation)
    {
        
        
        $modelePreparation->idConditionnementLogistique=$request->input('idConditionnementLogistique');
        $modelePreparation->save();
        $request->session()->flash('msg',"vous avez modifier les donnees de le modele de preparation d'id : $modelePreparation->id");
        return redirect()->route('modelePreparation.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\modelePreparation  $modelePreparation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,modelePreparation $modelePreparation)
    {
        $modelePreparation->delete();
        $request->session()->flash('msg', "vous avez supprimer le modele de preparation d'id:  $modelePreparation->id");
        return redirect()->route('modelePreparation.index');
    }
}