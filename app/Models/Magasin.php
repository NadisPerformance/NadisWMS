<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Magasin extends Model
{
    use HasFactory;
    protected $fillable = [
        'idSite','code','Libelle','etat','type','nombreMeubles','nombreColonnes','nombreNiveaux',
        'nombreIndices','separateur',
        ];
        public function emplacements(){
            return $this->hasMany(Emplacement::class,'idMagasin');  
        }
        public function sites(){
            return $this->belongsTo(Site::class,'idSite');  
        }
}
