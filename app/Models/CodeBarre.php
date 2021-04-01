<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodeBarre extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'idConditionnementLogistique','value',
        
        
       ];
    public function conditionnementLogistiques(){
        return $this->belongsTo(ConditionnementLogistique::class,'idConditionnementLogistique');  
    }
}
