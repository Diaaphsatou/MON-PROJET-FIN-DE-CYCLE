<?php

namespace App\Http\Controllers;

use App\Models\livraison;
use App\Models\Ovins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LivraisonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $livraison  = livraison::where([
            ['date', '!=', NULL],
            [function ($query) use ($request){
                if (($term = $request->term)){
                    $query->orWhere('date','LIKE', '%' . $term . '%')
                   -> orWhere('destination','LIKE', '%' . $term . '%')
                   ->orWhere('transport','LIKE', '%' . $term . '%')
                   ->orWhere('ovins_RFID','LIKE', '%' . $term . '%')
                   ->orWhere('id','LIKE', '%' . $term . '%')->get();
                }
            }]
        ])
             ->orderBy('id', "desc")
             ->paginate(15);
             return view('livraison.index' , compact('livraison'))
             ->with('i', (request()->input('page', 1) -1) *5);
       
       /* $livraison = livraison::paginate(2);
        return view('livraison.index', compact('livraison'));*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ovins= Ovins::all();
        return view('livraison.create',compact('ovins'));
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
            'destination' => 'required',
            'transport' => 'required',
            'ovins_RFID' => 'required',
            ]);

            $livraison = new Livraison;
            $livraison->date = $request->date;
            $livraison->destination = $request->destination;
            $livraison->transport = $request->transport;
            $livraison->ovins_RFID = $request->ovins_RFID;
            
            if($livraison->save()){
                return redirect()->route('livraison.create')->with("La livraison a été enregistré avec succès");
            }
            else{
                
                return back()->with('error', 'Oops! Echec de Sauvegarde');
            }
            
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\livraison  $livraison
     * @return \Illuminate\Http\Response
     */
    public function show(livraison $livraison)
    {
        //
    }
    public function saisie(livraison $livraison)
    {
        return view('livraison.saisie', compact('livraison'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\livraison  $livraison
     * @return \Illuminate\Http\Response
     */
    public function edit(livraison $livraison)
    {
        return view('livraison.edit', compact('livraison'));
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\livraison  $livraison
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, livraison $livraison)
    {
        $request->validate([
            'date' => 'required',
            'destination' => 'required',
            'transport' => 'required',
            'ovins_RFID' => 'required',
            ]);

            $livraison->date = $request->date;
            $livraison->destination = $request->destination;
            $livraison->transport = $request->transport;
            $livraison->ovins_RFID = $request->ovins_RFID;
            
            if($livraison->save()){
                return redirect()->route('livraison.create')->with('info',"La livraison a été enregistré avec succès");
            }
            else{
                
                return back()->with('error', 'Oops! Echec de Sauvegarde');
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\livraison  $livraison
     * @return \Illuminate\Http\Response
     */
    public function destroy(livraison $livraison)
    {
        $livraison->delete();
        return redirect()->route('livraison.index');
    }
    public function showLivraison(Request $request){
        $print = new \Symfony\Component\Console\Output\ConsoleOutput();
        if($request->from_date){
            $query_avant = 'SELECT * FROM livraisons WHERE date = \''.$request->from_date.'\'';
            $avant = DB::select($query_avant);
            $print->writeln('################################');
            $from_date = $request->from_date;
        return view('livraison.showLivraison', compact('from_date',/* 'to_date',*/ 'avant'/* 'final', *//*'naissances'/*, 'morts', 'ventes', 'achats'*/));
        }
        return view('livraison.showLivraison');
    }
}
