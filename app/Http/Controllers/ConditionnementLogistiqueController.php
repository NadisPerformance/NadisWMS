<?php

namespace App\Http\Controllers;

use App\Models\ConditionnementLogistique;
use Illuminate\Http\Request;

class ConditionnementLogistiqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('conditionnementLogistique.index', ['conditionnementLogistiques' => conditionnementLogistique::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('conditionnementLogistique.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $conditionnementLogistique = conditionnementLogistique::create($request->all());


        $request->session()->flash('msg', "Vous avez  ajouter le conditionnementLogistique de type : $conditionnementLogistique->type");
        return redirect()->route("conditionnementLogistique.create");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\conditionnementLogistique  $conditionnementLogistique
     * @return \Illuminate\Http\Response
     */
    public function show(conditionnementLogistique $conditionnementLogistique)
    {
        return view('conditionnementLogistique.show', ['conditionnementLogistique' => $conditionnementLogistique]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\conditionnementLogistique  $conditionnementLogistique
     * @return \Illuminate\Http\Response
     */
    public function edit(conditionnementLogistique $conditionnementLogistique)
    {

        return view('conditionnementLogistique.edit', ['conditionnementLogistique' => $conditionnementLogistique]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\conditionnementLogistique  $conditionnementLogistique
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, conditionnementLogistique $conditionnementLogistique)
    {

        $conditionnementLogistique->idArticle = $request->input('idArticle');
        $conditionnementLogistique->code = $request->input('code');
        $conditionnementLogistique->Libelle = $request->input('Libelle');
        $conditionnementLogistique->etat = $request->input('etat');
        if ($request->input('UniteStockage') == NULL) {
            $conditionnementLogistique->UniteStockage = 0;
        } else {
            $conditionnementLogistique->UniteStockage = $request->input('UniteStockage');
        }
        if ($request->input('enEtat') == NULL) {
            $conditionnementLogistique->enEtat = 0;
        } else {
            $conditionnementLogistique->enEtat = $request->input('enEtat');
        }
        if ($request->input('UnitePreparation') == NULL) {
            $conditionnementLogistique->UnitePreparation = 0;
        } else {
            $conditionnementLogistique->UnitePreparation = $request->input('UnitePreparation');
        }
        if ($request->input('UniteReception') == NULL) {
            $conditionnementLogistique->UniteReception = 0;
        } else {
            $conditionnementLogistique->UniteReception = $request->input('UniteReception');
        }
        if ($request->input('gerbage') == NULL) {
            $conditionnementLogistique->gerbage = 0;
        } else {
            $conditionnementLogistique->gerbage = $request->input('gerbage');
        }
        $conditionnementLogistique->borneMax = $request->input('borneMax');
        $conditionnementLogistique->borneMin = $request->input('borneMin');
        $conditionnementLogistique->poids = $request->input('poids');
        $conditionnementLogistique->longueur = $request->input('longueur');
        $conditionnementLogistique->largeur = $request->input('largeur');
        $conditionnementLogistique->profondeur = $request->input('profondeur');
        $conditionnementLogistique->qte = $request->input('qte');
        $conditionnementLogistique->type = $request->input('type');
        $conditionnementLogistique->coefficient = $request->input('coefficient');
        $conditionnementLogistique->filiation = $request->input('filiation');
        $conditionnementLogistique->typeFiliation = $request->input('typeFiliation');
        $conditionnementLogistique->planPalettisation = $request->input('planPalettisation');
        $conditionnementLogistique->save();
        $request->session()->flash('msg', "vous avez modifier les donnees de la conditionnementLogistique du code : $conditionnementLogistique->code");
        return redirect()->route('conditionnementLogistique.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\conditionnementLogistique  $conditionnementLogistique
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, conditionnementLogistique $conditionnementLogistique)
    {
        $conditionnementLogistique->delete();
        $request->session()->flash('msg', "vous avez supprimer la conditionnementLogistique :  $conditionnementLogistique->value");
        return redirect()->route('conditionnementLogistique.index');
    }
}
