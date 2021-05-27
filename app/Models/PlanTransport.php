<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanTransport extends Model
{
    use HasFactory;
    protected $fillable = [
        'code','Libelle','etat','idTransporteur','type','pays','dateDebutValidite',
        'dateFinValidite','modeRecherche','modeCalcul','taxeGazole','taxeSurete','ecotaxe',
        ];
        public function transporteurs(){
            return $this->belongsTo(Transporteur::class,'idTransporteur');  
        }
        public function lignePlanTransports(){
            return $this->hasMany(LignePlanTransport::class,'idPlanTransporteur');  
        }
        public function affictationTransporteurs(){
            return $this->hasMany(AffictationTransporteur::class,'idPlanTransporteur');  
        }
}
