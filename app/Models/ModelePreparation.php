<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelePreparation extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'idConditionnementLogistique',
        
        
       ];
    public function conditionnementLogistiques(){
        return $this->hasMany(\app\Models\ConditionnementLogistique::class,'idConditionnementLogistique');  
    }
}
