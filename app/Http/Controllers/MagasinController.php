<?php

namespace App\Http\Controllers;

use App\Models\Magasin;
use App\Models\Site;
use App\Models\Emplacement;
use Illuminate\Http\Request;

class MagasinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function action(Request $request)
    {  
        
        $compt=0;
        $msge="";
        if( $request->input('action')=='supp')
        { 
            $magasins= magasin::all();
            $emplacements= Emplacement::all();
            foreach ($magasins as $magasin) {
                $v=0;
                if($request->input($magasin->id)){
                    foreach ($emplacements as $emplacement) {
                        if($emplacement->idMagasin==$magasin->id){
                          $v++;
                        }
                    }
                    if($v==0){
                        $magasin->delete();
                        $compt++;
                    }else{
                        $msge=$msge. $magasin->code.", ";
                    }  
                }
              }
        if($msge!="")
        $request->session()->flash('msge', "Vous pouvez pas supprimer les magasins ont les code : [ $msge], elles ont des emplacements qui leur sont associés! ");
        $request->session()->flash('msg', "Vous avez  supprimer $compt magasins ");
        }
        else
        {
            $emplacements= Emplacement::all();
            foreach ($emplacements as $emplacement) {
                if($request->input('id')== $emplacement->idMagasin){
                    $emplacement->delete();
                    $compt++;
                  }
              }
              
              if($compt==0)
              $request->session()->flash('msg', "aucun emplacement est associé à ce magasin ");
              else
              $request->session()->flash('msg', "Vous avez  supprimer $compt emplacements ");
              return back()->withInput();   
        }
        
    }
  
  
    public function index()
    {
        return view('magasin.index', ['magasins' => magasin::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('magasin.create');  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $magasin = magasin::create($request->all());


        $request->session()->flash('msg', "Vous avez  ajouter le magasin du code: $magasin->code ");
        return redirect()->route("magasin.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\magasin  $magasin
     * @return \Illuminate\Http\Response
     */
    public function show(magasin $magasin)
    {
        return view('magasin.show', ['magasin' => $magasin]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\magasin  $magasin
     * @return \Illuminate\Http\Response
     */
    public function edit(magasin $magasin)
    {
        
        return view('magasin.edit',['magasin'=>$magasin]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\magasin  $magasin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, magasin $magasin)
    {
        
        
        $magasin->code=$request->input('code');
        $magasin->etat=$request->input('etat');
        $magasin->Libelle=$request->input('Libelle');
        $magasin->type=$request->input('type');
        $magasin->nombreMeubles=$request->input('nombreMeubles');
        $magasin->nombreColonnes=$request->input('nombreColonnes');
        $magasin->nombreNiveaux=$request->input('nombreNiveaux');
        $magasin->nombreIndices=$request->input('nombreIndices');
        $magasin->idSite=$request->input('idSite');
        $magasin->separateur=$request->input('separateur');
        $magasin->save();
        $request->session()->flash('msg',"vous avez modifier les donnees de le magasin du code : $magasin->code");
        return redirect()->route('magasin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\magasin  $magasin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,magasin $magasin)
    {
        $emplacements= emplacement::all();
        $v=0;
        foreach ($emplacements as $emplacement) {
            if($emplacement->idMagasin==$magasin->id){
              $v++;
            }
        }
        if($v==0){
            $magasin->delete();
            $msge="vous avez supprimer le famille de support du code:  $magasin->code";
        }else{
            $msge="Vous pouvez pas supprimer cette famille de support car elle a des emplacements qui lui associés! ";
        } 
        $request->session()->flash('msg',$msge );
        return redirect()->route('magasin.index');
    }
}