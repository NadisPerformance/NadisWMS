<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AffectationTransporteur extends Model
{
    use HasFactory;
    protected $fillable = [
        'idPlanTransporteur','nbOP','codePaye','codeZone','codeDepartement','codePostal','poids',
        'nbColis','montant',
        ];
        public function planTransporteurs(){
            return $this->belongsTo(PlanTransporteur::class,'idPlanTransporteur');  
        }
}
