<?php

namespace App\Http\Controllers;

use App\Models\Marque;
use Illuminate\Http\Request;

class MarqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('marque.index', ['marques' => Marque::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {return view('marque.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $marque = Marque::create($request->all());


        $request->session()->flash('msg', "Vous avez  ajouter l'marque $marque->name ");
        return redirect()->route("marque.create");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\marque  $marque
     * @return \Illuminate\Http\Response
     */
    public function show(Marque $marque)
    {
        return view('marque.show', ['marque' => $marque]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\marque  $marque
     * @return \Illuminate\Http\Response
     */
    public function edit(Marque $marque)
    {
        
        return view('marque.edit',['marque'=>$marque]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\marque  $marque
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Marque $marque)
    {
        
        $marque->name=$request->input('name');
        $marque->discription=$request->input('discription');
        $marque->save();
        $request->session()->flash('msg',"vous avez modifier les donnees de la marque : $marque->name");
        return redirect()->route('marque.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\marque  $marque
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Marque $marque)
    {
        $marque->delete();
        $request->session()->flash('msg', "vous avez supprimer la marque :  $marque->name");
        return redirect()->route('marque.index');
    }
}
