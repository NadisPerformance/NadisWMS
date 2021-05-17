<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Secteur extends Model
{
    use HasFactory;
    protected $fillable = [
        'code','Libelle','etat','type',
        ];
    public function emplacements(){
        return $this->hasMany(Emplacement::class,'idSecteur');  
    }
}
