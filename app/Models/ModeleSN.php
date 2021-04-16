<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModeleSN extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'idArticle','nbAttendus','etat','sequenceReleve','Libelle','regleSouplesse',
        
        
       ];
    public function articles(){
        return $this->belongsTo(Article::class,'idArticle');  
    }
    public function lignes(){
        return $this->hasMany(LigneModeleSN::class,'idModeleSN');  
    }
}
