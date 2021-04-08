<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'codeArticle','steGestionnaire','etat','libelle','libelleCourt','libelleLong',
        'idFamille','idModeleStockage','idFamilleColisage','idFamilleQuarantaine',
        'idMarque','idCategorie','qteMaxType',
        'disponibilite','referenceFournisseur','referenceN3','unite','precision',
        'lectureCodeBarre','colisable','lotsEntree','lotsSortie','gestionDLV',
        'entreeSN','sortieSN','stockSN','numModelisationSN','nbrMoisJour_DureeVieEntrepôt',
        'seuilAlertePerime','seuilBlocagePerime','dateLV','dateFabrication','dateContrat',
        'gestionFenetre','rotation','rangementPicking',
        'SeuilApprovisionnementMin','SeuilApprovisionnementMax','notionDangerosite',
        'notionAlcool','instructions','qualite','racine','variante','PCB',
        'qtes','idVariant','idPrix','idSociete',
        'dangerositeCategorie','dangerositePrecaution','dangerositeStockage',
        'dangerositeManipulation',


    ];
    public function familles(){
        return $this->belongsTo(Famille::class,'idFamille');  
    }
    public function familleColisages(){
        return $this->belongsTo(FamilleColisage::class,'idFamilleColisage');  
    }
    public function modeleStockages(){
        return $this->belongsTo(\app\Models\ModeleStockage::class,'idModeleStockage');  
    }
    public function familleQuarantaines(){
        return $this->belongsTo(\app\Models\FamilleQuarantaine::class,'idFamilleQuarantaine');  
    }
    public function marques(){
        return $this->belongsTo(\app\Models\Marque::class,'idMarque');  
    }
    public function categories(){
        return $this->belongsTo(Categorie::class,'idCategorie');  
    }
    public function contraintes(){
        return $this->hasMany(Contrainte::class);  
    }
    public function conditionnementLogistiques(){
        return $this->hasMany(ConditionnementLogistique::class);  
    }
    public function prixes(){
        return $this->belongsTo(Prix::class,'idPrix');  
    }
    public function variants(){
        return $this->hasMany(Variant::class,'idVariant');  
    }
    public function societes(){
        return $this->belongsTo(Societe::class,'idSociete');  
    }
    public function modeleSNs(){
        return $this->belongsTo(ModeleSN::class);  
    }

}