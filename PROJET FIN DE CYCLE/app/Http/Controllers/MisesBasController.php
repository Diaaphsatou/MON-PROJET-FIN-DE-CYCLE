<?php

namespace App\Http\Controllers;

use App\ Models\mises_bas;
use Illuminate\Http\Request;
use App\Models\Ovins;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class MisesBasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $mises_bas = mises_bas::where([
            ['date', '!=', NULL],
            [function ($query) use ($request){
                if (($term = $request->term)){
                    $query->orWhere('date','LIKE', '%' . $term . '%')
                   -> orWhere('nombreAgneauVivant','LIKE', '%' . $term . '%')
                   ->orWhere('nombreAgneauMort','LIKE', '%' . $term . '%')
                   ->orWhere('ProblemeMisesBas','LIKE', '%' . $term . '%')
                   ->orWhere('periodeMisesBas','LIKE', '%' . $term . '%')
                   ->orWhere('methode','LIKE', '%' . $term . '%')
                   ->orWhere('commentaire','LIKE', '%' . $term . '%')
                   ->orWhere('ovins_RFID','LIKE', '%' . $term . '%')
                   ->orWhere('echographies_id','LIKE', '%' . $term . '%')
                   ->orWhere('id','LIKE', '%' . $term . '%')->get();
                }
            }]
        ])
             ->orderBy('id', "desc")
             ->paginate(15);
             return view('mises_bas.index' , compact('mises_bas'))
             ->with('i', (request()->input('page', 1) -1) *5);

       /* $mises_bas = mises_bas::paginate(2);
        return view('mises_bas.index', compact('mises_bas'));*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ovins= Ovins::all();
        return view('mises_bas.create',compact('ovins'));
       
       

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'nombreAgneauVivant' => 'required',
            'nombreAgneauMort' => 'required',
            'ProblemeMisesBas' => 'required',
            'periodeMisesBas' => 'required',
            'methode' => 'required',
            'commentaire' => 'required',
            'ovins_RFID' => 'required',
            'echographies_id' => 'required',
           
            ]);

            $mises_bas = new mises_bas;
            $mises_bas->date = $request->date;
            $mises_bas->nombreAgneauVivant = $request->nombreAgneauVivant;
            $mises_bas->nombreAgneauMort = $request->nombreAgneauMort;
            $mises_bas->ProblemeMisesBas = $request->ProblemeMisesBas;
            $mises_bas->periodeMisesBas =  $request->periodeMisesBas;
            $mises_bas->methode = $request->methode;
            $mises_bas->commentaire = $request->commentaire;
            $mises_bas->ovins_RFID = $request->ovins_RFID;
            $mises_bas->echographies_id = $request->echographies_id;


            if($mises_bas->save()){
                return redirect()->route('mises_bas.create')->with('info',"une mise bas a été enregistrée avec succès");
            }
            else{
                
                return back()->with('error', 'Oops! Echec de Sauvegarde');
            }
            
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\mises_bas  $mises_bas
     * @return \Illuminate\Http\Response
     */
    public function abou(mises_bas $mises_bas)
    {
        $mises_bas = mises_bas::paginate(2);
        return view('mises_bas.abou', compact('mises_bas')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\mises_bas  $mises_bas
     * @return \Illuminate\Http\Response
     */
    public function edit(mises_bas $mises_bas)
    {
        return view('mises_bas.edit', compact('mises_bas')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\mises_bas  $mises_bas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, mises_bas $mises_bas)
    {
        $request->validate([
            'date' => 'required',
            'nombreAgneauVivant' => 'required',
            'nombreAgneauMort' => 'required',
            'ProblemeMisesBas' => 'required',
            'periodeMisesBas' => 'required',
            'methode' => 'required',
            'commentaire' => 'required',
            'ovins_RFID' => 'required',
            'echographies_id' => 'required',
            ]);

            $mises_bas->date = $request->date;
            $mises_bas->nombreAgneauVivant = $request->nombreAgneauVivant;
            $mises_bas->nombreAgneauMort = $request->nombreAgneauMort;
            $mises_bas->ProblemeMisesBas = $request->ProblemeMisesBas;
            $mises_bas->periodeMisesBas =  $request->periodeMisesBas;
            $mises_bas->methode = $request->methode;
            $mises_bas->commentaire = $request->commentaire;
            $mises_bas->ovins_RFID = $request->ovins_RFID;
            $mises_bas->echographies_id = $request->echographies_id;

            
            
            if($mises_bas->save()){
                return redirect()->route('mises_bas.create')->with('info',"une mise bas a été enregistrée avec succès");
            }
            else{
                
                return back()->with('error', 'Oops! Echec de Sauvegarde');
            }
            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\mises_bas  $mises_bas
     * @return \Illuminate\Http\Response
     */
    public function destroy(mises_bas $mises_bas)
    {
        $mises_bas->delete();
        return redirect()->route('mises_bas.index');
    }
    public function selection(mises_bas $mises_bas)
    {
        $mises_bas = mises_bas::paginate(2);
        return view('mises_bas.selection', compact('mises_bas')); 
    }


    public function showMisebas(Request $request){

        $print = new \Symfony\Component\Console\Output\ConsoleOutput();
        /*$print->writeln('####################################################################################');
        $print->writeln($request->from_date);
        $print->writeln($request->to_date);
        $print->writeln('################################');*/

        if($request->from_date && $request->to_date){
            
            $query_naissances = 'SELECT *,sexe FROM mises_bas,ovins WHERE mises_bas.ovins_RFID=ovins.rfid  AND  sexe=\'Feminin\' AND derniereMisesBas BETWEEN \''.$request->from_date.'\' AND \''.$request->to_date.'\'';
            //$query_morts = 'SELECT * FROM ovins WHERE codeSortie=\'M\' AND dateDeSortie BETWEEN \''.$request->from_date.'\' AND \''.$request->to_date.'\'';
            //$query_ventes = 'SELECT * FROM ovins WHERE codeSortie=\'V\' AND dateDeSortie BETWEEN \''.$request->from_date.'\' AND \''.$request->to_date.'\'';
            //$query_achats = 'SELECT * FROM ovins WHERE codeEntree=\'A\' AND dateEntree BETWEEN \''.$request->from_date.'\' AND \''.$request->to_date.'\'';

            //$print->writeln($query_entre);
           // $avant = DB::select($query_avant);
          //  $final = DB::select($query_final);
            $naissances = DB::select($query_naissances);
            //$morts = DB::select($query_morts);
            //$ventes = DB::select($query_ventes);
           // $achats = DB::select($query_achats);
      //  $print->writeln('####################################################################################');
          // $print->writeln($final[0]->nombre_final);
         //  $print->writeln($query_final);
        $print->writeln('################################');
            $from_date = $request->from_date;
            $to_date = $request->to_date;
            //Log::info(print_r($result, true));
        return view('mises_bas.showMisebas', compact(/*'from_date', 'to_date', 'avant', 'final', */'naissances'/*, 'morts', 'ventes', 'achats'*/));



        }

        return view('mises_bas.abou');
    }


}
