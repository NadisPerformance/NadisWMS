<?php

namespace App\Http\Controllers;

use App\Models\Adresse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdresseController extends Controller
{
    public function action(Request $request)
    {  
        
        $compt=0;

        if( $request->input('action')=='supp')
        { 
            $adresses= adresse::all();
            foreach ($adresses as $adresse) {

                if($request->input($adresse->id)){

                        $adresse->delete();
                        $compt++;
               }
              }
        
        }
        $request->session()->flash('msg', "Vous avez  supprimer $compt adresses ");
        return back()->withInput();   
        
        
    }
  
  
    public function index()
    {
        return view('adresse.index', ['adresses' => adresse::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('adresse.create', [
        'users' => DB::table('users')->select('id', 'name')->get(),
        'sites' => DB::table('sites')->select('id', 'code')->get(),
        'fournisseurs' => DB::table('fournisseurs')->select('id', 'code')->get(),
        'clients' => DB::table('clients')->select('id', 'code')->get(),

        ]); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $adresse = adresse::create($request->all());


        $request->session()->flash('msg', "Vous avez  ajouter l'adresse du livraison: $adresse->livraison ");
        return back()->withInput();   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\adresse  $adresse
     * @return \Illuminate\Http\Response
     */
    public function show(adresse $adresse)
    {
        return view('adresse.show', ['adresse' => $adresse]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\adresse  $adresse
     * @return \Illuminate\Http\Response
     */
    public function edit(adresse $adresse)
    {
        
        return view('adresse.edit',['adresse'=>$adresse,
        'users' => DB::table('users')->select('id', 'name')->get(),
        'sites' => DB::table('sites')->select('id', 'code')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\adresse  $adresse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, adresse $adresse)
    {
        
        
        $adresse->livraison=$request->input('livraison');
        $adresse->siege=$request->input('siege');
        $adresse->facturation=$request->input('facturation');
        $adresse->CP=$request->input('CP');
        $adresse->Ville=$request->input('Ville');
        $adresse->pays=$request->input('pays');
        $adresse->raisonSociale=$request->input('raisonSociale');
        $adresse->siteInternet=$request->input('siteInternet');
        $adresse->idUser=$request->input('idUser');
        $adresse->idSite=$request->input('idSite');
        
        $adresse->save();
        $request->session()->flash('msg',"vous avez modifier les donnees de l'adresse du livraison : $adresse->livraison");
        return redirect()->route('adresse.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\adresse  $adresse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,adresse $adresse)
    {
        $adresse->delete();
        $request->session()->flash('msg', "vous avez supprimer l'adresse du livraison:  $adresse->livraison");
        return redirect()->route('adresse.index');
    }
}