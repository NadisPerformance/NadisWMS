<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'code','Libelle','etat','type','codeLangueDoc','codeLangueData','numSiret','contraDate',
        'expeditionPartielle','regroupementLogique',
        ];
        public function adresses(){
            return $this->hasMany(Adresse::class,'idClient');  
        }
}
