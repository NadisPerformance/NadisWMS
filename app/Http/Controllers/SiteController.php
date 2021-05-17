<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Site;
class SiteController extends Controller
{
    public function action(Request $request)
    {  
        $sites= site::all();
        $compt=0;
        $msge="";
        if( $request->input('action')=='supp')
        { 
            foreach ($sites as $site) {
                if($request->input($site->id)){
                        $site->delete();
                        $compt++;
                }
              }
        $request->session()->flash('msg', "Vous avez  supprimer $compt sites ");
        }
        return back()->withInput();
    }
  
    public function index()
    {
        return view('site.index', ['sites' => site::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {return view('site.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $site = site::create($request->all());


        $request->session()->flash('msg', "Vous avez  ajouter le site du code: $site->code ");
        return redirect()->route("site.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\site  $site
     * @return \Illuminate\Http\Response
     */
    public function show(site $site)
    {
        return view('site.show', ['site' => $site]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\site  $site
     * @return \Illuminate\Http\Response
     */
    public function edit(site $site)
    {
        
        return view('site.edit',['site'=>$site]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\site  $site
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, site $site)
    {
        
        
        $site->code=$request->input('code');
        $site->etat=$request->input('etat');
        $site->Libelle=$request->input('Libelle');
        if ($request->input('defaut') == NULL) {
            $site->defaut = 0;
        } else {
            $site->defaut = $request->input('defaut');
        }
        $site->codeLangueDocument=$request->input('codeLangueDocument');
        $site->codeLangueData=$request->input('codeLangueData');
        $site->save();
        $request->session()->flash('msg',"vous avez modifier les donnees de le site du code : $site->code");
        return redirect()->route('site.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\site  $site
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,site $site)
    {
        $site->delete();
        $request->session()->flash('msg', "vous avez supprimer le site du code:  $site->code");
        return redirect()->route('site.index');
    }
}