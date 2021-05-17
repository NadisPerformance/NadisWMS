<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilleSupport extends Model
{
    use HasFactory;
    protected $fillable = [
        'code','Libelle','etat','type','uniteReception','uniteStockage','unitePreparation',
        'uniteReapprovisionnement','uniteExpedition','hauteur','largeur','profondeur',
        'poids','chargeMax','hauteurMax',
        ];
        public function emplacements(){
            return $this->hasMany(Emplacement::class,'idFamilleSupport');  
        }
}
