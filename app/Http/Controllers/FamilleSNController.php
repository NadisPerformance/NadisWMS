<?php

namespace App\Http\Controllers;
use App\Models\FamilleSN;
use Illuminate\Http\Request;

class familleSNController extends Controller
{
    public function action(Request $request)
    {  
        $familleSNs= familleSN::all();
        $compt=0;

        if( $request->input('action')=='supp')
        { 
            foreach ($familleSNs as $familleSN) {
    
                if($request->input($familleSN->id)){
                    
                        $familleSN->delete();
                        $compt++;
                      
                }
              }
      $request->session()->flash('msg', "Vous avez  supprimer $compt familles de S\N ");
        }
        return back()->withInput();
    }
  
    public function index()
    {
        return view('familleSN.index', ['familleSNs' => familleSN::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {return view('familleSN.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $familleSN = familleSN::create($request->all());


        $request->session()->flash('msg', "Vous avez  ajouter la famille de S\N du code : $familleSN->code ");
        return redirect()->route("familleSN.create");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\familleSN  $familleSN
     * @return \Illuminate\Http\Response
     */
    public function show(familleSN $familleSN)
    {
        return view('familleSN.show', ['familleSN' => $familleSN]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\familleSN  $familleSN
     * @return \Illuminate\Http\Response
     */
    public function edit(familleSN $familleSN)
    {
        
        return view('familleSN.edit',['familleSN'=>$familleSN]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\familleSN  $familleSN
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, familleSN $familleSN)
    {
        
        $familleSN->code=$request->input('code');
        $familleSN->type=$request->input('type');
        $familleSN->fixe=$request->input('fixe');
        $familleSN->longueur=$request->input('longueur');
        $familleSN->tailleMax=$request->input('tailleMax');
        $familleSN->typeCaractere=$request->input('typeCaractere');
        $familleSN->alphanumerique=$request->input('alphanumerique');
        $familleSN->numerique=$request->input('numerique');
        $familleSN->prefixe=$request->input('prefixe');
        $familleSN->suffixe=$request->input('suffixe');
        $familleSN->typeCheckdigit=$request->input('typeCheckdigit');
        $familleSN->save();
        $request->session()->flash('msg',"vous avez modifier les donnees de la famille de S\N du code : $familleSN->code ");
        return redirect()->route('familleSN.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\familleSN  $familleSN
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,familleSN $familleSN)
    {
        $familleSN->delete();
        $request->session()->flash('msg', "vous avez supprimer la famille S\N du code :  $familleSN->code ");
        return redirect()->route('familleSN.index');
    }

}
