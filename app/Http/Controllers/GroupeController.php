<?php

namespace App\Http\Controllers;
use App\Models\groupe;
use App\Models\user;
use Illuminate\Support\Facades\DB;
use PDF;
use Illuminate\Http\Request;

class GroupeController extends Controller
{
    public function action(Request $request)
    {  
        $groupes= groupe::all();
        $users= user::all();
        $compt=0;
        $msge="";
        if( $request->input('action')=='supp')
        { 
            foreach ($groupes as $groupe) {
                $v=0;
                if($request->input($groupe->id)){
                    foreach ($users as $user) {
                        if($user->id==$groupe->idUser){
                          $v++;
                        }
                    }
                    if($v==0){
                        $groupe->delete();
                        $compt++;
                    }else{
                        $msge=$msge. $groupe->Libelle.", ";
                    }  
                }
              }
        if($msge!="")
        $request->session()->flash('msge', "Vous pouvez pas supprimer les groupes [ $msge], elles ont des utilisateurs qui leur sont associés! ");
        $request->session()->flash('msg', "Vous avez  supprimer $compt groupes");
        }
        return back()->withInput();
    }
   
  
    public function index()
    {
        return view('groupe.index', ['groupes' => groupe::all()]);
    }
    public function create()
    {
        return view('groupe.create', [
            'users' => DB::table('users')->select('id', 'name')->get(),
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
        $groupe = groupe::create($request->all());
        $request->session()->flash('msg', "Vous avez  ajouter le groupe : $groupe->Libelle ");
        return back()->withInput();   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\groupe  $groupe
     * @return \Illuminate\Http\Response
     */
    public function show(groupe $groupe)
    {
        return view('groupe.show', ['groupe' => $groupe]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\groupe  $groupe
     * @return \Illuminate\Http\Response
     */
    public function edit(groupe $groupe)
    {
        
        return view('groupe.edit',['groupe'=>$groupe,
        'users' => DB::table('users')->select('id', 'name')->get(),
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\groupe  $groupe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, groupe $groupe)
    {
        
        
        $groupe->update($request->all());
        
        $groupe->save();
        $request->session()->flash('msg',"vous avez modifier les donnees du groupe  $groupe->Libelle");
        return redirect()->route('groupe.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\groupe  $groupe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,groupe $groupe)
    {
        $users= user::all();
        $v=0;
        $msge="";
                    foreach ($users as $user) {
                        if($user->id==$groupe->idUser){
                          $v++;
                        }
                    }
                    if($v==0){
                        $groupe->delete();
                        $compt++;
                    }else{
                        $msge=$msge. $groupe->Libelle.", ";
                    } 
        if($msge!="")
        $request->session()->flash('msge', "Vous pouvez pas supprimer le groupe $groupe->Libelle, il a des utilisateurs qui lui sont associés! ");
        else
        $request->session()->flash('msg', "vous avez supprimer le groupe   $groupe->Libelle");
        return redirect()->route('groupe.index');
    }
}