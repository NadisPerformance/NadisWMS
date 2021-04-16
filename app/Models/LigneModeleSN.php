<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LigneModeleSN extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'idModeleSN','idFamilleSN','nombre',
        
        
       ];
    public function modeleSNs(){
        return $this->belongsTo(ModeleSN::class,'idModeleSN');  
    }
    public function familleSNs(){
        return $this->belongsTo(FamilleSN::class,'idFamilleSN');  
    }
}
