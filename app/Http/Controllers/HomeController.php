<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\Article;
use PDF;

class HomeController extends Controller
{
    public function switchLang($lang)
    {
        if (array_key_exists($lang, Config::get('languages'))) {
            Session::put('applocale', $lang);
        }
        return Redirect::back();
    }
    public function data(Request $request)
    {  
        $year=$request->input('year');
        $years=$request->input('years');
        $month=$request->input('month');
        if($years==null){
            $years=DB::table('articles')->max(DB::raw('YEAR(created_at)'));
        }
        
        if($year==null){
            $year=DB::table('articles')->max(DB::raw('YEAR(created_at)'));
            $month=DB::table('articles')->max(DB::raw('MONTH(created_at)'));
        }
        return view('dashboard', [
            'cree' =>   DB::table('articles')->where('etat','Créer')->count(),
            'valide' =>   DB::table('articles')->where('etat','Valide')->count(),
            'invalide' =>   DB::table('articles')->where('etat','Invalide')->count(),
            'asupp' =>   DB::table('articles')->where('etat','A supprimer')->count(),
            'dataDaye' =>  DB::table('articles')->select(DB::raw('DATE(created_at) as jour'), DB::raw('count(*) as nb'))
            ->groupBy('jour')->where(DB::raw('YEAR(created_at)'),$year)->where(DB::raw('MONTH(created_at)'),$month)->orderBy('nb')
            ->get(),
            'dataMonth' =>  DB::table('articles')->select(DB::raw('MONTH(created_at) as month'), DB::raw('count(*) as nb'))
            ->groupBy('month')->where(DB::raw('YEAR(created_at)'),$years)->orderBy('nb')
            ->get(),
            'updateDaye' =>   DB::table('articles')->select(DB::raw('MAX(updated_at) as max'))
            ->where(DB::raw('YEAR(updated_at)'),$year)->where(DB::raw('MONTH(updated_at)'),$month)->get(),
            'updateMonth' =>   DB::table('articles')->select(DB::raw('MAX(updated_at) as max'))
            ->where(DB::raw('YEAR(updated_at)'),$years)->get(),
            'update' => DB::table('articles')->max(DB::raw('(updated_at)')),
            ]); 
    }
    public function stock()
    {
     
        return view('stock', [
            'articles' => article::all(),
            'ids' => DB::table('articles')->get('id'),
            ]); 
    }
    
    
}
