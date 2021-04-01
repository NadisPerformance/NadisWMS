<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrainte extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'idArticle',
        
        
       ];
    public function articles(){
        return $this->belongsTo(\app\Models\Article::class,'idArticle');  
    }
}
