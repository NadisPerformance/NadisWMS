<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilleColisage extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'name','code','etat','type','Libelle',
        
        
       ];
    public function articles(){
        return $this->hasMany(Article::class);  
    }
}
