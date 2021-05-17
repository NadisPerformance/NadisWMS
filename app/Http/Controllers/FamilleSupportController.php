<?php

namespace App\Http\Controllers;

use App\Models\FamilleSupport;
use App\Models\Emplacement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FamilleSupportController extends Controller
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
            $familleSupports= familleSupport::all();
            $emplacements= Emplacement::all();
            foreach ($familleSupports as $familleSupport) {
                $v=0;
                if($request->input($familleSupport->id)){
                    foreach ($emplacements as $emplacement) {
                        if($emplacement->idFamilleSupport==$familleSupport->id){
                          $v++;
                        }
                    }
                    if($v==0){
                        $familleSupport->delete();
                        $compt++;
                    }else{
                        $msge=$msge. $familleSupport->code.", ";
                    }  
                }
              }
        if($msge!="")
        $request->session()->flash('msge', "Vous pouvez pas supprimer les familles de support ont les code : [ $msge], elles ont des emplacements qui leur sont associés! ");
        $request->session()->flash('msg', "Vous avez  supprimer $compt familles de support ");
        
              return back()->withInput();   
        }
        
    }
  
  
    public function index()
    {
        return view('familleSupport.index', ['familleSupports' => familleSupport::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('familleSupport.create');  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $familleSupport = familleSupport::create($request->all());


        $request->session()->flash('msg', "Vous avez  ajouter le famille de support du code: $familleSupport->code ");
        return redirect()->route("familleSupport.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\familleSupport  $familleSupport
     * @return \Illuminate\Http\Response
     */
    public function show(familleSupport $familleSupport)
    {
        return view('familleSupport.show', ['familleSupport' => $familleSupport]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\familleSupport  $familleSupport
     * @return \Illuminate\Http\Response
     */
    public function edit(familleSupport $familleSupport)
    {
        
        return view('familleSupport.edit',['familleSupport'=>$familleSupport]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\familleSupport  $familleSupport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, familleSupport $familleSupport)
    {
        
        
        $familleSupport->code=$request->input('code');
        $familleSupport->etat=$request->input('etat');
        $familleSupport->Libelle=$request->input('Libelle');
        $familleSupport->type=$request->input('type');
        $familleSupport->uniteReception=$request->input('uniteReception');
        $familleSupport->uniteStockage=$request->input('uniteStockage');
        $familleSupport->unitePreparation=$request->input('unitePreparation');
        $familleSupport->uniteExpedition=$request->input('uniteExpedition');
        $familleSupport->uniteReapprovisionnement=$request->input('uniteReapprovisionnement');
        $familleSupport->profondeur=$request->input('profondeur');
        $familleSupport->hauteur=$request->input('hauteur');
        $familleSupport->largeur=$request->input('largeur');
        $familleSupport->poids=$request->input('poids');
        $familleSupport->chargeMax=$request->input('chargeMax');
        $familleSupport->hauteurMax=$request->input('hauteurMax');
        $familleSupport->save();
        $request->session()->flash('msg',"vous avez modifier les donnees du famille de support du code : $familleSupport->code");
        return redirect()->route('familleSupport.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\familleSupport  $familleSupport
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,familleSupport $familleSupport)
    {
        $emplacements= emplacement::all();
        $v=0;
        foreach ($emplacements as $emplacement) {
            if($emplacement->idFamilleSupport==$familleSupport->id){
              $v++;
            }
        }
        if($v==0){
            $familleSupport->delete();
            $msge="vous avez supprimer le famille de support du code:  $familleSupport->code";
        }else{
            $msge="Vous pouvez pas supprimer cette famille de support car elle a des emplacements qui lui associés! ";
        } 
        $request->session()->flash('msg',$msge );
        return redirect()->route('familleSupport.index');
    }
}