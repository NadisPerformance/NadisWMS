<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'value','discription',
        
        
       ];
    public function articles(){
        return $this->hasMany(\app\Models\Article::class);  
    }
}
