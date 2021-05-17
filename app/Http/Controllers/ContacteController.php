<?php

namespace App\Http\Controllers;

use App\Models\Contacte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContacteController extends Controller
{
    public function action(Request $request)
    {  
        
        $compt=0;

        if( $request->input('action')=='supp')
        { 
            $contactes= contacte::all();
            foreach ($contactes as $contacte) {

                if($request->input($contacte->id)){

                        $contacte->delete();
                        $compt++;
               }
              }
        
        }
        $request->session()->flash('msg', "Vous avez  supprimer $compt contactes ");
        return back()->withInput();   
        
        
    }
  
  
    public function index()
    {
        return view('contacte.index', ['contactes' => contacte::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('contacte.create', [
        'users' => DB::table('users')->select('id', 'name')->get(),
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
        $contacte = contacte::create($request->all());


        $request->session()->flash('msg', "Vous avez  ajouter l'contacte d'id: $contacte->id ");
        return back()->withInput();   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\contacte  $contacte
     * @return \Illuminate\Http\Response
     */
    public function show(contacte $contacte)
    {
        return view('contacte.show', ['contacte' => $contacte]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\contacte  $contacte
     * @return \Illuminate\Http\Response
     */
    public function edit(contacte $contacte)
    {
        
        return view('contacte.edit',['contacte'=>$contacte,
        'users' => DB::table('users')->select('id', 'name')->get(),
        'sites' => DB::table('sites')->select('id', 'code')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\contacte  $contacte
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, contacte $contacte)
    {
        
        
        $contacte->responsableSociete=$request->input('responsableSociete');
        $contacte->chefEquipe=$request->input('chefEquipe');
        $contacte->idUser=$request->input('idUser');
        $contacte->idSite=$request->input('idSite');
        
        $contacte->save();
        $request->session()->flash('msg',"vous avez modifier les donnees de l'contacte d'id : $contacte->id");
        return redirect()->route('contacte.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\contacte  $contacte
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,contacte $contacte)
    {
        $contacte->delete();
        $request->session()->flash('msg', "vous avez supprimer l'contacte d'id:  $contacte->id");
        return redirect()->route('contacte.index');
    }
}