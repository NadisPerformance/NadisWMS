<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('article.index', ['articles' => article::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = Article::create($request->all());


        $request->session()->flash('msg', "Vous avez  ajouter l'article $article->codeArticle ");
        return redirect()->route("article.create");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('article.show', ['article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('article.edit',['article'=>$article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //Infos generale
        $article->codeArticle=$request->input('codeArticle');
        $article->steGestionnaire=$request->input('steGestionnaire');
        $article->etat=$request->input('etat');
        $article->referenceFournisseur=$request->input('referenceFournisseur');
        $article->referenceN3=$request->input('referenceN3');
        $article->lectureCodeBarre=$request->input('lectureCodeBarre');
        $article->dateContrat=$request->input('dateContrat');
        $article->gestionFenetre=$request->input('gestionFenetre');
        $article->rotation=$request->input('rotation');
        $article->unite=$request->input('unite');
        $article->precision=$request->input('precision');
        $article->qtes=$request->input('qtes');
        $article->racine=$request->input('racine');
        $article->PCB=$request->input('PCB');
        $article->instructions=$request->input('instructions');
        $article->libelle=$request->input('libelle');
        $article->libelleCourt=$request->input('libelleCourt');
        $article->libelleLong=$request->input('libelleLong');
        $article->qualite=$request->input('qualite');
        $article->qteMaxType=$request->input('qteMaxType');

        //Configration
           if($request->input('disponibilite')==NULL){
            $article->disponibilite=0;
           }else{
            $article->disponibilite=$request->input('disponibilite');
           }
           if($request->input('colisable')==NULL){
            $article->colisable=0;
           }else{
            $article->colisable=$request->input('colisable');
           }
           if($request->input('rangementPicking')==NULL){
            $article->rangementPicking=0;
           }else{
            $article->rangementPicking=$request->input('rangementPicking');
           }
           if($request->input('lotsEntree')==NULL){
            $article->lotsEntree=0;
           }else{
            $article->lotsEntree=$request->input('lotsEntree');
           }
           if($request->input('lotsSortie')==NULL){
            $article->lotsSortie=0;
           }else{
            $article->lotsSortie=$request->input('lotsSortie');
           }
           if($request->input('gestionDLV')==NULL){
            $article->gestionDLV=0;
           }else{
            $article->gestionDLV=$request->input('gestionDLV');
           }
           if($request->input('entreeSN')==NULL){
            $article->entreeSN=0;
           }else{
            $article->entreeSN=$request->input('entreeSN');
           }
           if($request->input('sortieSN')==NULL){
            $article->sortieSN=0;
           }else{
            $article->sortieSN=$request->input('sortieSN');
           }
           if($request->input('stockSN')==NULL){
            $article->stockSN=0;
           }else{
            $article->stockSN=$request->input('stockSN');
           }
           if($request->input('notionAlcool')==NULL){
            $article->notionAlcool=0;
           }else{
            $article->notionAlcool=$request->input('notionAlcool');
           }
           if($request->input('notionDangerosite')==NULL){
            $article->notionDangerosite=0;
           }else{
            $article->notionDangerosite=$request->input('notionDangerosite');
           }

           $article->dateLV=$request->input('dateLV');
           $article->dateFabrication=$request->input('dateFabrication');
           $article->numModelisationSN=$request->input('numModelisationSN');
           $article->qteAlcool=$request->input('qteAlcool');
           $article->dangerositeCategorie=$request->input('dangerositeCategorie');
           $article->dangerositeStockage=$request->input('dangerositeStockage');
           $article->dangerositeManipulation=$request->input('dangerositeManipulation');
           $article->dangerositePrecaution=$request->input('dangerositePrecaution');

           //Affectation
           $article->idFamille=$request->input('idFamille');
           $article->idFamilleColisage=$request->input('idFamilleColisage');
           $article->idFamilleQuarantaine=$request->input('idFamilleQuarantaine');
           $article->idModeleStockage=$request->input('idModeleStockage');
           $article->idMarque=$request->input('idMarque');
           $article->idCategorie=$request->input('idCategorie');
           $article->idSociete=$request->input('idSociete');
           $article->idPrix=$request->input('idPrix');
           $article->idVariant=$request->input('idVariant');

           //Seuil

           $article->seuilAlertePerime=$request->input('seuilAlertePerime');
           $article->seuilBlocagePerime=$request->input('seuilBlocagePerime');
           $article->SeuilApprovisionnementMax=$request->input('SeuilApprovisionnementMax');
           $article->SeuilApprovisionnementMin=$request->input('SeuilApprovisionnementMin');

            $article->save();
            $request->session()->flash('msg',"vous avez modifier les donnees d'article du code : $article->codeArticle");
            return redirect()->route('article.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Article $article)
    {
        $article->delete();
        $request->session()->flash('msg', "vous avez supprimer la categorie :  $article->codeArticle");
        return redirect()->route('article.index');
    }
}
