<?php

namespace App\Http\Controllers;

use App\Models\Prix;
use Illuminate\Http\Request;

class PrixController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('prix.index', ['prixs' => prix::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('prix.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prix = prix::create($request->all());


        $request->session()->flash('msg', "Vous avez  ajouter un prix d'id : $prix->id ");
        return redirect()->route("prix.create");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\prix  $prix
     * @return \Illuminate\Http\Response
     */
    public function show(prix $prix)
    {
        return view('prix.show', ['prix' => $prix]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\prix  $prix
     * @return \Illuminate\Http\Response
     */
    public function edit(prix $prix)
    {
        
        return view('prix.edit',['prix'=>$prix]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\prix  $prix
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, prix $prix)
    {
        
       
        
        $prix->save();
        $request->session()->flash('msg',"vous avez modifier les donnees du prix d'id: $prix->id");
        return redirect()->route('prix.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\prix  $prix
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,prix $prix)
    {
        $prix->delete();
        $request->session()->flash('msg', "vous avez supprimer le prix d'id:  $prix->id");
        return redirect()->route('prix.index');
    }
}
