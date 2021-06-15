<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    use HasFactory;
    protected $fillable = [
        'code','Libelle','etat','idUser',
        ];
        public function users(){
            return $this->belongsTo(User::class,'idUser');  
        }
}
