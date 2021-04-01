<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Else_;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('test.index', ['tests' => test::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('test.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $test = test::create($request->all());


        $request->session()->flash('msg', "Vous avez  ajouter un test d'id : $test->id ");
        return redirect()->route("test.create");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\test  $test
     * @return \Illuminate\Http\Response
     */
    public function show(test $test)
    {
        return view('test.show', ['test' => $test]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit(test $test)
    {
        
        return view('test.edit',['test'=>$test]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, test $test)
    {
        
       if($request->input('test')==NULL){
        $test->test=0;
       }else{
        $test->test=$request->input('test');
       }
        
        $test->save();
        $request->session()->flash('msg',"vous avez modifier les donnees du test d'id: $test->id");
        return redirect()->route('test.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,test $test)
    {
        $test->delete();
        $request->session()->flash('msg', "vous avez supprimer le test d'id:  $test->id");
        return redirect()->route('test.index');
    }
}
