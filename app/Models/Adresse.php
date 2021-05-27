<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adresse extends Model
{
    use HasFactory;
    protected $fillable = [
        'idSite','idUser','idFournisseur','idClient','type',
        'livraison','siege','facturation','raisonSociale','CP','Ville','pays','siteInternet',
        ];
    public function sites(){
        return $this->belongsTo(Site::class,'idSite');  
    }
    public function users(){
        return $this->belongsTo(User::class,'idUser');  
    }
    public function fournisseurs(){
        return $this->belongsTo(Fournisseur::class,'idFournisseur');  
    }
    public function clients(){
        return $this->belongsTo(Client::class,'idClient');  
    }
}
