<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adresse extends Model
{
    use HasFactory;
    protected $fillable = [
        'idSite','idUser','livraison','siege','facturation','raisonSociale','CP','Ville','pays','siteInternet',
        ];
    public function sites(){
        return $this->belongsTo(Site::class,'idSite');  
    }
    public function users(){
        return $this->belongsTo(User::class,'idUser');  
    }
}
