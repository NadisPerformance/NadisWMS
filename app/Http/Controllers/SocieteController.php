<?php

namespace App\Http\Controllers;

use App\Models\Societe;
use Illuminate\Http\Request;

class SocieteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('societe.index', ['societes' => societe::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('societe.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $societe = societe::create($request->all());


        $request->session()->flash('msg', "Vous avez  ajouter un societe d'id : $societe->id ");
        return redirect()->route("societe.create");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\societe  $societe
     * @return \Illuminate\Http\Response
     */
    public function show(societe $societe)
    {
        return view('societe.show', ['societe' => $societe]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\societe  $societe
     * @return \Illuminate\Http\Response
     */
    public function edit(societe $societe)
    {
        
        return view('societe.edit',['societe'=>$societe]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\societe  $societe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, societe $societe)
    {
        
       
        
        $societe->save();
        $request->session()->flash('msg',"vous avez modifier les donnees du societe d'id: $societe->id");
        return redirect()->route('societe.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\societe  $societe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,societe $societe)
    {
        $societe->delete();
        $request->session()->flash('msg', "vous avez supprimer le societe d'id:  $societe->id");
        return redirect()->route('societe.index');
    }
}
