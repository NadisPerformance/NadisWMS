<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('categorie.index', ['categories' => Categorie::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {return view('categorie.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categorie = Categorie::create($request->all());


        $request->session()->flash('msg', "Vous avez  ajouter l'categorie $categorie->value ");
        return redirect()->route("categorie.create");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function show(Categorie $categorie)
    {
        return view('categorie.show', ['categorie' => $categorie]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function edit(Categorie $categorie)
    {
        
        return view('categorie.edit',['categorie'=>$categorie]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, categorie $categorie)
    {
        
        $categorie->value=$request->input('value');
        $categorie->discription=$request->input('discription');
        $categorie->save();
        $request->session()->flash('msg',"vous avez modifier les donnees de la categorie : $categorie->value");
        return redirect()->route('categorie.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,categorie $categorie)
    {
        $categorie->delete();
        $request->session()->flash('msg', "vous avez supprimer la categorie :  $categorie->value");
        return redirect()->route('categorie.index');
    }
}
