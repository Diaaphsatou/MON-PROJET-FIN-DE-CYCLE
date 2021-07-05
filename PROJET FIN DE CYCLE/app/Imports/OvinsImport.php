<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\Ovins;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class OvinsImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        //$print = new \Symfony\Component\Console\Output\ConsoleOutput();
        //$print->writeln($row['date_de_naissance']);
        return new Ovins([
            'sexe' => $row['sexe'],
            /*'dateDeNaissance' => date("Y-m-d", ($row['date_de_naissance'])*60000),*/
            'dateDeNaissance'  => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['date_de_naissance']),
            'race' => $row['race'],
            'nom' => $row['nom'],
            'poids' => $row['poids'],
            'codeEntree' => $row['code_entree'],
            'dateEntree'  => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['date_entree']),
            'codeSortie' => $row['code_sortie'],
            'dateDeSortie'  => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['date_sortie']),
            'prix' => $row['prix'],
            
        ]);
    }
}
