<?php

namespace App\Http\Controllers;

use App\Models\ModeleStockage;
use Illuminate\Http\Request;

class ModeleStockageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modeleStockage.index', ['modeleStockages' => modeleStockage::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modeleStockage.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $modeleStockage = modeleStockage::create($request->all());


        $request->session()->flash('msg', "Vous avez  ajouter un modeleStockage d'id : $modeleStockage->id ");
        return redirect()->route("modeleStockage.create");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\modeleStockage  $modeleStockage
     * @return \Illuminate\Http\Response
     */
    public function show(modeleStockage $modeleStockage)
    {
        return view('modeleStockage.show', ['modeleStockage' => $modeleStockage]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\modeleStockage  $modeleStockage
     * @return \Illuminate\Http\Response
     */
    public function edit(modeleStockage $modeleStockage)
    {
        
        return view('modeleStockage.edit',['modeleStockage'=>$modeleStockage]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\modeleStockage  $modeleStockage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, modeleStockage $modeleStockage)
    {
        
       
        
        $modeleStockage->save();
        $request->session()->flash('msg',"vous avez modifier les donnees du modeleStockage d'id: $modeleStockage->id");
        return redirect()->route('modeleStockage.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\modeleStockage  $modeleStockage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,modeleStockage $modeleStockage)
    {
        $modeleStockage->delete();
        $request->session()->flash('msg', "vous avez supprimer le modeleStockage d'id:  $modeleStockage->id");
        return redirect()->route('modeleStockage.index');
    }
}
