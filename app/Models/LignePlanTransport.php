<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LignePlanTransport extends Model
{
    use HasFactory;
    protected $fillable = [
        'idPlanTransporteur','codePaye','codeDepartement','zone','codePostal','poidsMin','poidsMax',
        'nbColisMin','nbColisMax','tarif','modeCalcul','uniteCalcul','arrondi',
        ];
        public function planTransports(){
            return $this->belongsTo(PlanTransport::class,'idPlanTransporteur');  
        }
}
