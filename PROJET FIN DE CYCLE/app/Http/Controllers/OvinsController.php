<?php

namespace App\Http\Controllers;

use App\Models\Ovins;
use Illuminate\Http\Request;
use App\Imports\OvinsImport;
use App\Exports\ OvinExport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Excel;


class OvinsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       

    $ovins = ovins::where([
        ['sexe', '!=', NULL],
        [function ($query) use ($request){
            if (($term = $request->term)){
                $query->orWhere('sexe','LIKE', '%' . $term . '%')
               -> orWhere('nom','LIKE', '%' . $term . '%')
               ->orWhere('prix','LIKE', '%' . $term . '%')
               ->orWhere('dateDeNaissance','LIKE', '%' . $term . '%')
               ->orWhere('race','LIKE', '%' . $term . '%')
               ->orWhere('poids','LIKE', '%' . $term . '%')
               ->orWhere('codeEntree','LIKE', '%' . $term . '%')
               ->orWhere('codeSortie','LIKE', '%' . $term . '%')
               ->orWhere('dateEntree','LIKE', '%' . $term . '%')
               ->orWhere('dateDeSortie','LIKE', '%' . $term . '%')
               ->orWhere('rfid','LIKE', '%' . $term . '%')->get();
            }
        }]
    ])
         ->orderBy('rfid', "desc")
         ->paginate(15);
         return view('ovin.index' , compact('ovins'))
         ->with('i', (request()->input('page', 1) -1) *5);
 }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('ovin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nom' => 'required',
            'prix' => 'required',
            'sexe' => 'required',
            'dateDeNaissance' => 'required|date',
            'race' => 'required|string',
            'poids' => 'required',
            'codeEntree'=>'required',
            'dateEntree'=>'required'
        ]);

        $ovin = new Ovins;
        $ovin->nom = $request->nom;
        $ovin->prix = $request->prix;
        $ovin->sexe = $request->sexe;
        $ovin->dateDeNaissance = $request->dateDeNaissance;
        $ovin->race = $request->race;
        $ovin->poids = $request->poids;
        $ovin->codeEntree = $request->codeEntree;
        $ovin->codeSortie = $request->codeSortie;
        $ovin->dateEntree = $request->dateEntree;
        $ovin->dateDeSortie = $request->dateDeSortie;

        if($ovin->save()){
            return redirect()->route('ovins.create')->with('info',"L'ovin  a été crée avec succès");
        }
        else{
            
            return back()->with('error', 'Oops! Echec de Sauvegarde');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ovins  $ovins
     * @return \Illuminate\Http\Response
     */
    public function show(Ovins $ovins)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ovins  $ovins
     * @return \Illuminate\Http\Response
     */
    public function edit(Ovins $ovins)
    {
        //

        return view('ovin.edit', compact('ovins'));
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ovins  $ovins
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ovins $ovins)
    {
        //
        $request->validate([
            'nom' => 'required',
            'prix' => 'required',
            'sexe' => 'required',
            'dateDeNaissance' => 'required',
            'race' => 'required|string',
            'poids' => 'required',
            'codeEntree'=>'required',
            'dateEntree'=>'required'
        ]);
        $ovins->nom = $request->nom;
        $ovins->prix = $request->prix;
        $ovins->sexe = $request->sexe;
        $ovins->dateDeNaissance = $request->dateDeNaissance;
        $ovins->race = $request->race;
        $ovins->poids = $request->poids;
        $ovins->codeEntree = $request->codeEntree;
        $ovins->codeSortie = $request->codeSortie;
        $ovins->dateEntree = $request->dateEntree;
        $ovins->dateDeSortie = $request->dateDeSortie;;

    
        if($ovins->save()){
            return redirect()->route('ovin.index')->with('info',"L'ovin  a été modifie avec succès");
        }
        else{
            
            return back()->with('error', 'Oops! Echec de Sauvegarde');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ovins  $ovins
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ovins $ovins)
    {
        //
        $ovins->delete();
        return redirect()->route('ovin.index');

    }

    public function importUploadForm(){
        return view('import-form');
    }
    public function importForm(Request $request){
        Excel:: import(new OvinsImport,$request->file);
        return "Records are imported";
    }

    public function exportUploadForm(){
        return view('export');
    }
    public function exportIntoExcel()
    {
        return Excel::download(new  OvinExport,'ovinslist.xlsx');
    
    }
    public function exportIntoCSV()
    {
        return Excel::download(new  OvinExport,'ovinslist.csv');
    }

    public function showInventaire(Request $request){

        $print = new \Symfony\Component\Console\Output\ConsoleOutput();
        /*$print->writeln('####################################################################################');
        $print->writeln($request->from_date);
        $print->writeln($request->to_date);
        $print->writeln('################################');*/

        if($request->from_date && $request->to_date){
            $query_avant = 'SELECT COUNT(*) AS nombre_avant FROM ovins WHERE dateEntree <= \''.$request->from_date.'\' AND (dateDeSortie IS NULL OR dateDeSortie >= \''.$request->from_date.'\' )';
            $query_final = 'SELECT COUNT(*) AS nombre_final FROM ovins WHERE codeSortie IS NULL' ;
            $query_naissances = 'SELECT * FROM ovins WHERE codeEntree=\'N\' AND dateDeNaissance BETWEEN \''.$request->from_date.'\' AND \''.$request->to_date.'\'';
            $query_morts = 'SELECT * FROM ovins WHERE codeSortie=\'M\' AND dateDeSortie BETWEEN \''.$request->from_date.'\' AND \''.$request->to_date.'\'';
            $query_ventes = 'SELECT * FROM ovins WHERE codeSortie=\'V\' AND dateDeSortie BETWEEN \''.$request->from_date.'\' AND \''.$request->to_date.'\'';
            $query_achats = 'SELECT * FROM ovins WHERE codeEntree=\'A\' AND dateEntree BETWEEN \''.$request->from_date.'\' AND \''.$request->to_date.'\'';

            //$print->writeln($query_entre);
            $avant = DB::select($query_avant);
            $final = DB::select($query_final);
            $naissances = DB::select($query_naissances);
            $morts = DB::select($query_morts);
            $ventes = DB::select($query_ventes);
            $achats = DB::select($query_achats);
        $print->writeln('####################################################################################');
           $print->writeln($final[0]->nombre_final);
           $print->writeln($query_final);
        $print->writeln('################################');
            $from_date = $request->from_date;
            $to_date = $request->to_date;
            //Log::info(print_r($result, true));
        return view('inventaire.showInventaire', compact('from_date', 'to_date', 'avant', 'final', 'naissances', 'morts', 'ventes', 'achats'));



        }

        return view('inventaire.index');
    }


}
