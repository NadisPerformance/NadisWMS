<?php

namespace App\Http\Controllers;

use App\Models\Variant;
use App\Models\Article;
use Illuminate\Http\Request;

class VariantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function action(Request $request)
    {  
        $variants= variant::all();
        $articles= Article::all();
        $compt=0;
        $msge="";
        if( $request->input('action')=='supp')
        { 
            foreach ($variants as $variant) {
                $v=0;
                if($request->input($variant->id)){
                    foreach ($articles as $article) {
                        if($article->idVariant==$variant->id){
                          $v++;
                        }
                    }
                    if($v==0){
                        $variant->delete();
                        $compt++;
                    }else{
                        $msge=$msge. $variant->code.", ";
                    }  
                }
              }
        if($msge!="")
        $request->session()->flash('msge', "Vous pouvez pas supprimer les variants [ $msge], elles ont des acticles qui leur sont associés! ");
        $request->session()->flash('msg', "Vous avez  supprimer $compt variants ");
        }
        return back()->withInput();
    }

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


        $request->session()->flash('msg', "Vous avez  ajouter un variant du code : $variant->code ");
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
        
       
        $variant->code=$request->input('code');
        $variant->etat=$request->input('etat');
        $variant->type=$request->input('type');
        $variant->Libelle=$request->input('Libelle');
        $variant->save();
        $request->session()->flash('msg',"vous avez modifier les donnees du variant du code: $variant->code");
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
        $request->session()->flash('msg', "vous avez supprimer le variant du code :  $variant->code");
        return redirect()->route('variant.index');
    }
}
