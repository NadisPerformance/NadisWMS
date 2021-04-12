<?php

namespace App\Http\Controllers;

use App\Models\CodeBarre;
use Illuminate\Http\Request;

class CodeBarreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function action(Request $request)
    {  
        $codeBarres= codeBarre::all();
        $compt=0;
        
        if( $request->input('action')=='supp')
        { 
            foreach ($codeBarres as $codeBarre) {
               
                if($request->input($codeBarre->id)){
                    
                   
                        $codeBarre->delete();
                        $compt++;
                    
                }
              }
        $request->session()->flash('msg', "Vous avez  supprimer $compt codes à barres ");
        }
        return back()->withInput();
    }
  
    public function index()
    {
        return view('codeBarre.index', ['codeBarres' => codeBarre::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {return view('codeBarre.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $codeBarre = codeBarre::create($request->all());


        $request->session()->flash('msg', "Vous avez  ajouter le code à Barre de value : $codeBarre->value ");
        return redirect()->route("codeBarre.create");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\codeBarre  $codeBarre
     * @return \Illuminate\Http\Response
     */
    public function show(codeBarre $codeBarre)
    {
        return view('codeBarre.show', ['codeBarre' => $codeBarre]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\codeBarre  $codeBarre
     * @return \Illuminate\Http\Response
     */
    public function edit(codeBarre $codeBarre)
    {
        
        return view('codeBarre.edit',['codeBarre'=>$codeBarre]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\codeBarre  $codeBarre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, codeBarre $codeBarre)
    {
        
        $codeBarre->value=$request->input('value');
        $codeBarre->idConditionnementLogistique=$request->input('idConditionnementLogistique');
        $codeBarre->save();
        $request->session()->flash('msg',"vous avez modifier les donnees de la code à Barre de value : $codeBarre->value");
        return redirect()->route('codeBarre.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\codeBarre  $codeBarre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,codeBarre $codeBarre)
    {
        $codeBarre->delete();
        $request->session()->flash('msg', "vous avez supprimer la code à Barre de value:  $codeBarre->value");
        return redirect()->route('codeBarre.index');
    }
}
