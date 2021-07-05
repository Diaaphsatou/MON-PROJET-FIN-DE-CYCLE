<?php

namespace App\Exports;

use App\Models\Ovins;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OvinExport implements FromCollection,WithHeadings
{
    public function headings():array{
        return[
          'rfid',
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
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
       // return Ovins::all();
       return collect(Ovins::getOvins());
    }
}
