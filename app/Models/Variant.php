<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'code','etat','type','Libelle',
        
        
       ];
    public function articles(){
        return $this->hasMany(Article::class);  
    }
}
