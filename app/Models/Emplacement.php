<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emplacement extends Model
{
    use HasFactory;
    protected $fillable = [
        'idMagasin','idArticle','idSecteur','idFamilleSupport','code',
        'Libelle','LibelleClient','type','capacite',
        'estPicking','usage','etat','hauteur',
        'largeur','profondeur','poids','volume',
    ];
    public function magasins(){
        return $this->belongsTo(Magasin::class,'idMagasin');  
    }
    public function secteurs(){
        return $this->belongsTo(Secteur::class,'idSecteur');  
    }
    public function familleSupports(){
        return $this->belongsTo(FamilleSupport::class,'idFamilleSupport');  
    }
    public function article(){
        return $this->belongsTo(Article::class,'idArticle');  
    }
}
