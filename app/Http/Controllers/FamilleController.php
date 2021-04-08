<?php

namespace App\Http\Controllers;

use App\Models\Famille;
use App\Models\Article;
use Illuminate\Http\Request;

class FamilleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function action(Request $request)
    {  
        $familles= famille::all();
        $articles= Article::all();
        $compt=0;
        $msge="";
        if( $request->input('action')=='supp')
        { 
            foreach ($familles as $famille) {
                $v=0;
                if($request->input($famille->id)){
                    foreach ($articles as $article) {
                        if($article->idFamille==$famille->id){
                          $v++;
                        }
                    }
                    if($v==0){
                        $famille->delete();
                        $compt++;
                    }else{
                        $msge=$msge. $famille->name.", ";
                    }  
                }
              }
        if($msge!="")
        $request->session()->flash('msge', "Vous pouvez pas supprimer les familles [ $msge], elles ont des acticles qui leur sont associés! ");
        $request->session()->flash('msg', "Vous avez  supprimer $compt familles ");
        }
        return view('famille.index', ['familles' => famille::all()]);
    }
  
    public function index()
    {
        return view('famille.index', ['familles' => Famille::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {return view('famille.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $famille = Famille::create($request->all());


        $request->session()->flash('msg', "Vous avez  ajouter l'famille $famille->name ");
        return redirect()->route("famille.create");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Famille  $famille
     * @return \Illuminate\Http\Response
     */
    public function show(Famille $famille)
    {
        return view('famille.show', ['famille' => $famille]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Famille  $famille
     * @return \Illuminate\Http\Response
     */
    public function edit(Famille $famille)
    {
        
        return view('famille.edit',['famille'=>$famille]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Famille  $famille
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Famille $famille)
    {
        
        $famille->name=$request->input('name');
        $famille->code=$request->input('code');
        $famille->etat=$request->input('etat');
        $famille->type=$request->input('type');
        $famille->Libelle=$request->input('Libelle');
        $famille->save();
        $request->session()->flash('msg',"vous avez modifier les donnees de la famille : $famille->name");
        return redirect()->route('famille.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Famille  $famille
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Famille $famille)
    {
        $famille->delete();
        $request->session()->flash('msg', "vous avez supprimer la famille :  $famille->name");
        return redirect()->route('famille.index');
    }
}