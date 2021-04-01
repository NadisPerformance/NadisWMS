<?php

namespace App\Http\Controllers;

use App\Models\familleColisage;
use Illuminate\Http\Request;

class familleColisageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('familleColisage.index', ['familleColisages' => familleColisage::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {return view('familleColisage.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $familleColisage = familleColisage::create($request->all());


        $request->session()->flash('msg', "Vous avez  ajouter l'familleColisage $familleColisage->name ");
        return redirect()->route("familleColisage.create");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\familleColisage  $familleColisage
     * @return \Illuminate\Http\Response
     */
    public function show(familleColisage $familleColisage)
    {
        return view('familleColisage.show', ['familleColisage' => $familleColisage]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\familleColisage  $familleColisage
     * @return \Illuminate\Http\Response
     */
    public function edit(familleColisage $familleColisage)
    {
        
        return view('familleColisage.edit',['familleColisage'=>$familleColisage]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\familleColisage  $familleColisage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FamilleColisage $familleColisage)
    {
        
        $familleColisage->name=$request->input('name');
        $familleColisage->code=$request->input('code');
        $familleColisage->etat=$request->input('etat');
        $familleColisage->type=$request->input('type');
        $familleColisage->Libelle=$request->input('Libelle');
        $familleColisage->save();
        $request->session()->flash('msg',"vous avez modifier les donnees de la familleColisage : $familleColisage->name");
        return redirect()->route('familleColisage.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\familleColisage  $familleColisage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,familleColisage $familleColisage)
    {
        $familleColisage->delete();
        $request->session()->flash('msg', "vous avez supprimer la familleColisage :  $familleColisage->name");
        return redirect()->route('familleColisage.index');
    }
}
