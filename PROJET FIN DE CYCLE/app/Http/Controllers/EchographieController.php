<?php

namespace App\Http\Controllers;

use App\Models\Echographie;
use Illuminate\Http\Request;
use App\Models\Ovins;

class EchographieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $echographie= echographie::where([
            ['lot', '!=', NULL],
            [function ($query) use ($request){
                if (($term = $request->term)){
                    $query->orWhere('lot','LIKE', '%' . $term . '%')
                   -> orWhere('nbreFoetus','LIKE', '%' . $term . '%')
                   ->orWhere('dateEcho','LIKE', '%' . $term . '%')
                   ->orWhere('ovins_RFID','LIKE', '%' . $term . '%')
                   ->orWhere('id','LIKE', '%' . $term . '%')->get();
                }
            }]
        ])
             ->orderBy('id', "desc")
             ->paginate(15);
             return view('echographie.index' , compact('echographie'))
             ->with('i', (request()->input('page', 1) -1) *5);

        /*$echographie = Echographie::paginate(5);
        return view('echographie.index', compact('echographie'));*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ovins= Ovins::all();
        return view('echographie.create',compact('ovins'));
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
            'lot'=> 'required',
            'nbreFoetus'=> 'required',
            'dateEcho'=> 'required',
            'ovins_RFID'=> 'required',

        ]);
        $echographie = new Echographie;
        $echographie->lot = $request->lot;
        $echographie->nbreFoetus = $request->nbreFoetus;
        $echographie->dateEcho = $request->dateEcho;
        $echographie->ovins_RFID = $request->ovins_RFID;

        if($echographie->save()){
            return redirect()->route('echographie.index')->with('info',"l'echographie a été modifié avec succes");
        }
        else{
            return back()->with('error','Oops! Echec de Sauvegarde');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Echographie  $echographie
     * @return \Illuminate\Http\Response
     */
    public function show(Echographie $echographie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Echographie  $echographie
     * @return \Illuminate\Http\Response
     */
    public function edit(Echographie $echographie)
    {
        return view('echographie.edit', compact('echographie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Echographie  $echographie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Echographie $echographie)
    {
        
        
        $echographie->lot = $request->lot;
        $echographie->nbreFoetus = $request->nbreFoetus;
        $echographie->dateEcho = $request->dateEcho;
        $echographie->ovins_RFID = $request->ovins_RFID;

        
        if($echographie->save()){
            return redirect()->route('echographie.index')->with('info',"l'echographie a été modifié avec succes");
        }
        else{
            return back()->with('error','Oops! Echec de Sauvegarde');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Echographie  $echographie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Echographie $echographie)
    {
        $echographie->delete();
        return redirect()->route('echographie.index');
    }
}
