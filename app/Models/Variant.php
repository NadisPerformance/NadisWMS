<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'id',
        
        
       ];
    public function articles(){
        return $this->hasMany(\app\Models\Article::class);  
    }
}
