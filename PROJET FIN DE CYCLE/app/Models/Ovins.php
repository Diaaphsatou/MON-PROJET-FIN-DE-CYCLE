<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Ovins extends Model
{
    
    protected $primaryKey = 'rfid';


   
    protected $table = "ovins";

    public static function getOvins()
    {
        $records = DB::TABLE('ovins')->select('rfid','sexe' ,'dateDeNaissance','race','nom','poids','codeEntree','dateEntree','codeSortie','dateDeSortie','prix')->get()->toArray();
        return $records;
    }

    protected $fillable = [
        'sexe' ,
        'dateDeNaissance',
        'race',
        'nom',
        'poids',
        'codeEntree',
        'dateEntree',
        'codeSortie',
        'dateDeSortie',
        'prix'
        
    ];
}

