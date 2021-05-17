<?php

namespace App\Http\Controllers;

use App\Models\Tier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TierController extends Controller
{
    public function action(Request $request)
    {  
        
        $compt=0;

        if( $request->input('action')=='supp')
        { 
            $tiers= tier::all();
            foreach ($tiers as $tier) {

                if($request->input($tier->id)){

                        $tier->delete();
                        $compt++;
               }
              }
        
        }
        $request->session()->flash('msg', "Vous avez  supprimer $compt tiers ");
        return back()->withInput();   
        
        
    }
  
  
    public function index()
    {
        return view('tier.index', ['tiers' => tier::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('tier.create', [
        'sites' => DB::table('sites')->select('id', 'code')->get()
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
        $tier = tier::create($request->all());


        $request->session()->flash('msg', "Vous avez  ajouter l'tier du code: $tier->code ");
        return back()->withInput();   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tier  $tier
     * @return \Illuminate\Http\Response
     */
    public function show(tier $tier)
    {
        return view('tier.show', ['tier' => $tier]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tier  $tier
     * @return \Illuminate\Http\Response
     */
    public function edit(tier $tier)
    {
        
        return view('tier.edit',['tier'=>$tier,
        'sites' => DB::table('sites')->select('id', 'code')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tier  $tier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tier $tier)
    {
        
        
        $tier->code=$request->input('code');
        $tier->Libelle=$request->input('Libelle');
        $tier->information=$request->input('information');
        $tier->idSite=$request->input('idSite');
        
        $tier->save();
        $request->session()->flash('msg',"vous avez modifier les donnees de l'tier du code : $tier->code");
        return redirect()->route('tier.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tier  $tier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,tier $tier)
    {
        $tier->delete();
        $request->session()->flash('msg', "vous avez supprimer l'tier du code:  $tier->code");
        return redirect()->route('tier.index');
    }
}