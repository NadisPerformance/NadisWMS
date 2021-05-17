<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;
    protected $fillable = [
        'code','Libelle','etat','defaut','codeLangueDocument','codeLangueData', 
       ];
       public function magasins(){
        return $this->hasMany(Magasin::class,'idSite');  
    }
    public function adresses(){
        return $this->hasMany(Adresse::class,'idSite');  
    }
    public function contactes(){
        return $this->hasMany(Contacte::class,'idSite');  
    }
    public function tiers(){
        return $this->hasMany(Tier::class,'idSite');  
    }
}
