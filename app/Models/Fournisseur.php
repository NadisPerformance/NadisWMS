<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    use HasFactory;
    protected $fillable = [
        'code','Libelle','etat','codeLangueDoc','codeLangueData','numSiret','contraDate',
        ];
        public function adresses(){
            return $this->hasMany(Adresse::class,'idFournisseur');  
        }
}
