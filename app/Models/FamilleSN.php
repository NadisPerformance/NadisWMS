<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilleSN extends Model
{
    use HasFactory;
    protected $fillable = [
        'code','type','fixe','longueur','tailleMax','typeCaractere','alphanumerique','numerique',
        'prefixe','suffixe','typeCheckdigit',
       ];
    public function lignes(){
        return $this->hasMany(LigneModeleSN::class,'idFamilleSN');  
    }
}
