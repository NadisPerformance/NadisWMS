<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConditionnementLogistique extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'idArticle','code','Libelle','etat','enEtat','UniteStockage','UnitePreparation',
        'UniteReception','gerbage','borneMax','borneMin','poids','longueur','largeur','profondeur',
        'qte','type','coefficient','filiation','typeFiliation','planPalettisation',
        
        
       ];
    public function codeBarres(){
        return $this->hasMany(\app\Models\CodeBarre::class);  
    }
    public function modelePreparations(){
        return $this->hasMany(\app\Models\ModelePreparation::class);  
    }
    public function articles(){
        return $this->belongsTo(Article::class,'idArticle');  
    }
}
