<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LigneModeleSN extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'idModeleSN','nbAttendus','etat','sequenceReleve','Libelle','regleSouplesse',
        
        
       ];
    public function articles(){
        return $this->belongsTo(ModeleSN::class,'idModeleSN');  
    }
}
