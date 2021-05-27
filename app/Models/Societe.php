<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Societe extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'id',
        
        
       ];
    public function articles(){
        return $this->hasMany(Article::class,'idSociete');  
    }
    public function associations(){
        return $this->hasMany(Association::class,'idSociete');  
    }
}
