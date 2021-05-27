<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transporteur extends Model
{
    use HasFactory;
    protected $fillable = [
        'code','Libelle','etat','codeLangueDoc','codeLangueData','numSiret','mouvementReception',
        'mouvementInterne','mouvementExpedition',
        ];
        public function associations(){
            return $this->belongsTo(Association::class,'idTransporteur');  
        }
        public function planTransports(){
            return $this->hasMany(PlanTransport::class,'idTransporteur');  
        }
}
