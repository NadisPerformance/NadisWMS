<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tier extends Model
{
    use HasFactory;
    protected $fillable = [
        'idSite','code','Libelle','information',
    ];
    public function sites(){
        return $this->belongsTo(Site::class,'idSite');  
    }
}
