<?php

namespace App\Http\Controllers;

use App\Models\FamilleQuarantaine;
use Illuminate\Http\Request;

class FamilleQuarantaineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('familleQuarantaine.index', ['familleQuarantaines' => familleQuarantaine::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {return view('familleQuarantaine.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $familleQuarantaine = familleQuarantaine::create($request->all());


        $request->session()->flash('msg', "Vous avez  ajouter l'familleQuarantaine $familleQuarantaine->name ");
        return redirect()->route("familleQuarantaine.create");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\familleQuarantaine  $familleQuarantaine
     * @return \Illuminate\Http\Response
     */
    public function show(familleQuarantaine $familleQuarantaine)
    {
        return view('familleQuarantaine.show', ['familleQuarantaine' => $familleQuarantaine]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\familleQuarantaine  $familleQuarantaine
     * @return \Illuminate\Http\Response
     */
    public function edit(familleQuarantaine $familleQuarantaine)
    {
        
        return view('familleQuarantaine.edit',['familleQuarantaine'=>$familleQuarantaine]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\familleQuarantaine  $familleQuarantaine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, familleQuarantaine $familleQuarantaine)
    {
        
       
        $familleQuarantaine->save();
        $request->session()->flash('msg',"vous avez modifier les donnees de la familleQuarantaine : $familleQuarantaine->id");
        return redirect()->route('familleQuarantaine.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\familleQuarantaine  $familleQuarantaine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,familleQuarantaine $familleQuarantaine)
    {
        $familleQuarantaine->delete();
        $request->session()->flash('msg', "vous avez supprimer la familleQuarantaine :  $familleQuarantaine->id");
        return redirect()->route('familleQuarantaine.index');
    }
}
