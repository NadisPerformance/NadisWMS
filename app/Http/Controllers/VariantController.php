<?php

namespace App\Http\Controllers;

use App\Models\Variant;
use Illuminate\Http\Request;

class VariantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('variant.index', ['variants' => variant::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('variant.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $variant = variant::create($request->all());


        $request->session()->flash('msg', "Vous avez  ajouter un variant d'id : $variant->id ");
        return redirect()->route("variant.create");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\variant  $variant
     * @return \Illuminate\Http\Response
     */
    public function show(variant $variant)
    {
        return view('variant.show', ['variant' => $variant]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\variant  $variant
     * @return \Illuminate\Http\Response
     */
    public function edit(variant $variant)
    {
        
        return view('variant.edit',['variant'=>$variant]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\variant  $variant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, variant $variant)
    {
        
       
        
        $variant->save();
        $request->session()->flash('msg',"vous avez modifier les donnees du variant d'id: $variant->id");
        return redirect()->route('variant.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\variant  $variant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,variant $variant)
    {
        $variant->delete();
        $request->session()->flash('msg', "vous avez supprimer le variant d'id:  $variant->id");
        return redirect()->route('variant.index');
    }
}
