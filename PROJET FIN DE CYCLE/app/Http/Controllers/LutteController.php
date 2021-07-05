<?php

namespace App\Http\Controllers;

use App\Models\lutte;
use App\Models\Ovins;
use Illuminate\Http\Request;

class LutteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $lutte = lutte::where([
            ['ovins_RFID', '!=', NULL],
            [function ($query) use ($request){
                if (($term = $request->term)){
                    $query->orWhere('ovins_RFID','LIKE', '%' . $term . '%')
                   -> orWhere('numLotLutte','LIKE', '%' . $term . '%')
                   ->orWhere('dateDebutLutte','LIKE', '%' . $term . '%')
                   ->orWhere('dateFinLutte','LIKE', '%' . $term . '%')
                   ->orWhere('RFIDBelier','LIKE', '%' . $term . '%')
                   ->orWhere('id','LIKE', '%' . $term . '%')->get();
                }
            }]
        ])
             ->orderBy('id', "desc")
             ->paginate(15);
             return view('lutte.index' , compact('lutte'))
             ->with('i', (request()->input('page', 1) -1) *5);

        /*$lutte = lutte::paginate(2);
        return view('lutte.index', compact('lutte'));*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ovins= Ovins::all();
        return view('lutte.create', compact('ovins'));
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
            'ovins_RFID' => 'required',
            'numLotLutte' => 'required',
            'dateDebutLutte' => 'required',
            'dateFinLutte' => 'required',
            'RFIDBelier' => 'required',
            ]);

            $lutte = new Lutte;
            $lutte->ovins_RFID = $request->ovins_RFID;
            $lutte->numLotLutte = $request->numLotLutte;
            $lutte->dateDebutLutte = $request->dateDebutLutte;
            $lutte->dateFinLutte = $request->dateFinLutte;
            $lutte->RFIDBelier = $request->RFIDBelier;
           
            
            if($lutte->save()){
                return redirect()->route('lutte.create')->with('info',"une lutte  a été enregistré avec succès");
            }
            else{
                
                return back()->with('error', 'Oops! Echec de Sauvegarde');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\lutte  $lutte
     * @return \Illuminate\Http\Response
     */
    public function show(lutte $lutte)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\lutte  $lutte
     * @return \Illuminate\Http\Response
     */
    public function edit(lutte $lutte)
    {
        return view('lutte.edit', compact('lutte'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\lutte  $lutte
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, lutte $lutte)
    {
        $request->validate([
            'ovins_RFID' => 'required',
            'numLotLutte' => 'required',
            'dateDebutLutte' => 'required',
            'dateFinLutte' => 'required',
            'RFIDBelier' => 'required',
            ]);
            $lutte->ovins_RFID = $request->ovins_RFID;
            $lutte->numLotLutte = $request->numLotLutte;
            $lutte->dateDebutLutte = $request->dateDebutLutte;
            $lutte->dateFinLutte = $request->dateFinLutte;
            $lutte->RFIDBelier = $request->RFIDBelier;
           
            if($lutte->save()){
                return redirect()->route('lutte.create')->with('info',"une lutte  a été enregistré avec succès");
            }
            else{
                
                return back()->with('error', 'Oops! Echec de Sauvegarde');
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\lutte  $lutte
     * @return \Illuminate\Http\Response
     */
    public function destroy(lutte $lutte)
    {
        $lutte->delete();
        return redirect()->route('lutte.index');
    }
}
