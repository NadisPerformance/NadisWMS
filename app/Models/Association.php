<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Association extends Model
{
    use HasFactory;
    protected $fillable = [
        'idTransporteur','idSociete','prestation','numCompte','plageColis','codeInterne','type',
        'palettisation','echangeEDI','impressionCN23','transporteurParDefaut','transporteurOptimiser',
        ];
        public function transporteurs(){
            return $this->belongsTo(Transporteur::class,'idTransporteur');  
        }
        public function societes(){
            return $this->belongsTo(Societe::class,'idSociete');  
        }
}
