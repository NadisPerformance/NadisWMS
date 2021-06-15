<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;


class UserController extends Controller
{
    public function action(Request $request)
    {  
        
        $compt=0;

        if( $request->input('action')=='supp')
        { 
            $users= user::all();
            foreach ($users as $user) {

                if($request->input($user->id)){

                        $user->delete();
                        $compt++;
               }
              }
        
        }
        $request->session()->flash('msg', "Vous avez  supprimer $compt users ");
        return back()->withInput();   
        
        
    }
  
  
    public function index()
    {
        return view('user.index', ['users' => user::all()]);
    }
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['password']= bcrypt($request['password']);
        $user = User::create($request->only(['name', 'email', 'tele','password','dateValidite', 'code', 'etat','adresse', 'type']));
        $request->session()->flash('msg', "Vous avez crée un compte pour $user->name");
        return redirect()->route("user.create");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        return view('user.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
        
        return view('user.edit',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user $user)
    {
        
        
        $user->update($request->all());
        
        $user->save();
        $request->session()->flash('msg',"vous avez modifier les donnees du user  $user->name");
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,user $user)
    {
        $user->delete();
        $request->session()->flash('msg', "vous avez supprimer le user   $user->name");
        return redirect()->route('user.index');
    }
}